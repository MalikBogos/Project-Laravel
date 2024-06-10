<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function managePosts()
    {
        $posts = Post::all();
        return view('admin.manage-posts', compact('posts'));
    }

    public function editPost($id)
    {
        $post = Post::find($id);
        return view('admin.edit-post', compact('post'));
    }

    public function updatePost(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        if ($request->hasFile('cover_image')) {
            $post->cover_image = $request->file('cover_image')->store('cover_images', 'public');
        }
        $post->save();

        return redirect()->route('admin.manage-posts')->with('success', 'Post updated successfully');
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.manage-posts')->with('success', 'Post deleted successfully');
    }
}
