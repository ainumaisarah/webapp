<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment');  // payment.blade.php
    }

    // Handle payment processing (example)
    public function processPayment(Request $request)
    {
        // Handle payment logic here (e.g., integration with a payment gateway)

        // Example response
        return redirect()->route('payment.index')->with('status', 'Payment successful!');
    }
}
