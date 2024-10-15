<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class DriverRetiredMail extends Mailable
{
    public $driver;

    public function __construct($driver)
    {
        $this->driver = $driver;
    }

    public function build()
    {
        return $this->subject('Driver Retired Notification')
            ->view('emails.driver_retired')
            ->with([
                'name' => ucfirst($this->driver->first_name),
                'bus_number' => $this->driver->buses->first()->license_plate ?? 'N/A'
            ]);
    }
}
