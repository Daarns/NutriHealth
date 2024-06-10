<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index($type)
    {
        $articles = Article::where('type', $type)->paginate(20);

        return view('admin.artikel', ['articles' => $articles]);
    }
    public function create()
    {
        return view('admin.create_artikel');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'type' => 'required',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image_path')) {
            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images'), $imageName);
        }

        $article = new Article;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->type = $request->type;
        $article->image_path = $imageName;
        $article->user_id = auth()->id();
        $article->save();

        return redirect()->route('admin.artikel', ['type' => $request->type]);
    }

    public function edit($id)
    {
        $article = Article::find($id);

        if ($article) {
            return response()->json($article);
        } else {
            return response()->json(['error' => 'Artikel tidak ditemukan.'], 404);
        }
    }
    public function update(Request $request, $id)
    {
        $article = Article::find($id);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'type' => 'required',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images'), $imageName);
            $article->image_path = $imageName;
        }

        $article->title = $request->title;
        $article->content = $request->content;
        $article->type = $request->type;
        $article->save();

        return redirect()->route('admin.artikel', ['type' => $article->type]);
    }

    public function destroy($id)
    {
        $article = Article::find($id);

        if ($article) {
            $type = $article->type;
            $article->delete();

            return redirect()->route('admin.artikel', $type);
        } else {
            return redirect()->route('admin.artikel')->with('error', 'Artikel tidak ditemukan.');
        }
    }

    public function show()
    {
        $articles = Article::paginate(5);

        return view('artikel', ['articles' => $articles]);
    }

    public function detail($id)
    {
        $article = Article::find($id);

        if ($article) {
            return view('artikel_detail', ['article' => $article]);
        } else {
            return redirect()->route('artikel')->with('error', 'Artikel tidak ditemukan.');
        }
    }
}
