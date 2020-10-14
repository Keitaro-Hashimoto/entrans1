<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
// オーバーライドに必要
//use Illuminate\Support\Facades\Lang;
//use Illuminate\Auth\Notifications\VerifyEmail;

class VerifyMailJP extends Notification
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
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
//        $verificationUrl = $this->verificationUrl($notifiable);
// 
//        if (static::$toMailCallback) {
//            return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
//        }
// 
//        return (new MailMessage)
//            ->subject(Lang::get('mail.verification.subject'))
//            ->line(Lang::get('mail.verification.line_01'))
//            ->action(Lang::get('mail.verification.action'), $verificationUrl)
//            ->line(Lang::get('mail.verification.line_02'));
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
