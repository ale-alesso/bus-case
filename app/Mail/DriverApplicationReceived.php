<?php

namespace App\Mail;

use App\Models\DriverApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DriverApplicationReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $application;

    public function __construct(DriverApplication $application)
    {
        $this->application = $application;
    }

    public function build()
    {
        return $this->subject('Новая заявка на получение водительского удостоверения')
            ->view('emails.driver_application_received');
    }
}
