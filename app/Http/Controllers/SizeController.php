<?php

namespace App\Http\Controllers;

use App\Http\Requests\SizeRequest;
use App\Models\Size;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SizeController extends Controller
{
    public function index()
    {

        $sizesCollection = Size::latest();

        if (request('search')) {
            $sizesCollection = $sizesCollection
                ->where('name', 'like', '%' . request('search') . '%');
        }
        $sizes = $sizesCollection->paginate(7);
        return view('backend.sizes.index', compact('sizes'));
    }
    public function create()
    {
        return view('backend.sizes.create');
    }
    public function store(SizeRequest $request)
    {
        try {
            Size::create([
                'name' => $request->name,
            ]);
            return redirect()->route('sizes.index')->withMessage('Successfully Created!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
    public function show(Size $size) // Route Model Binding
    {
        return view('backend.sizes.show', compact('size'));
    }
    public function edit(Size $size) // Route Model Binding
    {
        return view('backend.sizes.edit', compact('size'));
    }
    public function update(SizeRequest $request, Size $size)
    {
        try {
            $size->update([
                'name' => $request->name,
            ]);
            return redirect()->route('sizes.index')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
    public function destroy(Size $size)
    {
        try {
            $size->delete();
            return redirect()->route('sizes.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
    public function trash()
    {

        $sizesCollection = Size::onlyTrashed()->latest();

        if (request('search')) {
            $sizesCollection = $sizesCollection
                ->where('name', 'like', '%' . request('search') . '%');
        }
        $sizes = $sizesCollection->paginate(7);
        return view('backend.sizes.trashed', compact('sizes'));
    }
    public function restore($id)
    {
        $size = Size::onlyTrashed()->findOrFail($id);
        $size->restore();
        return redirect()->route('sizes.trashed')->withMessage('Successfully Restored!');
    }
    public function delete($id)
    {
        $size = Size::onlyTrashed()->findOrFail($id);
        $size->forceDelete();
        return redirect()->route('sizes.trashed')->withMessage('Successfully Deleted Permanently!');
    }
}
