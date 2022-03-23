<x-layouts.master>
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Show Tag</h3>
            <ol class="breadcrumb mb-4">
                <li><a href="{{ route('tags.index') }}" class="btn btn-danger mx-1">Back to List</a></li>
            </ol>

            <div class="card mb-4">
                <div class="card-body">
                    <h4>Tag: {{ $tag->name }}</h4>
                </div>

            </div>
    </main>
</x-layouts.master>