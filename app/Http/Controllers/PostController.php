<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct() {
        $this->Post = new Post();
    }

    public function index()
    {
        $posts = Post::select('writer', 'title', 'category', 'updated_at', 'id')->get();
        return view('admin/posts', compact('posts'));
    }

    public function create()
    {
        return view('admin/create-post');
    }

    public function store(Request $request)
    {
        $request->validate([
            'writer' => 'required',
            'title' => 'required',
            'category' => 'required',
            'image' => ['required', 'mimes:jpg,jpeg,png'],
            'content' => ['required', 'min:50']
        ]);

        $this->Post->store($request);

        return redirect('/admin/posts')->with('success', 'Create New Posts Successfull !!');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('admin/update-post', compact('post'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $request->validate([
            'writer' => 'required',
            'title' => 'required',
            'category' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
            'content' => ['required', 'min:50']
        ]);

        $this->Post->change($request);

        return redirect('/admin/posts')->with('success', 'Create New Posts Successfull !!');
    }

    public function destroy($id)
    {
        $post = Post::find($id)->delete();
        return back()->with('success', 'Create New Posts Successfull !!');
    }
}
