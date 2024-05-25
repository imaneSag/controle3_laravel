@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Author</h1>
    <form action="{{ route('authors.update', $author->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $author->name }}">
        </div>
        <div class="form-group">
            <label for="bio">Bio:</label>
            <textarea class="form-control" id="bio" name="bio" rows="5">{{ $author->bio }}</textarea>
        </div>
        <div class="form-group">
            <label for="livre_id">Livre ID:</label>
            <input type="text" class="form-control" id="livre_id" name="livre_id" value="{{ $author->livre_id }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <!-- Delete Button -->
       
    </form>
</div>

<!-- Delete Modal -->

@endsection
