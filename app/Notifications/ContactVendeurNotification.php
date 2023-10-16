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
            ->line($this->user->name . ' est intéressé par votre produit ' . $this->produit->nom . '!')
            ->action('Voir le produit', url(route('produits.show', $this->produit)))
            ->line('Merci d\'utiliser notre application!');
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
