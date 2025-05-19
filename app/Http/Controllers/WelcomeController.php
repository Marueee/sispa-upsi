<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $news = News::where('status', 'published')
                    ->latest()
                    ->take(4)
                    ->get();

        return view('welcome', compact('news'));
    }

    public function show(News $news)
    {
        if ($news->status !== 'published') {
            abort(404);
        }

        return view('news.show', compact('news'));
    }
}
