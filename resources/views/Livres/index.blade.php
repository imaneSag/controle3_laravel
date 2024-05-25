@extends('layouts.app')

@section('content')
<style>
    /* Custom CSS styles */
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }

    .table tbody+tbody {
        border-top: 2px solid #dee2e6;
    }

    .btn {
        display: inline-block;
        font-weight: 400;
        color: #212529;
        text-align: center;
        vertical-align: middle;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .btn-success {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-warning {
        color: #212529;
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    /* Header styles */
    header {
        background-color: #007bff;
        color: #fff;
        padding: 20px;
        text-align: center;
    }

    /* Footer styles */
    footer {
        background-color: #007bff;
        padding: 20px;
        text-align: center;
    }
</style>

<!-- Header -->
<header>
    <h1>Header Content Goes Here</h1>
    <!-- Add your header content here -->
</header>

<h1 class="text-center">Liste des livres</h1>
<a class="btn btn-success m-3" href="{{ route('livres.create') }}">Ajouter nouveau livre</a>
<table class="table m-4">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Pages</th>
            <th>Description</th>
            <th>Image</th>
            <th>Catégorie</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($livres as $livre)
        <tr>
            <td>{{ $livre->titre }}</td>
            <td>{{ $livre->pages }}</td>
            <td>{{ $livre->description }}</td>
            <td><img src="{{ asset('storage/' . $livre->image) }}" alt="{{ $livre->titre }}" width="10%" /></td>
            <td>{{ $livre->categorie->name }}</td>
            <td>
                <a class="btn btn-warning" href="{{ route('livres.edit', $livre->id) }}">Modifier</a>
                <form action="{{ route('livres.destroy', $livre->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $livres->links() }}

<!-- Footer -->
<footer>
    <p>Footer Content Goes Here</p>
    <!-- Add your footer content here -->
</footer>
@endsection
