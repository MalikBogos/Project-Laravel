<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Comment;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all posts with user information
        $posts = Post::with('user')->get();

        // Return the view and pass the posts variable
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'cover_image' => 'image|nullable|max:1999'
    ]);

    $fileNameToStore = 'noimage.jpg'; // Initialize with a default value

    if ($request->hasFile('cover_image')) {
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
    }

    $post = new Post;
    $post->user_id = auth()->user()->id;
    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->cover_image = $fileNameToStore; // Assign the value here
    $post->save();

    return redirect('/posts')->with('success', 'Post Created');
}


 /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Retrieve the post along with its comments and related user
        $post = Post::with(['comments.user', 'user'])->findOrFail($id);

        // Return the view and pass the post variable
        return view('posts.show', compact('post'));
    }

    /**
     * Store a newly created comment.
     */
    public function storeComment(Request $request, $postId)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $comment = new Comment;
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $postId;
        $comment->content = $request->input('comment');
        $comment->save();

        return back()->with('success', 'Comment added.');
    }


    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Allow admins to delete any post or the author to delete their own post
        if (auth()->user()->id !== $post->user_id && !auth()->user()->isAdmin()) {
            return redirect('/posts')->with('error', 'Unauthorized action');
        }

        $post->delete();

        return redirect('/posts')->with('success', 'Post deleted');
    }
}
