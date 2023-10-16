<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::orderBy('created_at', 'desc')->paginate();
        return view('produits.index', compact('produits'));
    }

    public function create()
    {
        if (auth()->check() && auth()->user()->hasVerifiedEmail()) {
            return view('produits.create');
        } else {
            return redirect()->route('verification.notice')->with('error', 'Vous devez être connecté et avoir vérifié votre adresse email pour créer un produit');
        }
    }

    public function store(Request $request)
    {

        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour créer un produit');
        }

        $data = $request->validated();

        if($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $isCreated = Produit::create([
            'nom' => $data['nom'],
            'description' => $data['description'],
            'prix' => $data['prix'],
            'user_id' => $user->getAuthIdentifier(),
            'image' => $data['image'] ?? null,
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

        if($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $produit->update($data);

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès');
    }

    public function mesProduits() {
        $produits = auth()->user()->produits()->paginate(12);
        return view('produits.mesProduits', compact('produits'));
    }

    public function destroy(Produit $produit)
    {
        $this->authorize('delete', $produit);
        $produit->delete();
        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès');
    }
}
