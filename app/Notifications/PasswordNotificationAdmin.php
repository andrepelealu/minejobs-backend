<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
class PasswordNotificationAdmin extends Notification
{
    use Queueable;
    public $token;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        //
        $this->token =$token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $urlToResetForm = "https://vueapp.test/vue-app/reset-password-form/?token=". $this->token;
        return (new MailMessage)
            ->subject(Lang::getFromJson('Reset Password Minejobs | Admin'))
            ->line(Lang::getFromJson('Anda mendapatkan email ini karena kami menerima permintaan reset password dari akun anda'))
            ->action(Lang::getFromJson('Reset Password'), $urlToResetForm)
            ->line(Lang::getFromJson('Link reset password ini akan kadaluarsa dalam :count Menit.', ['count' => config('auth.passwords.users.expire')]))
            ->line(Lang::getFromJson('Jika kamu tidak melakukan permintaan reset password, segera amankan akun anda dengan mengganti password Token: ==>'. $this->token));
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
            //
        ];
    }
}
