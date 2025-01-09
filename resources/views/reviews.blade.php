@extends('master.layout')
@section('content')
@php
    use Carbon\Carbon;
@endphp
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
        <h2>Leave Us A Review</h2>
        <div class="rating-score">
            <span class="score">{{ number_format($averageRating, 1) }}</span>
            <span class="label">
                @if ($averageRating >= 4)
                    Excellent
                @elseif ($averageRating >= 3)
                    Good
                @else
                    Poor
                @endif
            </span>
            <div class="stars">
                @for ($i = 0; $i < 5; $i++)
                    @if ($i < floor($averageRating))
                        &#9733;
                    @else
                        &#9734;
                    @endif
                @endfor
                <p>Over {{ $reviews->count() }} Guests Loved It – Will You Be Next?
            </div>
        </div>
    </div>

    <div class="review-form">
        <h3>Tell Us About Your Stay !</h3>
        <p> We’d love to know how your experience with our hotel was
            <br> From the moment you checked in to the time you checked out, your feedback matters!
            <br> Share your story – what stood out, what made you smile and how we can make your next visit even better!</p>
        <div class="rating-options">
            <span>Overall Experience</span>
            <p>Tap To Rate</p>
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
        <h3>Our Guest Reviews</h3>
        <h4>{{ $reviews->count() }} Reviews</h4>
        <p>Here’s What Our Guests Are Saying About Their Stay</p>
        @foreach ($reviews as $review)
            <div class="guest-review">
                <div class="guest-info">
                    <p><strong>{{ $review->user->profile_photo_path}} {{ $review->user->name }}</strong> <br> {{ $review->user->email }}</p>
                    <div class="review-text">
                        {{ $review->review_text }}
                    </div>
                    <p>{{ $review->room_type }} <br> {{ $review->stay_duration }} - {{ $review->stay_date ? $review->stay_date->format('F Y') : Carbon::now()->format('F Y') }}</p>
                </div>
                <div class="stars">
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < floor($review->rating))
                            &#9733;
                        @elseif ($i < ceil($review->rating) && $review->rating - floor($review->rating) >= 0.5)
                            &#9733; <!-- Half star -->
                        @else
                            &#9734;
                        @endif
                    @endfor
                </div>
                <br>
                <br>
                <div class="review-date">
                    Posted On {{ $review->review_date ? $review->review_date->format('j F Y \a\t g:iA') : Carbon::now()->format('j F Y \a\t g:iA') }}
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#rating').raty({
            half: true,
            starType: 'i',
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
