<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactVendeur extends Mailable
{
    use Queueable, SerializesModels;
    public $produit;
    public $user;

    /**
     * Create a new message instance.
     */
    public function __construct($produit, $user)
    {
        $this->produit = $produit;
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Un utilisateur est intéressé par votre produit',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact_vendeur')
                    ->with([
                        'username' => $this->user->name,
                        'productname' => $this->produit->nom,
                        'productid' => $this->produit->id,
                    ]);
    }
}
