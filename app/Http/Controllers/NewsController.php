<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'cover_image' => 'nullable|image|max:1999',
    ]);

    $fileNameToStore = 'noimage.jpg';
    if ($request->hasFile('cover_image')) {
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
    }

    News::create([
        'title' => $request->title,
        'content' => $request->content,
        'cover_image' => $fileNameToStore,
        'published_at' => now(),
    ]);

    return redirect()->route('news.index')->with('success', 'News post created successfully.');
}


    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'cover_image' => 'nullable|image|max:2048',
            'content' => 'required|string',
            'published_at' => 'nullable|date',
        ]);

        $news = News::findOrFail($id);

        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('public/cover_images');
            $validated['cover_image'] = basename($imagePath);
        }

        $news->update($validated);

        return redirect()->route('news.index')->with('success', 'News updated successfully!');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->route('news.index')->with('success', 'News deleted successfully!');
    }
}
