<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $posts = Post::with('user')->get(); // Fetch posts with user information
    return view('posts.index', compact('posts')); // Pass $posts to the view
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


    public function destroyComment(Comment $comment)
    {
        // Ensure the authenticated user can delete the comment
        if (auth()->user()->id !== $comment->user_id && !auth()->user()->isAdmin()) {
            return redirect()->back()->with('error', 'Unauthorized action');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Check if the authenticated user is authorized to delete the post
        if (!Auth::user()->isAdmin() && Auth::id() !== $post->user_id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        // Default cover images that should not be deleted
        $defaultImages = ['noimage.jpg', 'colomapark.png', 'history.png', 'events.png', 'restaurants.png'];

        // Delete post's cover image from storage if it exists and is not a default image
        if ($post->cover_image && !in_array($post->cover_image, $defaultImages)) {
            Storage::delete('public/cover_images/' . $post->cover_image);
        }

        // Delete all comments associated with the post
        $post->comments()->delete();

        // Delete the post itself
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted');
    }

    public function welcome()
    {
        $posts = Post::inRandomOrder()->limit(3)->get();

        return view('welcome', compact('posts'));
    }
}
