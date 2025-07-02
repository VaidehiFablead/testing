@extends('app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Add Product</h2>

        <form id="productForm" method="POST" enctype="multipart/form-data" action="{{ route('product.store') }}" >

            <!-- CSRF (for Laravel) -->
            @csrf

            <!-- Product Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" id="name">
                <div id="nameError" class="text-danger"></div>
            </div>

            <!-- Product Image -->
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" name="image" class="form-control" id="image">
                <div id="imageError" class="text-danger"></div>
            </div>

            <!-- Product Price -->
            <div class="mb-3">
                <label for="price" class="form-label">Price (₹)</label>
                <input type="number" name="price" class="form-control" id="price">
                <div id="priceError" class="text-danger"></div>
            </div>

            <!-- Product Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                <div id="descriptionError" class="text-danger"></div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mb-5">Save Product</button>
        </form>
    </div>



    {{-- script --}}
    <script>
        document.getElementById('productForm').addEventListener('submit', function(event) {
            // Clear previous errors
            document.getElementById('nameError').innerText = '';
            document.getElementById('imageError').innerText = '';
            document.getElementById('priceError').innerText = '';
            document.getElementById('descriptionError').innerText = '';

            // Get form fields
            const name = document.getElementById('name');
            const image = document.getElementById('image');
            const price = document.getElementById('price');
            const description = document.getElementById('description');

            let isValid = true;

            // Validate each field and show error below it
            if (name.value.trim() === '') {
                document.getElementById('nameError').innerText = 'Product name is required.';
                isValid = false;
            }

            if (image.value === '') {
                document.getElementById('imageError').innerText = 'Product image is required.';
                isValid = false;
            }

            if (price.value.trim() === '' || parseFloat(price.value) <= 0) {
                document.getElementById('priceError').innerText = 'Enter a valid product price.';
                isValid = false;
            }

            if (description.value.trim() === '') {
                document.getElementById('descriptionError').innerText = 'Product description is required.';
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>
@endsection
