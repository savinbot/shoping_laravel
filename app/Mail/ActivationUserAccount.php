<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivationUserAccount extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $tries = 5;

    public $user;
    public $code;

    /**
     * Create a new messages.php instance.
     *
     * @return void
     */
    public function __construct(User $user , $code)
    {
        $this->user = $user;
        $this->code = $code;
    }

    /**
     * Build the messages.php.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('لینک فعالسازی')
            ->markdown('emails.active-user');
    }
}
