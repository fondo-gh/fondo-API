<?php

namespace App\Mail;

use App\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Admin's password to reset
     * @var Admin
     */
    public $admin;

    /**
     * Generated token
     * @var $token
     */
    public $token;

    /**
     * Create a new message instance.
     *
     * @param Admin $admin
     * @param $token
     */
    public function __construct(Admin $admin, $token)
    {
        $this->admin = $admin;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->admin->email)
            ->subject('Password Reset')
            ->view('mail.admin_password_reset');
    }
}
