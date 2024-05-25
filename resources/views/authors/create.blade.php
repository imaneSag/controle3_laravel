@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Author</h1>
    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter author name">
        </div>
        <div class="form-group">
            <label for="bio">Bio:</label>
            <textarea class="form-control" id="bio" name="bio" rows="5" placeholder="Enter author bio"></textarea>
        </div>
        <div class="form-group">
            <label for="livre_id">Livre ID:</label>
            <input type="text" class="form-control" id="livre_id" name="livre_id" placeholder="Enter livre ID">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
