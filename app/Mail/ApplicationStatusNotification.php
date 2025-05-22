<?php

namespace App\Mail;

use App\Models\SispaMember;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationStatusNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $application;

    function __construct(SispaMember $application)
    {
        $this->application = $application;
    }

    public function build()
    {
        return $this->subject('Your SISPA Application Status')
                    ->markdown('emails.application-status')
                    ->with(['application' => $this->application]);
    }
}
