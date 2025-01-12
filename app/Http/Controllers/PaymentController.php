<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {

        return view('payment');
        //return view('payment');  // payment.blade.php
    }
    public function shimi()
    {
        return view('success');  // payment.blade.php
    }


    // Handle payment processing (example)
    public function processPayment(Request $request)
    {
        // Handle payment logic here (e.g., integration with a payment gateway)

        // Example response
        return redirect()->route('payment.index')->with('status', 'Payment successful!');
    }
    public function processSuccess(Request $request)
    {
        // Handle payment logic here (e.g., integration with a payment gateway)

        // Example response
        return redirect()->route('success.shimi')->with('status', 'Payment successful!');
    }
}
