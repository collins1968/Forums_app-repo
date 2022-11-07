<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\category;
use App\Models\User;


class NewCategory extends Notification
{
    use Queueable;
    public $category;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($category)
    {
        $this->category = $category;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['Database'];
    }

   
    public function toDatabase($notifiable)
    {
        $user = user::find($this->category->user_id);
        // $category = category::find($this->category->category_id);
        return [
            'name'=>$user->name,
            'email'=>$user->email,
            'message'=>$user->name." created this category: ".$this->category->title,
            'type'=>3
        ];
    }
}
