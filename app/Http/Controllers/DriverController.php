<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDriverRequest;
use App\Models\Driver;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class DriverController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            $drivers = Driver::all(); // Админ видит всех
        } elseif ($user->hasRole('manager')) {
            $drivers = Driver::with('bus')->get(); // Менеджер видит водителей и автобусы
        } elseif ($user->hasRole('driver')) {
            $drivers = Driver::where('id', $user->id)->with('bus')->get(); // Водитель видит только себя и автобус
        }

        return view('drivers.index', compact('drivers'));
    }

    public function create()
    {
        return view('drivers.create');
    }

    public function store(StoreDriverRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['first_name'] = strtolower($validatedData['first_name']);
        $validatedData['last_name'] = strtolower($validatedData['last_name']);

        Driver::create($validatedData);

        return redirect()->route('drivers.index');
    }

    public function edit(Driver $driver)
    {
        return view('drivers.edit', compact('driver'));
    }

    public function update(StoreDriverRequest $request, Driver $driver)
    {
        $validatedData = $request->validated();
        $validatedData['first_name'] = strtolower($validatedData['first_name']);
        $validatedData['last_name'] = strtolower($validatedData['last_name']);

        $driver->update($validatedData);

        return redirect()->route('drivers.index');
    }

    public function destroy(Driver $driver)
    {
        $driver->delete();

        // Отправка письма через 5 минут
        dispatch(function () use ($driver) {
            Mail::to($driver->email)->send(new FarewellEmail($driver));
        })->delay(now()->addMinutes(5));

        return redirect()->route('drivers.index');
    }
}
