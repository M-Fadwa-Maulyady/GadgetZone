<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;

class AdminBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'thumbnail' => 'image|mimes:jpg,png,jpeg|max:2048',
            'content'   => 'required'
        ]);

        $filename = null;
        if ($request->thumbnail) {
            $filename = time().'.'.$request->thumbnail->extension();
            $request->thumbnail->move(public_path('uploads/blogs'), $filename);
        }

        Blog::create([
            'title'     => $request->title,
            'slug'      => Str::slug($request->title),
            'thumbnail' => $filename,
            'excerpt'   => substr(strip_tags($request->content), 0, 120),
            'content'   => $request->content,
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil dibuat!');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $filename = $blog->thumbnail;

        if ($request->thumbnail) {
            $filename = time().'.'.$request->thumbnail->extension();
            $request->thumbnail->move(public_path('uploads/blogs'), $filename);
        }

        $blog->update([
            'title'     => $request->title,
            'slug'      => Str::slug($request->title),
            'thumbnail' => $filename,
            'excerpt'   => substr(strip_tags($request->content), 0, 120),
            'content'   => $request->content,
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil diupdate!');
    }

    public function destroy($id)
    {
        Blog::findOrFail($id)->delete();
        return back()->with('success', 'Blog berhasil dihapus');
    }
}

