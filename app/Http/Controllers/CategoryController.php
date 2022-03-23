<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categoriesCollection = Category::latest();
        if (request('search')) {
            $categoriesCollection = $categoriesCollection
                ->where('description', 'like', '%' . request('search') . '%')
                ->orWhere('title', 'like', '%' . request('search') . '%');
        }
        $categories = $categoriesCollection->paginate(7);
        return view('backend.categories.index', compact('categories'));
    }
    public function create()
    {
        return view('backend.categories.create');
    }
    public function store(CategoryRequest $request)
    {
        try {
            Category::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            return redirect()->route('categories.index')->withMessage('Successfully Created!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
    public function show(Category $category) // Route Model Binding
    {
        return view('backend.categories.show', compact('category'));
    }
    public function edit(Category $category) // Route Model Binding
    {
        return view('backend.categories.edit', compact('category'));
    }
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $category->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            return redirect()->route('categories.index')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('categories.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
    public function trash()
    {

        $categoriesCollection = Category::onlyTrashed()->latest();

        if (request('search')) {
            $categoriesCollection = $categoriesCollection
                ->where('description', 'like', '%' . request('search') . '%')
                ->orWhere('title', 'like', '%' . request('search') . '%');
        }
        $categories = $categoriesCollection->paginate(7);
        return view('backend.categories.trashed', compact('categories'));
    }
    public function restore($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();
        return redirect()->route('categories.trashed')->withMessage('Successfully Restored!');
    }
    public function delete($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        return redirect()->route('categories.trashed')->withMessage('Successfully Deleted Permanently!');
    }
}
