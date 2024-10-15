<?php

namespace App\Console\Commands;

use App\Models\Driver;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class CheckDriversAge extends Command
{
    protected $signature = 'app:drivers:check-age';
    protected $description = 'Check if any driver has turned 65 and remove them';

    public function handle()
    {
        $drivers = Driver::whereRaw('TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) >= 65')->get();

        foreach ($drivers as $driver) {
            $driver->buses()->update(['driver_id' => null]);

            $driver->delete();

            Mail::to(env('ADMIN_EMAIL'))->send(new \App\Mail\DriverRetiredMail($driver));
        }

        $this->info('Checked drivers\' age and processed retirements.');
    }
}
