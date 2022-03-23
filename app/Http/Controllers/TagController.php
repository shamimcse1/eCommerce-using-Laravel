<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    public function index()
    {

        $tagsCollection = Tag::latest();

        if (request('search')) {
            $tagsCollection = $tagsCollection
                ->where('name', 'like', '%' . request('search') . '%');
        }
        $tags = $tagsCollection->paginate(7);
        return view('backend.tags.index', compact('tags'));
    }
    public function create()
    {
        return view('backend.tags.create');
    }
    public function store(TagRequest $request)
    {
        try {
            Tag::create([
                'name' => $request->name,
            ]);
            return redirect()->route('tags.index')->withMessage('Successfully Created!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
    public function show(Tag $tag) // Route Model Binding
    {
        return view('backend.tags.show', compact('tag'));
    }
    public function edit(Tag $tag) // Route Model Binding
    {
        return view('backend.tags.edit', compact('tag'));
    }
    public function update(TagRequest $request, Tag $tag)
    {
        try {
            $tag->update([
                'name' => $request->name,
            ]);
            return redirect()->route('tags.index')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
    public function destroy(Tag $tag)
    {
        try {
            $tag->delete();
            return redirect()->route('tags.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
    public function trash()
    {

        $tagsCollection = Tag::onlyTrashed()->latest();

        if (request('search')) {
            $tagsCollection = $tagsCollection
                ->where('name', 'like', '%' . request('search') . '%');
        }
        $tags = $tagsCollection->paginate(7);
        return view('backend.tags.trashed', compact('tags'));
    }
    public function restore($id)
    {
        $tag = Tag::onlyTrashed()->findOrFail($id);
        $tag->restore();
        return redirect()->route('tags.trashed')->withMessage('Successfully Restored!');
    }
    public function delete($id)
    {
        $tag = Tag::onlyTrashed()->findOrFail($id);
        $tag->forceDelete();
        return redirect()->route('tags.trashed')->withMessage('Successfully Deleted Permanently!');
    }
}
