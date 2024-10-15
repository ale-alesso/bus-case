<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Driver;
use Illuminate\Support\Facades\Mail;
use App\Mail\SalaryReminderMail;
use Carbon\Carbon;

class SendSalaryReminder extends Command
{
    protected $signature = 'app:send-salary-reminder';
    protected $description = 'Send salary reminder emails to all drivers';

    public function handle()
    {
        $drivers = Driver::all();

        $currentMonth = Carbon::now()->format('n');
        $nextMonthName = Carbon::now()->addMonth()->format('F');

        foreach ($drivers as $driver) {
            $this->sendSalaryEmail($driver, $nextMonthName);
        }

        $this->info('Salary reminder emails sent successfully!');
    }

    protected function sendSalaryEmail($driver, $nextMonthName)
    {
        $salary = $driver->salary;

        Mail::to($driver->email)->send(new SalaryReminderMail($salary, $nextMonthName));
    }
}
