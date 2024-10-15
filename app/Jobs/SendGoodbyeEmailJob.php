<?php

namespace App\Jobs;

use App\Models\Driver;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendGoodbyeEmailJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $driver;

    public function __construct(Driver $driver)
    {
        $this->driver = $driver;
    }

    public function handle()
    {
        // Отправка письма
        Mail::to($this->driver->email)->send(new \App\Mail\GoodbyeDriverMail($this->driver));
    }
}
