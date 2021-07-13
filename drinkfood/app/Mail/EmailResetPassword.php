<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailResetPassword extends Mailable
{
  use Queueable, SerializesModels;

  public $user_info;
  public function __construct($user_info)
  {
    $this->user_info = $user_info;
  }

  public function build()
  {
    return $this->view('email.reset_password')->with(['info_send' => $this->user_info]);
  }
}
