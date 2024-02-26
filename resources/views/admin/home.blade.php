<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
<style>
    h1{
        height: 10vh;
        padding: 3%;
    }
</style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->

        @include('admin.navbar')


            <div class="">
      @include('admin.sidebar')
      <!-- partial -->

        <!-- partial -->
        @include('admin.body')



    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')


  </body>
</html>
