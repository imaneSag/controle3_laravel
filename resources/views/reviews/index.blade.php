@extends('layouts.app')

@section('content')
<h1>List of Reviews</h1>
<a href="{{ route('reviews.create') }}" class="btn btn-success">Add Review</a>
<table class="table">
    <thead>
        <tr>
            <th>Review Text</th>
            <th>Rating</th>
            <th>Livre</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reviews as $review)
        <tr>
            <td>{{ $review->review_text }}</td>
            <td>{{ $review->rating }}</td>
            <td>{{ $review->livre->titre }}</td>
            <td>
                <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $reviews->links() }}
@endsection
