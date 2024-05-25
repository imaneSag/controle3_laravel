<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Livre;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::paginate(10);
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        $livres = Livre::all();
        return view('authors.create', compact('livres'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'bio' => 'required',
            'livre_id' => 'required|exists:livres,id'
        ]);

        Author::create($validatedData);

        return redirect()->route('authors.index')->with('success', 'Author added successfully.');
    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        $livres = Livre::all();
        return view('authors.edit', compact('author', 'livres'));
    }

    public function update(Request $request, Author $author)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'bio' => 'required',
            'livre_id' => 'required|exists:livres,id'
        ]);

        $author->update($validatedData);

        return redirect()->route('authors.index')->with('success', 'Author updated successfully.');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
    }
}
