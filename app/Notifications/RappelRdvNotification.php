<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RappelRdvNotification extends Notification
{
    use Queueable;

    protected $rendezvous;

    /**
     * Create a new notification instance.
     */
    public function __construct($rendezvous)
    {
        $this->rendezvous = $rendezvous;
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
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $date = $this->rendezvous->{'date-rendez-vous'};
        $heure = $this->rendezvous->{'heure-rendez-vous'};

        return (new MailMessage)
                    ->subject('Rappel de votre rendez-vous')
                    ->greeting('Bonjour,')
                    ->line("Nous vous rappelons que vous avez un rendez-vous prévu le $date à $heure.")
                    ->line('Merci de votre confiance.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'rendezvous_id' => $this->rendezvous->id,
            'date' => $this->rendezvous->{'date-rendez-vous'},
            'heure' => $this->rendezvous->{'heure-rendez-vous'},
        ];
    }
}
