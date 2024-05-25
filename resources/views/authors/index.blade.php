@extends('layouts.app')

@section('content')
<h1>List of Authors</h1>
<a href="{{ route('authors.create') }}" class="btn btn-success">Add Author</a>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Bio</th>
            <th>Livre</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($authors as $author)
        <tr>
            <td>{{ $author->name }}</td>
            <td>{{ $author->bio }}</td>
            <td>{{ $author->livre->titre }}</td>
            <td>
                <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning">Edit</a>
                <!-- Delete Form -->
                <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
