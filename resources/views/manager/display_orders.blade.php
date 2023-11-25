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

        <script src="{{ asset('assets/vendor/aos/aos.js ')}}"></script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        <style>
            body{ 
                margin: 7rem 19rem;
            }
        </style>

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
    <table class="order-table">
    <thead>
        <tr>
            <th>Order Number</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Total Amount</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <!-- Separator for Pending Orders -->
        <tr class="spacer-row">
            <td colspan="6"> <b> Pending Orders</b></td>
        </tr>
        @foreach ($orders as $index => $order)
            @if ($order->status === 'pending')
                <tr class="status-{{ $order->status }}">
                    <td>{{ $order->order_no }}</td>
                    <td>{{ $order->user_id }}</td>
                    <td>{{ ucfirst($order->user->name) }}</td>
                    <td>{{ $order->total_amount }}</td>
                    <td>
                        <form class="status-form" action="{{ route('updateOrderStatus', ['id' => $order->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()">
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="paid" {{ $order->status === 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach

        <!-- Separator for Paid Orders -->
        <tr class="spacer-row">
            <td colspan="6"> <b>Paid Orders</b> </td>
        </tr>
        @foreach ($orders as $index => $order)
            @if ($order->status === 'paid')
                <tr class="status-{{ $order->status }}">
                    <td>{{ $order->order_no }}</td>
                    <td>{{ $order->user_id }}</td>
                    <td>{{ ucfirst($order->user->name) }}</td>
                    <td>{{ $order->total_amount }}</td>
                    <td>
                        <form class="status-form" action="{{ route('updateOrderStatus', ['id' => $order->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()">
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="paid" {{ $order->status === 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach

        <!-- Separator for Completed Orders -->
        <tr class="spacer-row">
            <td colspan="6"> <b> Completed Orders</b></td>
        </tr>
        @foreach ($orders as $index => $order)
            @if ($order->status === 'completed')
                <tr class="status-{{ $order->status }}">
                    <td>{{ $order->order_no }}</td>
                    <td>{{ $order->user_id }}</td>
                    <td>{{ ucfirst($order->user->name) }}</td>
                    <td>{{ $order->total_amount }}</td>
                    <td>
                        <form class="status-form" action="{{ route('updateOrderStatus', ['id' => $order->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()">
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="paid" {{ $order->status === 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>


</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/manager-header.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.status-form');

            forms.forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    const formData = new FormData(form);

                    fetch(form.action, {
                        method: 'POST',
                        body: formData,
                    }).then(response => {
                        if (response.ok) {
                            console.log('Status updated successfully');
                        }
                    }).catch(error => {
                        console.error('Error updating status:', error);
                    });
                });
            });
        });
</script>

    </body>
</html>
