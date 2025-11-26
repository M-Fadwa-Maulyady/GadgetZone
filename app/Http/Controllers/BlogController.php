<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(6);
        return view('user.blog.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('user.blog.detail', compact('blog'));
    }
}