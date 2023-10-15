<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    public function create()
    {
        return view('produits.create');
    }

    public function store(Request $request)
    {

        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour créer un produit');
        }

        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
        ]);

        $isCreated = Produit::create([
            'nom' => $data['nom'],
            'description' => $data['description'],
            'prix' => $data['prix'],
            'user_id' => $user->getAuthIdentifier(),
            'image' => 'https://picsum.photos/200/300',
        ]);
        if (!$isCreated) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création du produit');
        }

        return redirect()->route('produits.index')->with('success', 'Produit créé avec succès');
    }

    public function show(Produit $produit)
    {
        return view('produits.show', compact('produit'));
    }

    public function edit(Produit $produit)
    {
        $this->authorize('edit', $produit);
        return view('produits.edit', compact('produit'));
    }

    public function update(Request $request, Produit $produit)
    {
        $this->authorize('edit', $produit);
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
        ]);

        $produit->update($data);

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès');
    }

    public function destroy(Produit $produit)
    {
        $this->authorize('delete', $produit);
        $produit->delete();
        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès');
    }
}
