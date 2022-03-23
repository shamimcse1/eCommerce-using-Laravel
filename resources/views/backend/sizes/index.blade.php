<x-layouts.master>
    <main>
    <div class="container-fluid px-4">
            <h1 class="mt-4">Sizes</h1>
            <ol class="breadcrumb mb-4">
                {{-- <li class="breadcrumb-item active">Size</li> --}}

            </ol>

            <ol class="breadcrumb mb-4">

                <a href="{{ route('sizes.create') }}" class="btn btn-success mx-1">Add New</a>
                <a href="" class="btn btn-primary mx-1">Download PDF</a>
                <a href="" class="btn btn-danger mx-1">Download Excel</a>
            </ol>


            <div class="card mb-4">
                <div class="card-header">
                    <div>
                        <i class="fas fa-table me-1"></i>
                        Size List
                    </div>

                </div>

                <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <form method="GET" action="{{ route('sizes.index') }}">
                        </form>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sl=0 @endphp
                                @foreach ($sizes as $size)
                                    <tr>
                                        <td>{{ ++$sl }}</td>
                                        <td>{{ $size->name }}</td>
                                        <td><a class="btn btn-primary btn-sm"
                                                href="{{ route('sizes.show', ['size' => $size->id]) }}">Show</a>
                                            <a class="btn btn-warning btn-sm"
                                                href="{{ route('sizes.edit', ['size' => $size->id]) }}">Edit</a>
                                            <form style="display: inline;"
                                                action="{{ route('sizes.destroy', ['size' => $size->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('Are you want to delete?')"
                                                    class="btn btn-danger btn-sm" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $sizes->links() }}
                    </div>
            </div>
        </div>
    </main>
</x-layouts.master>
