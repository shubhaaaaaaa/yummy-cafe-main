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
    <h3>Ongoing Orders</h3> <br>
    <table class="order-table">
        <thead>
            <tr>
                <th>ID No</th>
                <th>Invoice Number</th>
                <th>Order Number</th>
                <th>Order Date</th>
                <th>Order Time</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ongoingOrders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->invoice_no }}</td>
                    <td>{{ $order->order_no }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->order_time }}</td>
                    <td>{{ $order->total_amount }}</td>
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
      event.preventDefault();
      form.reset();
    });
</script>

    </body>
</html>
