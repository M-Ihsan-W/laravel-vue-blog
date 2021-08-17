<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
            'creator' => 'required',
            'title' => 'required',
            'category' => 'required',
            'image' => ['required', 'mimes:jpg,jpeg,png'],
            'content' => ['required', 'min:1']
        ]);

        $this->Post->store($request);
        return response()->json([
            'status' => true,
            'message' => 'Success Insert Data'
        ], Response::HTTP_CREATED);

        // return redirect('/admin/posts')->with('success', 'Create New Posts Successfull !!');
    }

    public function show($id)
    {
        $post = Post::find($id);
        // return view('admin/update-post', compact('post'));
        return response()->json($post, Response::HTTP_OK);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'creator' => 'required',
            'title' => 'required',
            'category' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
            'content' => 'required'
        ]);

        $this->Post->change($request, $id);

        return redirect('/admin/posts')->with('success', 'Create New Posts Successfull !!');
        return response()->json([
            'status' => true,
            'message' => 'Success Update Data',
            'data' => $request->all(),
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $post = Post::find($id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Success Delete Data',
        ], Response::HTTP_OK);
    }

    public function getData()
    {
        $posts = $this->Post->dataPost();
        return response()->json($posts, Response::HTTP_OK);
    }
    
    public function getSpecificData($slug)
    {
        $posts = $this->Post->dataPostBySlug($slug);
        return response()->json($posts, Response::HTTP_ACCEPTED);
    }
    
    public function getPostCategory()
    {
        $posts = $this->Post->postCategory();
        return response()->json($posts, Response::HTTP_ACCEPTED);
    }
    
    public function getSpecificCategory($category)
    {
        $posts = $this->Post->dataPostByCategory($category);
        return response()->json($posts, Response::HTTP_ACCEPTED);
    }
    
    public function getPostPopular()
    {
        $posts = $this->Post->popularPost();
        return response()->json($posts, Response::HTTP_ACCEPTED);
    }
}
