<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\Product;
use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function confirmOrder(Request $request)
    {
        $user = $request->user();
        $totalAmount = $request->input('total_amount');
    
        // Generate order number
        $orderNumber = 'ORD-' . str_pad(Order::count() + 1, 4, '0', STR_PAD_LEFT);
    
        // Generate invoice number
        $invoiceNumber = $this->generateInvoiceNumber();
    
        // Create the order
        $order = new Order([
            'order_no' => $orderNumber,
            'invoice_no' => $invoiceNumber,
            'total_amount' => $totalAmount,
            'status' => 'pending',
            'order_date' => Carbon::now()->format('Y-m-d'),
            'order_time' => Carbon::now()->format('H:i:s'),
        ]);
    
        // Associate the order with the user
        $order->user()->associate($user);
        $order->save();
    
        // Pass the data to the view and return it
        return view('user.order-confirmation', [
            'invoiceNumber' => $invoiceNumber,
            'orderNumber' => $orderNumber,
            'user_id' => $user->id,
            'order_date' => $order->order_date,
            'order_time' => $order->order_time,
            'user_name' => $user->name,
            'total_amount' => $totalAmount,
        ]);
    }
    
    function generateInvoiceNumber() {
        $prefix = "INV-";
        $uniquePart = strtoupper(substr(md5(uniqid()), 0, 12)); // Convert to uppercase
    
        return $prefix . $uniquePart;
    }

    public function ongoingOrder(Request $request)
    {
        // Assuming you have the user ID from the authenticated user
        $userId = $request->user()->id;

        // Fetch ongoing orders for the specific user from the database
        $ongoingOrders = Order::where('user_id', $userId)
            ->where('status', 'pending')
            ->get();

        // Pass the orders to the view
        return view('user.ongoing-order', ['ongoingOrders' => $ongoingOrders]);
    }
}