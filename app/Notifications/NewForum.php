<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\user;

class NewForum extends Notification
{
    use Queueable;
    public $forum;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($forum)
    {
        $this->forum = $forum;
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
        $user = user::find($this->forum->user_id);
        // $category = category::find($this->category->category_id);
        return [
            'name'=>$user->name,
            'email'=>$user->email,
            'message'=>$user->name." created this forum: ".$this->forum->title,
            'type'=>4
        ];
    }
}
