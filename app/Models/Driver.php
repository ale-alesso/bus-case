<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($driver) {
            $driver->buses()->update(['driver_id' => null]);

            dispatch(new \App\Jobs\SendGoodbyeEmailJob($driver))->delay(now()->addMinutes(5));
        });
    }

    public function buses()
    {
        return $this->hasMany(Bus::class);
    }
}
