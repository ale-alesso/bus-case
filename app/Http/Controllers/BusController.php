<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBusRequest;
use App\Models\Bus;
use App\Models\CarBrand;
use App\Models\Driver;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
    {
        return Bus::all();
    }

    public function create()
    {
        $brands = CarBrand::all();
        $drivers = Driver::all();
        return view('buses.create', compact('brands', 'drivers'));
    }

    public function store(StoreBusRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['license_plate'] = strtoupper($validatedData['license_plate']);

        Bus::create($validatedData);

        return redirect()->route('buses.index');
    }

    public function edit(Bus $bus)
    {
        $brands = CarBrand::all();
        $drivers = Driver::all();
        return view('buses.edit', compact('bus', 'brands', 'drivers'));
    }

    public function update(StoreBusRequest$request, Bus $bus)
    {
        $validatedData = $request->validated();
        $validatedData['license_plate'] = strtoupper($validatedData['license_plate']);

        $bus->update($validatedData);

        return redirect()->route('buses.index');
    }

    public function destroy(Bus $bus)
    {
        $bus->delete();

        return redirect()->route('buses.index');
    }
}
