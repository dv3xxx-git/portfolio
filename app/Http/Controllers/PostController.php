<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $post = Post::all();

        return response()->json([
            'post' => $post,
        ]);
    }

    public function create(Request $request, Post $post)
    {
        $post->fill($request->toArray());
        $post->save();

        return response()->json([
            $post
        ]);
    }

    public function find($id)
    {
        return response()->json([
            Post::findorfail($id),
        ]);
    }

    public function edit(Request $request, $id)
    {
        $post = Post::findorfail($id);
        $post->header = $request->header;
        $post->text = $request->text;
        $post->preview = $request->preview;
        $post->save();

        return response()->json([
            'succsee'
        ]);
    }

    public function delete($id)
    {
        $post = Post::findorfail($id);
        $post->delete();

        return response()->json([
            'succsee'
        ]);
    }
}
