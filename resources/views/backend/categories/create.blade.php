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
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" id="title" name="title" type="text" value="{{ old('title') }}" />
                            <label for="title">Category Title</label>
                            @error('title')
                            <span class="small text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="description" name="description" type="text" rows="3"> {{ old('description') }}</textarea>
                            <label for="description">Category Description</label>
                            @error('description')
                            <span class="small text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-layouts.master>