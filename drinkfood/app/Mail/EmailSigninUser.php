<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailSigninUser extends Mailable
{
    use Queueable, SerializesModels;
    public $user_infos;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_infos)
    {
        $this->user_infos = $user_infos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.info_account_regist')
                    ->with([
                        'info_send' => $this->user_infos
                    ]);
    }
}
