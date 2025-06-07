<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getPosts() 
    {
        // return Post::orderBy('id', 'desc')->get();  
        return DB::table('posts')->orderBy('id', 'desc')->get();
    }

    public function createPost(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->comment = $request->comment;
        $post->save();

        return $post;
    }

    public function editPost(Request $request, $id)
    {
        $edit = Post::find($id);
        $edit->title = $request->title;
        $edit->comment = $request->comment;
        $edit->save();

        return $edit;
    }

    public function deletePost($id)
    {
        $delete = Post::find($id);
        $delete->delete();

        // $delete = DB::table('posts')->where('id', $id)->delete();

        return $delete;
    }
}
