<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BudgetExceedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $Percentage;
    public function __construct($percentageSpent)
    {
        $this->Percentage = $percentageSpent;
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
        return (new MailMessage)
            ->subject('Budget Alert: Spending Exceeded 50%')
            ->greeting("Hello {$notifiable->name},")
            ->line("You have spent {$this->Percentage}% of your budget.")
            ->line('Consider reviewing your expenses.')
            ->action('Check Your Budget', url('/dashboard'))
            ->line('Thank you for using our app!');
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
