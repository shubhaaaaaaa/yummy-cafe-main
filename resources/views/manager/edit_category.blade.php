<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <title>Category</title>

        <link rel="stylesheet" href="{{ asset('assets/css/manager-header.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    </head>
    <body>

    @extends('layouts/header')
    @section('sidebar-icon')
    <nav class="sb-topnav navbar navbar-expand ms-3">
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" class="sidebar-toggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
    @endsection
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav" class="sidebar">
            @include('layouts/sidebar')
        </div>
        
        <div id="layoutSidenav_content">
            <h3 class="mb-5">Edit Category {{$category->name}} </h3>
            <form action="/manager/categories/{{$category->id}}/update" method="POST" enctype="multipart/form-data" id="formContainer">        @csrf
            @method('PUT')
         <div class="mb-3">
            <label for="name" class="form-label">Category Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $category->name}}"  required>
          </div>

          <button type="submit" class="btn btn-primary mt-2">Update Category</button>
        </form>


           
        </div>
    </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/manager-header.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>

        <script>
    $(document).ready(function() {
        $('#sidebarToggle').on('click', function() {
            $('body').toggleClass('sb-sidenav-toggled');
        });

        const sidebar = document.getElementById('layoutSidenav_nav');
        const sidebarToggle = document.getElementById('sidebarToggle');

        sidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('collapsed');
        });
    });

    const form = document.querySelector('#formContainer');

    // Listen for form submission
    form.addEventListener('submit', function(event) {
      // Prevent the default form submission
      event.preventDefault();

      // Perform any additional processing or AJAX requests if needed

      // Reset the form
      form.reset();
    });
</script>

    </body>
</html>
