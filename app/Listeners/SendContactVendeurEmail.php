<?php

namespace App\Listeners;

use App\Events\ContactVendeurEvent;
use App\Mail\ContactVendeur;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendContactVendeurEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactVendeurEvent $event)
    {
        $email = $event->produit->user->email;

        Mail::to($email)->send(new ContactVendeur($event->produit, auth()->user()));
        return redirect()->route('produits.show', $event->produit)->with('success', 'Votre message a bien été envoyé au vendeur');
    }

}
