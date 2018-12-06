<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class AdminPostsController extends Controller
{
    public function index()
    {
       $posts = Post::orderBy('created_at','DESC')->get();
       $data = ['posts' =>'$posts'];
        return view('admin.posts.index',$data);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $data = ['post' => $post];
        return view('admin.posts.edit', $data);
    }

    public function store(PostRequest $request)
    {
        Post::create($request->all());//前一次新增store時提前先做了。
        return redirect()->route('admin.posts.index');//前一次新增store時提前先做了。
    }

    public function update(Request $request,$id)
    {
        $post = Post::find($id);
        $post ->update($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('admin.posts.index');
    }
}
