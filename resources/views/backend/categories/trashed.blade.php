<x-layouts.master>
    <main>

        <div class="container-fluid px-4">
            <h3 class="mt-4">Add New Category</h3>
            <ol class="breadcrumb mb-4">
                <li><a href="{{ route('categories.create') }}" class="btn btn-danger mx-1">Back to List</a></li>
            </ol>
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
                            <td><a class="btn btn-primary btn-sm" href="{{ route('categories.restore', ['category' => $category->id]) }}">Restore</a>
                                <form style="display: inline;" action="{{ route('categories.delete', ['category' => $category->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Are you want to delete parmanently?')" class="btn btn-danger btn-sm" type="submit">Parmanent
                                        Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
    </main>
</x-layouts.master>