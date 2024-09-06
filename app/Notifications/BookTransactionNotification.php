<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookTransactionNotification extends Notification
{
    use Queueable;

    public $book;
    public $action; // 'borrowed' or 'returned'

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($book, $action)
    {
        $this->book = $book;
        $this->action = $action;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $subject = $this->action === 'borrowed'
            ? 'Book Borrowed Notification'
            : 'Book Returned Notification';

        $message = $this->action === 'borrowed'
            ? "You have successfully borrowed the book titled '{$this->book->title}'."
            : "You have successfully returned the book titled '{$this->book->title}'.";

        return (new MailMessage)
            ->subject($subject)
            ->line($message)
            ->line('Thank you for using our library system!');
    }
}
