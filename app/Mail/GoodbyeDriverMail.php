<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class GoodbyeDriverMail extends Mailable
{
    public $driver;

    public function __construct($driver)
    {
        $this->driver = $driver;
    }

    public function build()
    {
        return $this->subject('Thank you for your service!')
            ->view('emails.goodbye')
            ->with(['name' => ucfirst($this->driver->first_name)]);
    }
}
