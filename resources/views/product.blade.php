@extends('app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Add Product</h2>

        <form action="/submit-product" method="POST" enctype="multipart/form-data">
            <!-- CSRF (for Laravel) -->
            @csrf 

            <!-- Product Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>

            <!-- Product Image -->
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" name="image" class="form-control" id="image" required>
            </div>

            <!-- Product Price -->
            <div class="mb-3">
                <label for="price" class="form-label">Price (₹)</label>
                <input type="number" name="price" class="form-control" id="price" required>
            </div>

            <!-- Product Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mb-5">Save Product</button>
        </form>
    </div>
@endsection