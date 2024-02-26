@include('admin.css')
{{-- @include('admin.navbar') --}}

<div class="container mt-6">
    <table class="table table-striped text-white">
        <thead>
        <tr>
            <th>ID</th>
            <th >Title</th>
            <th>Description</th>
            <th>Category</th>
            <th>Quantity </th>
            <th>Price</th>
            <th>Discount</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                  <td>{{$product->id}} </td>
                <td>{{$product->title}} </td>
                <td>{{$product->description}} </td>

                {{-- to show same product whose id is store in table --}}
                @foreach($categories as $category)
                @if($product->category==$category->id)
                <td>{{$category->category}} </td>
                @endif()
                @endforeach()


                <td>{{$product->quantity}} </td>
                <td>{{$product->price}} </td>
                <td>{{$product->discount_price}} </td>
                <td> <img src="storage/{{$product->image}}"></td>

               <td>
                   <a href="{{ route('edit_product', ['id' => $product->id]) }}" class="btn btn-primary btn-sm">Edit</a>

                    <a href=" {{route('delete_product',['id' => $product->id ])}} "class="btn btn-primary btn-sm">Delete</a>
                      </td>
            </tr>
                @endforeach
                @include('admin.script')
