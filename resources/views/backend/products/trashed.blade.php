<x-layouts.master>
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="card m-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Products
                        <a class="btn btn-sm btn-info" href="{{ route('products.create') }}">Add New</a><input
                            class="form-control float-end" style="width: 200px;" name="search"
                            placeholder="Search Here" />
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <form method="GET" action="{{ route('products.index') }}">
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
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ ++$sl }}</td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td><a class="btn btn-primary btn-sm"
                                                href="{{ route('products.restore', ['product' => $product->id]) }}">Restore</a>
                                            <form style="display: inline;"
                                                action="{{ route('products.delete', ['product' => $product->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('Are you want to delete parmanently?')"
                                                    class="btn btn-danger btn-sm" type="submit">Parmanent
                                                    Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layouts.master>
