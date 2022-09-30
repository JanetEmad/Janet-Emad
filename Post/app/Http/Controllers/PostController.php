<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Services\HasMedia;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{

    public function create()
    {
        $posts = Post::all();
         return view('posts.create',compact('posts'));
    }

    public function store(StorePostRequest $request)
    {
        // $posts = Post::all();
         $imageName = HasMedia::upload($request->file('image'),public_path('images\posts'));
         $data = $request->except('_token','image');
         $data['image'] = $imageName;
         Post::create($data);
         return  redirect()->route('dashboard')->with('success','Post Created Successfully');
    }


    public function delete($id)
    {
         $post = post::findOrFail($id);
         HasMedia::delete(public_path("images\posts\\{$post->image}"));
         $post->delete();
         return redirect()->route('dashboard')->with('success','Post Deleted Successfully');
    }

    public function show($id)
    {
         $post = post::findOrFail($id);
         return view('posts.show',compact('post'));
    }

}

