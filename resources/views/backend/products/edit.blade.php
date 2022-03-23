<x-layouts.master>
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Edit Products</h3>
            <ol class="breadcrumb mb-4">
                <li><a href="{{ route('products.index') }}" class="btn btn-danger mx-1">Back to List</a></li>
            </ol>
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
                <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-floating mb-3">
                        <input class="form-control" id="title" name="title" type="text" value="{{ old('title', $product->title) }}" />
                        <label for="title">Product Title</label>
                        @error('title')
                        <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="description" name="description" type="text" rows="3"> {{ old('description', $product->description) }}</textarea>
                        <label for="description">Product Description</label>
                        @error('description')
                        <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Product Image</label>
                        <input class="form-control" type="file" id="formFile" name="image">
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </main>
</x-layouts.master>