<?php

namespace App\Mail;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public function __construct(User $user) {
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
       return $this->view('usermail')
                   ->from('goldenland.travelagency@gmail.com', 'Goldenland')
                   ->subject('Welcome to Golden Land Travel Agency!');
    }
}
