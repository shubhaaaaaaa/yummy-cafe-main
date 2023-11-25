<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <title>Display</title>

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

        <div class="container">
        <h1>Categories</h1>
        <a href="/manager/categories" class="btn btn-primary mb-3">Add New Category</a>
        <table class="table table-bordered table-custom">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="/manager/categories/{{$category->id}}/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                            <a href="{{ url('manager/display/category/delete/'.$category->id) }}" class="btn btn-sm btn-outline-danger">Delete</a>  
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        
        <h1 class="mt-5">Products</h1>
        <a href="/manager/products" class="btn btn-primary mb-3">Add New Product</a>
        <table class="table table-bordered table-custom">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category ID</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>            
                        @foreach($categories as $category)
                        @if($category->id == $product->category_id)
                        {{ $category->name }}
                                @endif
                                @endforeach
                            </td>
                        <td>{{ $product->price }}</td>
                        <td>  <img src="{{ asset($product->image) }}" alt="Product Image" width="100" height="100"></td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <a href="/manager/products/{{$product->id}}/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                            <a href="{{ url('manager/display/product/delete/'.$product->id) }}" class="btn btn-sm btn-outline-danger">Delete</a>  
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
           
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
