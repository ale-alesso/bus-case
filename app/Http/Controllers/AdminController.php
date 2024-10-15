<?php


namespace App\Http\Controllers;

use App\Http\Requests\StoreBusRequest;
use App\Http\Requests\StoreDriverRequest;
use App\Models\Bus;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function listDrivers()
    {
        $drivers = Driver::all();
        return view('admin.drivers.index', compact('drivers'));
    }

    public function createDriver()
    {
        return view('admin.drivers.create');
    }

    public function storeDriver(StoreDriverRequest $request)
    {
        $driver = new Driver();
        $driver->first_name = ucfirst(strtolower($request->input('first_name')));
        $driver->last_name = ucfirst(strtolower($request->input('last_name')));
        $driver->date_of_birth = $request->input('date_of_birth');
        $driver->salary = $request->input('salary');
        $driver->email = $request->input('email');
        $driver->image = $request->input('image')->store('drivers', 'public');
        $driver->save();

        return redirect()->route('admin.drivers.index')->with('success', 'Водитель успешно добавлен.');
    }

    public function editDriver(Driver $driver)
    {
        return view('admin.drivers.edit', compact('driver'));
    }

    public function updateDriver(StoreDriverRequest $request, Driver $driver)
    {
        $driver->first_name = ucfirst(strtolower($request->input('first_name')));
        $driver->last_name = ucfirst(strtolower($request->input('last_name')));
        $driver->date_of_birth = $request->input('date_of_birth');
        $driver->salary = $request->input('salary');
        $driver->email = $request->input('email');
        if ($request->hasFile('image')) {
            $driver->image = $request->input('image')->store('drivers', 'public');
        }
        $driver->save();

        return redirect()->route('admin.drivers.index')->with('success', 'Водитель успешно обновлён.');
    }

    public function destroyDriver(Driver $driver)
    {
        // Удаление водителя и связанных с ним данных
        $driver->delete();
        return redirect()->route('admin.drivers.index')->with('success', 'Водитель успешно удалён.');
    }

    public function listBuses()
    {
        $buses = Bus::all();
        return view('admin.buses.index', compact('buses'));
    }

    public function createBus()
    {
        return view('admin.buses.create');
    }

    public function storeBus(StoreBusRequest $request)
    {
        $bus = new Bus();
        $bus->license_plate = strtoupper($request->input('license_plate'));
        $bus->brand_id = $request->input('brand_id');
        $bus->driver_id = $request->input('driver_id');
        $bus->save();

        return redirect()->route('admin.buses.index')->with('success', 'Автобус успешно добавлен.');
    }

    public function editBus(Bus $bus)
    {
        return view('admin.buses.edit', compact('bus'));
    }

    public function updateBus(StoreBusRequest $request, Bus $bus)
    {
        $bus->license_plate = strtoupper($request->input('license_plate'));
        $bus->brand_id = $request->input('brand_id');
        $bus->driver_id = $request->input('driver_id');
        $bus->save();

        return redirect()->route('admin.buses.index')->with('success', 'Автобус успешно обновлён.');
    }

    public function destroyBus(Bus $bus)
    {
        $bus->delete();
        return redirect()->route('admin.buses.index')->with('success', 'Автобус успешно удалён.');
    }
}
