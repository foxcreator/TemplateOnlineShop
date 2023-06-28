<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class TelegramNotificationsChannelForAdmin extends Notification
{
    use Queueable;


    public $name;
    public $phone;

    /**
     * Create a new notification instance.
     */

    public function send($notifiable, Notification $notification)
    {
        // Отправка уведомления через Telegram к вам
    }

    public function __construct($name, $phone, $productNames)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->productNames = $productNames;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {

        $productNames = $this->productNames;

        $message = "*New Order Received*\n\n";
        $message .= "*Name:* {$this->name}\n";
        $message .= "*Phone:* {$this->phone}\n";
        $message .= "*Product Names:* {$productNames}\n";
        $message .= "\n";


        return TelegramMessage::create()
            ->content($message);
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
