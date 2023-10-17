<?php

namespace App\Notifications;

use App\Models\Produit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactVendeurNotification extends Notification
{
    use Queueable;

    public $produit;
    public $user;

    /**
     * Create a new notification instance.
     */
    public function __construct(Produit $produit, $user)
    {
        $this->produit = $produit;
        $this->user = $user;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Un utilisateur est intéressé par votre produit')
            ->view('emails.contact_vendeur', [
                        'username' => $this->user->name,
                        'productname' => $this->produit->nom,
                        'productid' => $this->produit->id,
                    ]);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
