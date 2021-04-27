<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUser extends Mailable
{
    use Queueable, SerializesModels;

		protected $email;
		protected $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $content)
    {
						$this->email = $email;
						$this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->email, '問い合わせ完了のご案内')->view('contact.mail_user')->with(['content' => $this->content]);
    }
}
