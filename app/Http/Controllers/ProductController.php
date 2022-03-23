<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Tag;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Image;

class ProductController extends Controller
{
    public function index()
    {
        $productsCollection = Product::latest();
        if (request('search')) {
            $productsCollection = $productsCollection
                ->where('description', 'like', '%' . request('search') . '%')
                ->orWhere('title', 'like', '%' . request('search') . '%');
        }
        $products = $productsCollection->paginate(7);
        return view('backend.products.index', compact('products'));
    }
    public function create()
    {
        $tags = Tag::orderBy('name')->pluck('name', 'id')->toArray();
        $colors = Color::orderBy('name')->pluck('name', 'id')->toArray();
        $sizes = Size::orderBy('name')->pluck('name', 'id')->toArray();
        $categories = Category::orderBy('title')->pluck('title', 'id')->toArray();
        return view('backend.products.create', compact('categories', 'tags', 'colors', 'sizes'));
    }
    public function store(ProductRequest $request)
    {
      //  dd($request->all());
        try {

            $product = Product::create([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $this->uploadImage(request()->file('image'))
            ]);

            $product->tags()->attach($request->tag_id);
            $product->colors()->attach($request->color_id);
            $product->sizes()->attach($request->size_id);

            return redirect()->route('products.index')->withMessage('Successfully Created!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
    public function show(Product $product) // Route Model Binding
    {

        return view('backend.products.show', compact('product'));
    }
    public function edit(Product $product) // Route Model Binding
    {
        return view('backend.products.edit', compact('product'));
    }
    public function update(ProductRequest $request, Product $product)
    {
        
        try {

            $requestData = [
                'title' => $request->title,
                'description' => $request->description,
            ];

            if ($request->hasFile('image')) {
                $requestData['image'] = $this->uploadImage(request()->file('image'));
            }

            $product->update($requestData);
           
           
            return redirect()->route('products.index')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('products.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function trash()
    {

        $productsCollection = Product::onlyTrashed()->latest();

        if (request('search')) {
            $productsCollection = $productsCollection
                ->where('description', 'like', '%' . request('search') . '%')
                ->orWhere('title', 'like', '%' . request('search') . '%');
        }
        $products = $productsCollection->paginate(7);
        return view('backend.products.trashed', compact('products'));
    }
    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();
        return redirect()->route('products.trashed')->withMessage('Successfully Restored!');
    }
    public function delete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->forceDelete();
        return redirect()->route('products.trashed')->withMessage('Successfully Deleted Permanently!');
    }


    public function uploadImage($file)
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        Image::make($file)
            ->resize(200, 200)
            ->save(storage_path() . '/app/public/images/' . $fileName);
        return $fileName;
    }
}
