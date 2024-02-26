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

        </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
      @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session()->get('message')}}
                    <button type="button" class="close" data-dismiss="alert" area-hidden="true">x</button>
                </div>
            @endif

                  <div class="center">
                    <h1 class="size">Edit Category</h1>
                    <form action="{{route('add_category')}}" method="post">
                        @csrf
                      <input type="text" name="category" placeholder="Category Name" class="mt-5 mr-3 field ">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </form>
        
                    </div>
                </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>
