<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <title>Manager Dashboard</title>

        <link rel="stylesheet" href="{{ asset('assets/css/manager-header.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        <!-- aos define  -->
        <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

        <!-- jquery  -->
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  -->

        <!-- chart.js  -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
        <!-- my code  -->
        <div class="chart-container">
            <div class="chart-wrapper">
                <h1>Order Status</h1>
                <canvas id="orderStatusChart"></canvas>
            </div>
            <div class="chart-wrapper">
                <h1>Sales Chart</h1>
                <canvas id="monthlySalesChart"></canvas>
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
</script>
<script>
    const pendingOrders = {!! json_encode($pendingOrders) !!};
    const paidOrders = {!! json_encode($paidOrders) !!};
    const completedOrders = {!! json_encode($completedOrders) !!};

    const monthlySales = {!! json_encode($monthlySales) !!};

</script>
<script src="{{ asset('assets/js/chart.js') }}"></script>

    </body>
</html>
