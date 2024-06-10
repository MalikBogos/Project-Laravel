<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::with('faqs')->get();
        return view('faq.index', compact('categories'));
    }

    public function create()
    {
        return view('faq.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        FaqCategory::create($request->all());
        return redirect()->route('faq.categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(FaqCategory $category)
    {
        return view('faq.categories.edit', compact('category'));
    }

    public function update(Request $request, FaqCategory $category)
    {
        $request->validate(['name' => 'required']);
        $category->update($request->all());
        return redirect()->route('faq.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(FaqCategory $category)
    {
        $category->delete();
        return redirect()->route('faq.categories.index')->with('success', 'Category deleted successfully.');
    }
}
