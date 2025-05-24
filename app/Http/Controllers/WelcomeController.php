<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Gallery;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $news = News::where('status', 'published')
                    ->latest()
                    ->take(4)
                    ->get();

        $gallery = Gallery::where('status', 'published')->latest()->get();

        return view('welcome', compact('news','gallery'));
    }

    public function show(News $news)
    {
        if ($news->status !== 'published') {
            abort(404);
        }

        return view('news.show', compact('news'));
    }
}
