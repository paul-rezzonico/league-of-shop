<?php

namespace App\Http\Controllers;

use App\Events\ContactVendeurEvent;
use App\Models\Produit;

class ContactController extends Controller
{
    public function sendMail(Produit $produit)
    {
        event(new ContactVendeurEvent($produit, auth()->user()));

        return redirect()->route('confirmation');
    }
}
