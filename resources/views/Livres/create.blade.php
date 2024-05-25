@extends('layouts.app')

@section('content')
<style>
    /* Custom CSS styles */
    form {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    textarea,
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        /* Adjusts for padding and border */
    }

    button[type="submit"] {
        background-color: #4caf50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    button[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

<h1>Ajouter un nouveau livre</h1>
<form method="POST" action="{{ route('livres.store') }}" enctype="multipart/form-data">
    @csrf
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="titre" required>

    <label for="pages">Pages :</label>
    <input type="number" id="pages" name="pages" required>

    <label for="description">Description :</label>
    <textarea id="description" name="description" required></textarea>

    <label for="image">Image :</label>
    <input type="file" id="image" name="image" required>

    <label for="categorie_id">Catégorie :</label>
    <select name="categorie_id" id="categorie_id" required>
        @foreach ($categories as $categorie)
        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
        @endforeach
    </select>

    <button type="submit">Ajouter</button>
</form>
@endsection