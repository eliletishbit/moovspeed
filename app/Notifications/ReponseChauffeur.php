<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReponseChauffeur extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'sms', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Un chauffeur a répondu au demande de déménagement que vous lui aviez attribué. Consultez sa réponse.')
            ->action('Voir les détails', url('/demande/' . $notifiable->demande_id))
            ->line('Merci pour votre confiance! Émilie (MoovSpeed)');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => 'Un chauffeur a répondu au demande de déménagement que vous lui aviez attribué. Consultez sa réponse.',
            'user_id' => $notifiable->user_id,
            // 'demande_id' => $notifiable->demande_id,
        ];
    }
}
