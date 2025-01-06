@extends('master.layout')

@section('content')

<!-- Hero Section -->
<div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                <div class="text">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span> <span>Payment</span></p>
                    <h1 class="mb-4 bread">Payment</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Payment Section -->
<div class="reviews-container">
    <div class="overall-payment">
        <h2>Payment</h2>
        <div class="payment-info">
            <span class="info">Please complete your payment below:</span>
        </div>
    </div>

    <div class="review-form">
        <h3>Enter Payment Details</h3>
        <form action="{{ route('payment.process') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" name="amount" id="amount" placeholder="Enter amount" required class="form-control">
            </div>

            <div class="form-group">
                <label for="card_number">Card Number</label>
                <input type="text" name="card_number" id="card_number" placeholder="Enter card number" required class="form-control">
            </div>

            <div class="form-group">
                <label for="expiry_date">Expiry Date</label>
                <input type="month" name="expiry_date" id="expiry_date" required class="form-control">
            </div>

            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" name="cvv" id="cvv" placeholder="Enter CVV" required class="form-control">
            </div>

            <button type="submit" class="btn-post">Make Payment</button>
        </form>
    </div>
</div>

@endsection

<script>
    // Optional: Add any custom JS for payment functionality or validation
</script>
