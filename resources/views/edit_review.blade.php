
@extends('master.layout')

@section('content')

<style>
    body {
       background-color: #6d8fb1;
    }
    .edith2 {
        margin-top: 100px; /* Adjust this value as needed */
    }
    .btn-primary{
        margin-bottom: 80px;
    }
</style>
<div class="container">
    <h2 class="edith2">Edit Review</h2>
    <form action="{{ route('reviews.update', $review->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="review_text">What You Liked:</label>
            <textarea name="review_text" id="review_text" class="form-control" required>{{ $review->review_text }}</textarea>
        </div>


        <button type="submit" class="btn btn-primary">Update Review</button>
    </form>
</div>
@endsection
