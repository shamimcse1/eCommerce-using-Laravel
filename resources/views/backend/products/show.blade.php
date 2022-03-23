<x-layouts.master>
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Show Product</h3>
            <ol class="breadcrumb mb-4">
                <li><a href="{{ route('products.index') }}" class="btn btn-danger mx-1">Back to List</a></li>
            </ol>

            <div class="card mb-4">
                <div class="row">
                    <div class="col-6">

                        <img src="{{ asset('storage/images/'.$product->image) }}" width="100%" height="100%" />
                    </div>
                    <div class="col-6">
                        <div class="card-body">
                            <h4>Product Title: {{ $product->title }}</h4>
                            <h5>Product Description: {{ $product->description }}</h5>
                            <h5>Product Tags:</h5>
                            <ul>
                                @foreach ($product->tags as $tag)
                                <li>{{ $tag->name }}</li>
                                @endforeach
                            </ul>
                            <h5>Product Colors:</h5>
                            <ul>
                                @foreach ($product->colors as $color)
                                <li>{{ $color->name }}</li>
                                @endforeach
                            </ul>
                            <h5>Product Sizes:</h5>
                            <ul>
                                @foreach ($product->sizes as $size)
                                <li>{{ $size->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </main>
</x-layouts.master>