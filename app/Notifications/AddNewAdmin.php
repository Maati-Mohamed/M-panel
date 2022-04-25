<?php

namespace App\Notifications;

use App\Models\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AddNewAdmin extends Notification
{
    use Queueable;
    public $admin;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
    }
    public function toDatabase($notifiable)
    {
        $body = sprintf('%s Added new admin',$this->admin->name);
        return [
            'body' => $body,
            'image' => $this->admin->photo,
            'url'  => route('dashboard.admins.index'),
        ];
    }

    // public function toBroadcast($notifiable)
    // {
    //     $body = sprintf('%s Added new admin',$this->admin->name);

    //     return [
    //         'body' => $body,
    //         'image' => $this->admin->photo,
    //         'url'  => route('dashboard.admins.index'),
    //         'time' => now(),
    //     ];
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        // $body = sprintf('%s Added new admin',$this->admin->name);
        // return [
        //     'body' => $body,
        //     'image' => $this->admin->photo,
        //     'url'  => route('dashboard.admins.index'),
        //     'time' => now(),
        // ];
    }
}
