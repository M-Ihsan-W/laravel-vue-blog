<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $table = 'tb_posts';

    public function store($request) {
        $filename = time()."-".$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $filename); 

        $post = new Post();
        $post->writer = $request->writer;
        $post->title = $request->title;
        $post->slug = Str::of($request->title)->slug();
        $post->category = $request->category;
        $post->image = $filename;
        $post->content = $request->content;
        $post->save();
    }

    public function change($request) {
        $id = $request->id;
        if($request->file('image')) {
            $filename = time()."-".$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $filename); 
    
            $post = Post::find($id);
            $post->writer = $request->writer;
            $post->title = $request->title;
            $post->category = $request->category;
            $post->image = $filename;
            $post->content = $request->content;
            $post->save();
        } else {
            $post = Post::find($id);
            $post->writer = $request->writer;
            $post->title = $request->title;
            $post->category = $request->category;
            $post->content = $request->content;
            $post->save();
        }
    }

    public function dataPost() {
        $posts = Post::all();
        return $posts;
    }

    public function dataPostBySlug($slug) {
        $posts = Post::where('slug', $slug)->get();
        return $posts;
    }

    public function postCategory() {
        $posts = Post::select('category')->orderBy('category', 'ASC')->groupBy('category')->get();
        return $posts;
    }
    
    public function dataPostByCategory($category) {
        $posts = Post::where('category', $category)->get();
        return $posts;
    }
}
