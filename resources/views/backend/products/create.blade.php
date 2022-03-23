<x-layouts.master>
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Add New Category</h3>
            <ol class="breadcrumb mb-4">
                <li><a href="{{ route('categories.index') }}" class="btn btn-danger mx-1">Back to List</a></li>
            </ol>

            <div class="card mb-4">

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-floating mb-3">
                            <select name="category_id" id="category_id" class="form-select">
                                @foreach ($categories as $key => $category)
                                <option value="{{ $key }}">{{ $category }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="small text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="title" name="title" type="text" value="{{ old('title') }}" />
                            <label for="title">Product Title</label>
                            @error('title')
                            <span class="small text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="description" name="description" type="text" rows="3"> {{ old('description') }}</textarea>
                            <label for="description">Product Description</label>
                            @error('description')
                            <span class="small text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <label>Select Tag:</label>
                        <div class="form-floating mb-3">
                            @foreach ($tags as $key => $tag)
                            <input class="form-check-input" type="checkbox" value="
                                        {{ $key }}" name="tag_id[]">
                            {{ $tag }}
                            @endforeach
                        </div>
                        <label>Select Color:</label>
                        <div class="form-floating mb-3">
                            @foreach ($colors as $key => $color)
                            <input class="form-check-input" type="checkbox" value="
                                        {{ $key }}" name="color_id[]">
                            {{ $color }}
                            @endforeach
                        </div>
                        <label>Select Size:</label>
                        <div class="form-floating mb-3">
                            @foreach ($sizes as $key => $size)
                            <input class="form-check-input" type="checkbox" value="
                                        {{ $key }}" name="size_id[]">
                            {{ $size }}
                            @endforeach
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Product Image</label>
                            <input class="form-control" type="file" id="formFile" name="image">
                        </div>

                        <button class="btn btn-primary btn-block" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-layouts.master>