<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SalaryReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $salary;
    public $nextMonthName;

    public function __construct($salary, $nextMonthName)
    {
        $this->salary = $salary;
        $this->nextMonthName = $nextMonthName;
    }

    public function build()
    {
        return $this->subject('Salary reminder')
            ->view('emails.salary_reminder');
    }
}
