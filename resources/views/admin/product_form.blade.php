<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Title</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- @include('admin.css') --}}
    <style>
        body {
            background-color: rgb(0, 0, 0);
        }

        .form {
            background-color: rgb(36, 36, 36);
            padding: 3%;
            margin: 4%;
            color: rgb(255, 255, 255);
        }

        .field {
            color: whitesmoke;

            background-color: rgb(36, 36, 36);
        }

        /*
        .form-group label[for="category"],
        .form-group label[for="price"] {
            background-color: #383535;
            padding: 5px;
            display: inline-block;
            margin-bottom: 5px;
            width: 100%;
        } */

        /* Optionally style the select and input fields within the form-group */
        /*  */
    </style>
</head>

<body>
    @include('admin.navbar')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form action="{{ route('product_added') }}" method="post" enctype="multipart/form-data" class="form">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" id="title"
                            class="form-control field" placeholder="Title">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" value="{{ old('description') }}" id="description"
                            class="form-control field" placeholder="Description">
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Product Image</label>
                        <input type="file" name="image" id="image" class="form-control field">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" selected="{{ old('category') }}" id="category"
                            class="form-control field">
                            <option value="" disabled>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->category }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label for="price">Price</label>
                        <input type="text" name="price" value="{{ old('price') }}" id="price"
                            class="form-control field" placeholder="Price">
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" value="{{ old('quantity') }}" id="quantity"
                            class="form-control field" placeholder="Quantity">
                        @error('quantity')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="discount_price">Discount Price</label>
                        <input type="text" name="discount_price" value="{{ old('discount_price') }}"
                            id="discount_price" class="form-control field" placeholder="Discount">
                        @error('discount_price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-dark btn-block">Add Product</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap and other scripts -->
</body>

</html>
