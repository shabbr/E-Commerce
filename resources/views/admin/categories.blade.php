<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
<style>
    .center{
        text-align: center;
    }
    .field{
       color:black;
    }
.size{
    font-size: 3rem;
}
.side{
    display: flex;
    width: 25%;
}
.category{
   margin-left: 20%;
   margin-top: 3%;
}
</style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->

      <!-- partial -->

      @include('admin.navbar')

        <!-- partial -->
        <div class="main-panel category">
            <div class="content-wrapper col-8">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session()->get('message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                </div>
            @endif

            {{-- message for delete category --}}
            @if(session()->has('del_message'))
            <div class='alert alert-success'>
                {{session()->get('del_message')}}
                <button type='button' class='close' data-dismiss='alert' aria-hidden="true">x</button>
            </div>
            @endif


                  <div class="center">
                    <h1 class="size">Add Category</h1>
                    <form action="{{route('add_category')}}" method="post">
                        @csrf
                      <input type="text" name="category" placeholder="Category Name" class="mt-5 mr-3 field ">
                      <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                    <div class="container mt-4">
    <table class="table table-striped text-white">
        <thead>
        <tr>
            <th>ID</th>
            <th >Category</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                  <td>{{$category->id}} </td>
                <td>{{$category->category}} </td>
                <td>
                    {{-- <a href="{{ route('edit_category', ['id' => $category->id]) }}" class="btn btn-primary btn-sm">Update</a> --}}

                    <a href=" {{route('delete_category',['id' => $category->id ])}} "class="btn btn-primary btn-sm">Delete</a>
                </td>
            </tr>
                @endforeach





        </tbody>
    </table>
</div>
</div>
</div>

</div>
    @include('admin.script')
  </body>
</html>
