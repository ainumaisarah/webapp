<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'room_id' => $request->input('room_id'),
            'room_type' => $request->input('room_type'),
            'check_in_date' => $request->input('check_in_date'),
            'check_out_date' => $request->input('check_out_date'),
            'price' => $request->input('price'),
            'guest_count' => $request->input('guest_count'),
        ];
        return view('payment')->with('data', $data);  // payment.blade.php
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
