<!DOCTYPE html>
<html>
<head>
    <title>My Site</title>
    <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
</head>
<body>

<form id="orderForm" action="{{ route('order.confirmation') }}?_token={{ csrf_token() }}" method="GET">
@csrf
<div class="invoice-window">
        <div class="invoice-content">
            <div class="bill-header">
                <h2>Invoice</h2>
                <div class="bill-details">
                    <p><strong>Yummy Cafe</strong></p>
                    <p>Kist College of Management, Kamalpokhari, Kathmandu</p>
                </div>
            </div>
            <div class="bill-table">
                <table>
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="billItems"></tbody>
                </table>
            </div>
            <div class="bill-footer row">
                <div class="col">
                    <div class="bill-total">
                    <p><strong>Total:</strong> <span id="total">Rs 0</span></p>
                    <input type="hidden" name="total_amount" id="total_amount" value="0">
                    </div>
                    <div class="mb-5 mt-2" id="confirmOrderContainer">
                        @if(auth()->check())
                        <button class="confirm-order-btn align-right-btn" type="button" onclick="validateAndConfirmOrder()">Confirm Order</button>
                        @else
                            <a href="{{ route('login') }}" class="login-btn">Log In</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


</body>
<script>
    var loginUrl = "{{ route('login') }}";
</script>
</html>
    