@extends('app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Product List</h2>

        

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Price (₹)</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            <img src="{{ asset($product->image) }}" width="70" height="70" alt="Product Image">
                        </td>
                        <td>{{ $product->desription }}</td> {{-- Match DB column --}}
                        <td>₹{{ $product->price }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
