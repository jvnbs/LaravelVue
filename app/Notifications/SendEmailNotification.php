<?php 
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class SendEmailNotification extends Notification
{
    use Queueable;

    protected $details;

 
    public function __construct($details)
    {
        $this->details = $details;
    }

  
    public function via($notifiable)
    {
        return ['mail'];
    }

 
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('New Notification')
                    ->greeting('Hello ' . $this->details['name'])
                    ->line('This is a test email notification.')
                    ->action('View Website', url('/'))
                    ->line('Thank you for using our application!');
    }
}
