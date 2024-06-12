<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::all();
        return view('admin.edit-categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        FaqCategory::create($request->all());
        return redirect()->route('faq.categories.index')->with('success', 'Category created successfully.');
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
