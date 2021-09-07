<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PagesController extends Controller
{
    public function index()
    {
        $articles = Article::whereNotNull('published_at')->latest('published_at')->limit(3)->get();

        return view('pages/homepage', compact('articles'));
    }

    public function about()
    {
        return view('pages/about');
    }

    public function contacts()
    {
        return view('pages/contacts');
    }

    public function sales()
    {
        return view('pages/sales');
    }

    public function financial()
    {
        return view('pages/financial');
    }

    public function clients()
    {
        return view('pages/clients');
    }

    public function articles()
    {
        $articles = Article::whereNotNull('published_at')->get();

        return view('pages/articles', compact('articles'));
    }
}
