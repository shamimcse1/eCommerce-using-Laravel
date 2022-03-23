<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ColorController extends Controller
{
    public function index()
    {

        $colorsCollection = Color::latest();

        if (request('search')) {
            $colorsCollection = $colorsCollection
                ->where('name', 'like', '%' . request('search') . '%');
        }
        $colors = $colorsCollection->paginate(7);
        return view('backend.colors.index', compact('colors'));
    }
    public function create()
    {
        return view('backend.colors.create');
    }
    public function store(ColorRequest $request)
    {
        try {
            Color::create([
                'name' => $request->name,
            ]);
            return redirect()->route('colors.index')->withMessage('Successfully Created!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
    public function show(Color $color) // Route Model Binding
    {
        return view('backend.colors.show', compact('color'));
    }
    public function edit(Color $color) // Route Model Binding
    {
        return view('backend.colors.edit', compact('color'));
    }
    public function update(ColorRequest $request, Color $color)
    {
        try {
            $color->update([
                'name' => $request->name,
            ]);
            return redirect()->route('colors.index')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
    public function destroy(Color $color)
    {
        try {
            $color->delete();
            return redirect()->route('colors.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
    public function trash()
    {

        $colorsCollection = Color::onlyTrashed()->latest();

        if (request('search')) {
            $colorsCollection = $colorsCollection
                ->where('name', 'like', '%' . request('search') . '%');
        }
        $colors = $colorsCollection->paginate(7);
        return view('backend.colors.trashed', compact('colors'));
    }
    public function restore($id)
    {
        $color = Color::onlyTrashed()->findOrFail($id);
        $color->restore();
        return redirect()->route('colors.trashed')->withMessage('Successfully Restored!');
    }
    public function delete($id)
    {
        $color = Color::onlyTrashed()->findOrFail($id);
        $color->forceDelete();
        return redirect()->route('colors.trashed')->withMessage('Successfully Deleted Permanently!');
    }
}
