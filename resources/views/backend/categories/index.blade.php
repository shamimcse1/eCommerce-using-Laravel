<x-layouts.master>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Categories</h1>
            <ol class="breadcrumb mb-4">
                {{-- <li class="breadcrumb-item active">Categories</li> --}}

            </ol>

            <ol class="breadcrumb mb-4">

                <a href="{{ route('categories.create') }}" class="btn btn-success mx-1">Add New</a>
                <a href="" class="btn btn-primary mx-1">Download PDF</a>
                <a href="" class="btn btn-danger mx-1">Download Excel</a>
            </ol>


            <div class="card mb-4">
                <div class="card-header">
                    <div>
                        <i class="fas fa-table me-1"></i>
                        Category List
                    </div>

                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    <form method="GET" action="{{ route('categories.index') }}">
                    </form>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $sl=0 @endphp
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ ++$sl }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->description }}</td>
                                <td><a class="btn btn-primary btn-sm" href="{{ route('categories.show', ['category' => $category->id]) }}">Show</a>
                                    <a class="btn btn-warning btn-sm" href="{{ route('categories.edit', ['category' => $category->id]) }}">Edit</a>
                                    <form style="display: inline;" action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('Are you want to delete?')" class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>

            </div>
        </div>
    </main>
</x-layouts.master>