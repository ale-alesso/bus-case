<?php


namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Driver;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        return view('manager.index');
    }

    public function listDrivers()
    {
        $drivers = Driver::all();
        return view('manager.drivers.index', compact('drivers'));
    }

    public function listBuses()
    {
        $buses = Bus::with('brand', 'driver')->get();
        return view('manager.buses.index', compact('buses'));
    }

    public function showDriver(Driver $driver)
    {
        return view('manager.drivers.show', compact('driver'));
    }

    public function showBus(Bus $bus)
    {
        return view('manager.buses.show', compact('bus'));
    }
}
