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

    <div class="container">
        <div class="content">
            <div class="booking-details">
                <div class="header">
                    <div class="logo">Moonlit Lagoon Hotel</div>
                    <button>Contact Us</button>
                </div>
                <h3>Booking Details</h3>
                <p><strong>Location:</strong> Kuala Lumpur, Malaysia</p>
                <p><strong>Check-in:</strong> Friday, 20 Apr 2024, 15:00-23:00</p>
                <p><strong>Check-out:</strong> Sunday, 30 Apr 2024, 08:00-12:30</p>
                <p><strong>Total Length of Stay:</strong> 9 nights</p>
                <p><strong>Selection:</strong> 1 room for 2 adults</p>
                <div class="stars">
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">☆</span>
                </div>
            </div>
            <div class="payment-summary">
                <h3>Payment Summary</h3>
                <p><strong>Subtotal:</strong> MYR 1,516.00</p>
                <p><strong>Tax:</strong> MYR 30.00</p>
                <p><strong>Total:</strong> MYR 1,546.00</p>
                <h3>Cancellation Policy</h3>
                <p><strong>Cancellation Fee:</strong> MYR 600.00</p>
                <p><strong>Refund:</strong> The refund depends on the cancellation policy in the booking terms.</p>
                <p><strong>Contact:</strong> +6013-2322112 (Help)</p>
            </div>
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

         <!--
        <div class="container">
            <h1>Make a Payment</h1>
            <form action=" method="POST">
                @csrf
                <div class="form-group">
                    <label for="booking_id">Booking ID</label>
                    <input type="text" name="booking_id" id="booking_id" class="form-control" placeholder="Enter Booking ID" required>
                    @error('booking_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount" step="0.01" required>
                    @error('amount')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="payment_status">Payment Status</label>
                    <select name="payment_status" id="payment_status" class="form-control" required>
                        <option value="success">Success</option>
                        <option value="fail">Fail</option>
                    </select>
                    @error('payment_status')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit Payment</button>
            </form>
        </div>-->
    </div>
</div>

@endsection

<script>
    // Optional: Add any custom JS for payment functionality or validation
</script>
