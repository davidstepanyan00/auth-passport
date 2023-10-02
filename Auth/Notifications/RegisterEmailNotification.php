<?php

namespace App\Containers\AppSection\Auth\Notifications;

use App\Containers\AppSection\Auth\Dto\SendConfirmationEmailDto;
use App\Ship\Parents\Notifications\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RegisterEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(protected SendConfirmationEmailDto $dto)
    {
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)->view(
            'appSection@auth::Emails.registerEmail', [
                'content' => $this->dto,
            ]
        )->subject('Brovisor Registering Notification');
    }

    public function toSms($notifiable)
    {
        // ...
    }

    public function toArray($notifiable)
    {
        // ...
        return [];
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }
}
