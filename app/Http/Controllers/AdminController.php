<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Post;
use App\Models\Recipe;
use App\Models\Thread;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $articles = Article::latest()->take(1)->get()->map(function ($article) {
            $article->type = 'Article';
            return $article;
        });

        $posts = Post::latest()->take(1)->get()->map(function ($post) {
            $post->type = 'Post';
            return $post;
        });

        $recipes = Recipe::latest()->take(1)->get()->map(function ($recipe) {
            $recipe->type = 'Recipe';
            return $recipe;
        });

        $threads = Thread::latest()->take(1)->get()->map(function ($thread) {
            $thread->type = 'Thread';
            return $thread;
        });

        $data = $articles->concat($posts)->concat($recipes)->concat($threads);

        $data = $data->sortByDesc('created_at')->values()->all();

        $user = User::take(5)->get();
        $totalThreads = Thread::count();
        $totalPosts = Post::count();
        return view('admin.dashboard', ['data' => $data, 'totalThreads' => $totalThreads, 'totalPosts' => $totalPosts, 'users' => $user]);
    }


    public function removeUser(User $user)
    {
        $user->delete();

        return redirect()->route('admin.dashboard')->with('status', 'User removed successfully');
    }

    public function removeData($id, $type)
    {
        switch ($type) {
            case 'Article':
                $item = Article::find($id);
                break;
            case 'Post':
                $item = Post::find($id);
                break;
            case 'Recipe':
                $item = Recipe::find($id);
                break;
            case 'Thread':
                $item = Thread::find($id);
                break;
            default:
                return redirect()->back()->with('error', 'Invalid type');
        }

        if ($item) {
            $item->delete();
            return redirect()->back()->with('status', 'Item removed successfully');
        } else {
            return redirect()->back()->with('error', 'Item not found');
        }
    }

    public function userList()
    {
        $users = User::all();

        return view('admin.user_list', ['users' => $users]);
    }

    public function threads()
    {
        $threads = Thread::with('user', 'posts')->withCount('posts')->get();

        return view('admin.thread', ['threads' => $threads]);
    }

    public function removeThread($id)
    {
        $thread = Thread::find($id);

        if ($thread) {
            $thread->delete();
            return redirect()->back()->with('status', 'Thread removed successfully');
        } else {
            return redirect()->back()->with('error', 'Thread not found');
        }
    }

    public function posts()
    {
        $posts = Post::with('user', 'thread', 'parent')->get();

        return view('admin.post', ['posts' => $posts]);
    }

    public function removePost($id)
    {
        $post = Post::find($id);

        if ($post) {
            $post->delete();
            return redirect()->back()->with('status', 'Post removed successfully');
        } else {
            return redirect()->back()->with('error', 'Post not found');
        }
    }
}
