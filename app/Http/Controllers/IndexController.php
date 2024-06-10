<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Doctor;
use App\Models\Thread; // tambahkan ini

class IndexController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->take(3)->get(); // mengambil 6 artikel terbaru
        $doctors = Doctor::with('user')->latest()->take(3)->get(); // tambahkan ini
        $threads = Thread::latest()->take(3)->get(); // tambahkan ini

        return view('index', compact('articles', 'doctors', 'threads')); // tambahkan 'doctors' ke compact
    }
}
