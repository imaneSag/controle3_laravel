<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;
use App\Models\Categorie;

class LivreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  // Use auth middleware to protect routes
    }

    public function index()
    {
        $livres = Livre::paginate(10);
        return view('livres.index', compact('livres'));  // Corrected view path
    }

    public function create()
    {
        $categories = Categorie::all();  // Fetch all categories
        return view('livres.create', compact('categories'));  // Pass categories to the view
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'titre' => 'required|max:255',
        'pages' => 'required|numeric',
        'description' => 'required',
        'image' => 'required|image', // Ensure image file validation
        'categorie_id' => 'required|exists:categories,id'
    ]);

    if ($request->hasFile('image')) {
        // Store the image in the public storage and save the path
        $validatedData['image'] = $request->file('image')->store('images', 'public');
    }

    Livre::create($validatedData);

    return redirect()->route('livres.index')->with('success', 'Votre livre a été ajouté avec succès');
}


    public function show(Livre $livre)
    {
        return view('livres.show', compact('livre'));  // Ensure the show view exists
    }

    public function edit(Livre $livre)
    {
        $categories = Categorie::all();  // Fetch all categories for edit view
        return view('livres.edit', compact('livre', 'categories'));
    }

    public function update(Request $request, Livre $livre)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'pages' => 'required|integer',
            'description' => 'required',
            'image' => 'nullable|image',  // Optional image update
            'categorie_id' => 'required|exists:categories,id'
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }

        $livre->update($validatedData);

        return redirect()->route('livres.index')->with('success', 'Le livre a été mis à jour avec succès.');
    }

    public function destroy(Livre $livre)
    {
        $livre->delete();

        return redirect()->route('livres.index')->with('success', 'Le livre a été supprimé avec succès.');
    }
}
