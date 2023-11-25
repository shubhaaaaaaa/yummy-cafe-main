<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/main.css">


</head>
<body>
    <div class="order-confirm-page">

    <h1>Order Confirmation</h1> <br>

    <div class="order-info">Hello, {{ucfirst($user_name) }}! You can now go pick up your order. <br> Your order number is <b><span>{{ $orderNumber }}</span></b>. </div>
    <br>
    <div class="button-row">
        <div class="col">
        <div>
            <strong>User ID:</strong> {{$user_id}}
        </div>
        <div>
            <strong>Invoice No.:</strong> {{$invoiceNumber}}
        </div>

        <div>
            <strong>Order Date:</strong> {{$order_date}}
        </div>
        <div>
            <strong>Order Time:</strong> {{$order_time}}
        </div>
        <div>
            <strong>Total:</strong> <b> <span>Rs. {{$total_amount}}</span> </b> 
        </div>
        

        <form action="{{ route('initiatePayment') }}" method="POST" target="_blank">
            @csrf
            <input type="hidden" name="invoice_number" value="{{ $invoiceNumber }}">
            <input type="hidden" name="order_number" value="{{ $orderNumber }}">
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            <input type="hidden" name="total_amount" value="{{ $total_amount }}">
            <input type="hidden" name="order_date" value="{{ $order_date }}">
            <input type="hidden" name="order_time" value="{{ $order_time }}">
            <button type="submit" class="khalti-btn add-to-list-btn">Pay with Khalti</button>
            </form>
        </div>
        <div class="col">
            <img src="assets\img\qrcode.png" alt="">
        </div>
    </div>

    </div>
</body>
</html>
