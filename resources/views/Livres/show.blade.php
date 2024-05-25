@extends('layouts.app')

@section('content')
<style>
    .livre-details {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .livre-details h2 {
        margin-top: 0;
    }

    .livre-details img {
        max-width: 200px;
        height: auto;
        display: block;
        margin-bottom: 20px;
    }

    .livre-details p {
        margin-bottom: 10px;
    }
</style>

<div class="livre-details">
    <h2>{{ $livre->titre }}</h2>
    <img src="{{ asset('storage/' . $livre->image) }}" alt="Image de {{ $livre->titre }}">
    <p><strong>Pages:</strong> {{ $livre->pages }}</p>
    <p><strong>Description:</strong> {{ $livre->description }}</p>
    <p><strong>Catégorie:</strong> {{ $livre->categorie->name }}</p>
    <p><strong>Auteur:</strong> {{ $livre->author->name ?? 'Non défini' }}</p>

    <h3>Reviews:</h3>
    @if($livre->reviews->isEmpty())
    <p>Aucune review pour ce livre.</p>
    @else
    <ul>
        @foreach($livre->reviews as $review)
        <li>
            <p>{{ $review->review_text }}</p>
            <small>Rating: {{ $review->rating }}</small>
        </li>
        @endforeach
    </ul>
    @endif
</div>
@endsection