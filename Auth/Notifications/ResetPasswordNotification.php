<?php

namespace App\Containers\AppSection\Auth\Notifications;

use App\Containers\AppSection\Auth\Dto\SendResetPasswordDto;
use App\Ship\Parents\Notifications\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(protected SendResetPasswordDto $dto)
    {
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)->view(
            'appSection@auth::Emails.resetPasswordEmail', [
                'content' => $this->dto,
            ]
        );
    }

    public function toSms($notifiable)
    {
        // ...
    }

    public function toArray($notifiable)
    {
        return [];
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }
}
