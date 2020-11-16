<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class QuoteRecieved extends Notification
{
    use Queueable;

    protected $Quote;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(object $quote)
    {
        $this->Quote = $quote;
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
        // dd($this->Quote);
        return (new MailMessage)
                    ->line('You have recieved a quote request.')
                    ->action('View Details', url('/vendor/qoutes/view/'.$this->Quote->id))
                    ->line('Thank you for using IndustrialSupplyCart!');
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
