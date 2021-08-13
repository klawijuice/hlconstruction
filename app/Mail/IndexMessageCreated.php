<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IndexMessageCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $fullname;
    public $subject;
    public $email;
    public $phone;
    public $message;

    /**
     * Create a new message instance.
     *
     * @param string $full_name
     * @param string $subject
     * @param string $email
     * @param string $phone
     * @param string $message
     */
    public function __construct(string $full_name, string $subject, string $email, string $phone, string $message)
    {
        $this->fullname = $full_name;
        $this->subject = $subject;
        $this->email = $email;
        $this->phone = $phone;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): IndexMessageCreated
    {
        return $this
            ->markdown('email.message.created')
            ->subject($this->subject)
            ->from($this->email, $this->fullname)
            ->replyTo($this->email);
    }
}
