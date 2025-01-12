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
                <p><strong>Tax:</strong> MYR 30.00</p>ssssssss
                <p><strong>Total:</strong> MYR 1,546.00</p>
                <h3>Cancellation Policy</h3>
                <p><strong>Cancellation Fee:</strong> MYR 600.00</p>
                <p><strong>Refund:</strong> The refund depends on the cancellation policy in the booking terms.</p>
                <p><strong>Contact:</strong> +6013-2322112 (Help)</p>
            </div>saddsa
        </div>
    </div>

    <div class="review-form">
        <h3>Enter Payment Details</h3>
        <form action="{{ route('success.shimi') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="amount">Amount</label>S

                <p><strong>Total:</strong> MYR 1,546.00</p>

            </div>

            <div class="form-group">
                <label for="card_number">Card Number</label>
                <input type="number" name="card_number" id="card_number" required class="form-control">

            </div>

            <div class="form-group">
                <label for="expiry_date">Expiry Date</label>
                <input type="month" name="expiry_date" id="expiry_date" required class="form-control">
            </div>

            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" name="cvv" id="cvv" placeholder="Enter CVV" required class="form-control">
            </div>

            <button type="submit" class="btn-post" ><a href="/success"></a>Make Payment</button>

        </form>


    </div>
</div>

@endsection

<script>
    function makePayment(method) {
                    // Implement payment logic here
                    alert('Payment method selected: ' + method);
                }
</script>
