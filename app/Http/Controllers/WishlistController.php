<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = auth()->user()->wishlists()->with('produit')->paginate();
        return view('wishlists.index', compact('wishlists'));
    }

    public function add($produitId)
    {
        $user = auth()->user();
        if (!$user->wishlists()->where('produit_id', $produitId)->exists()) {
            $user->wishlists()->create(['produit_id' => $produitId]);
            return redirect()->route('produits.show', $produitId)->with('success', 'Produit ajouté à la wishlist');
        }
        return redirect()->back()->with('error', 'Produit déjà dans la wishlist');
    }

    public function remove($produitId)
    {
        $user = auth()->user();
        $user->wishlists()->where('produit_id', $produitId)->delete();
        return redirect()->route('produits.show', $produitId)->with('success', 'Produit retiré de la wishlist');
    }
}
