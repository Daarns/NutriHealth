<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Post;

class ThreadsController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        $threadsQuery = Thread::with('user')->withCount('posts');

        if ($filter === 'newest') {
            $threadsQuery = $threadsQuery->orderBy('created_at', 'desc');
        } elseif ($filter === 'recentActivity') {
            $threadsQuery = $threadsQuery->orderBy('updated_at', 'desc');
        }

        $threads = $threadsQuery->get();
        $posts = Post::all();

        $activeTopics = $this->getActiveTopics();

        if ($request->ajax()) {
            return response()->json(['threads' => $threads]);
        } else {
            return view('threads', ['threads' => $threads, 'posts' => $posts, 'activeTopics' => $activeTopics]);
        }
    }

    public function detail($id)
    {
        $thread = Thread::with('posts')->find($id);
        $posts = Post::all();

        foreach ($thread->posts as $post) {
            $post->childPostCount = $post->where('parent_id', $post->id)->count();
        }

        $activeTopics = $this->getActiveTopics();
        return view('threads_detail', ['threads' => $thread, 'posts' => $posts, 'activeTopics' => $activeTopics]);
    }

    public function getActiveTopics()
    {
        $activeTopics = Thread::withCount('posts')
            ->having('posts_count', '>', 0)
            ->orderBy('posts_count', 'desc')
            ->take(5)
            ->get();

        return $activeTopics;
    }

    public function CreateIndex()
    {
        return view('create_threads');
    }

    public function create(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Buat thread baru dengan data yang telah divalidasi
        $thread = new Thread;
        $thread->title = $validatedData['title'];
        $thread->content = $validatedData['content'];
        $thread->user_id = auth()->id();
        $thread->save();

        // Redirect user ke halaman yang diinginkan setelah thread berhasil dibuat
        return redirect('forum');
    }

    public function reply(Request $request, Thread $thread, Post $parentPost = null)
    {
        $validatedData = $request->validate([
            'body' => 'required',
        ]);

        $post = new Post;
        $post->body = $validatedData['body'];
        $post->user_id = auth()->id();
        $post->thread_id = $thread->id;
        $post->parent_id = $parentPost ? $parentPost->id : null; // Jika ini adalah balasan untuk post lain, tetapkan parent_id
        $post->save();

        return back();
    }
}
