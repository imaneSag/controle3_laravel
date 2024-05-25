@extends('layouts.app')

@section('content')



<style>
    .container {
    max-width: 600px;
    margin: 0 auto;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

    </style>
    <div class="container">
        <h2>Edit Review</h2>
        <form action="{{ route('reviews.update', $review->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="review_text">Review Text:</label>
                <textarea class="form-control" id="review_text" name="review_text" rows="5">{{ $review->review_text }}</textarea>
            </div>
            <div class="form-group">
                <label for="rating">Rating:</label>
                <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" value="{{ $review->rating }}">
            </div>
            <div class="form-group">
                <label for="livre_id">Livre ID:</label>
                <input type="text" class="form-control" id="livre_id" name="livre_id" value="{{ $review->livre_id }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
