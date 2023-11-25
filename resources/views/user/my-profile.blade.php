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

    @endsection
    <div style="margin-top: 7rem; padding-left: 3rem; padding-right: 50rem;">

        <div id="layoutSidenav_content">

        <div class="user-card">
        <h3>Profile Details</h3>
        <hr>
        <p><span class="label">Name :</span> {{ ucfirst($username) }}</p>
        <p><span class="label">Email :</span> {{ $email }}</p>
        <p><span class="label">ID No :</span> {{ $id }}</p>
      </div>
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
