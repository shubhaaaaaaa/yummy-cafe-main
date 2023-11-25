<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function initiatePayment(Request $request)
{
    $apiUrl = 'https://a.khalti.com/api/v2/epayment/initiate/';
    $user = auth()->user();
    $total_amount = $request->input('total_amount') * 100;

    $payload = [
        'return_url' => route('payment.success'), // Use the named route for payment success
        'website_url' => 'http://127.0.0.1/',
        'amount' => $total_amount, 
        'purchase_order_id' => 'test12',
        'purchase_order_name' => 'test',
        'customer_info' => [
            'name' => $user->name, 
            'email' => $user->email, 
        ],
    ];

    $response = \Illuminate\Support\Facades\Http::withHeaders([
        'Authorization' => 'Key 9f386f72ad1148ea8759aaf9de09270b' // Replace with your actual live server key
    ])->post($apiUrl, $payload);

    if ($response->successful()) {
        $paymentData = $response->json();

        // Redirect the user to the payment URL
        return redirect($paymentData['payment_url']);
    } else {
        // Handle error response
        return $response->body();
    }
}

public function paymentSuccess(Request $request)
{
    // Get the pidx value from the query parameters
    $pidx = $request->query('pidx');

    // Add any logic you want to perform when the payment is successful.
    // For example, displaying a success message or updating the payment status in your database.

    // Construct the redirect URL using the extracted pidx value
    $redirectUrl = 'https://test-pay.khalti.com/?pidx=' . $pidx;

    // Redirect the user to the dynamically generated URL
    return redirect($redirectUrl);

}

}
