@extends('master.layout')
@section('content')

<div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
        <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
            <div class="text">
              <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span> <span>About</span></p>
              <h1 class="mb-4 bread">Reviews</h1>
          </div>
        </div>
      </div>
    </div>
  </div>


<div class="reviews-container">
    <div class="overall-rating">
        <h2>Reviews</h2>
        <div class="rating-score">
            <span class="score">9.1</span>
            <span class="label">Excellent</span>
            <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        </div>
    </div>

    <div class="review-form">
        <h3>Review</h3>
        <div class="rating-options">
            <span>Rating</span>
            <div class="stars" data-score="0" id="rating"></div>
        </div>
        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf
            <input type="hidden" name="rating" id="rating-score">
            <textarea name="review_text" placeholder="Your review..." required></textarea>
            <button type="submit" class="btn-post">Post Review</button>
        </form>
    </div>

    <div class="guest-reviews">
        <h3>Guest Reviews</h3>
        <p>4,789 reviews</p>

        <div class="guest-review">
            <div class="guest-info">
                <p><strong>Matthew</strong> <br> Spain</p>
                <p>Deluxe Twin Room <br> 1 night - November 2024</p>
            </div>
            <div class="review-text">
                <!-- Review text here -->
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#rating').raty({
            half: true,
            starType: 'i', // Use <i> tags for stars
            starOn: 'fa fa-star',
            starHalf: 'fa fa-star-half-o',
            starOff: 'fa fa-star-o',
            click: function(score, evt) {
                $('#rating-score').val(score);
            }
        });
    });
</script>

@endsection
