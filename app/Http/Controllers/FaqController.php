<?php
namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::with('faqs')->get();

        if (Auth::check() && Auth::user()->isAdmin()) {
            return view('admin.faq', compact('categories'));
        }

        return view('faq.index', compact('categories'));
    }

    public function create()
    {
        $categories = FaqCategory::all();
        return view('admin.create-faq', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|max:1000',
            'answer' => 'required|max:1000',
            'category_id' => 'required|exists:faq_categories,id',
        ]);

        Faq::create($request->all());
        return redirect()->route('faq.index')->with('success', 'FAQ created successfully.');
    }

    public function edit(Faq $faq)
    {
        $categories = FaqCategory::all();
        return view('admin.edit-faq', compact('faq', 'categories'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|max:1000',
            'answer' => 'required|max:1000',
            'category_id' => 'required|exists:faq_categories,id',
        ]);

        $faq->update($request->all());
        return redirect()->route('faq.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faq.destroy')->with('success', 'FAQ deleted successfully.');
    }
}
