<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Http\Requests\StoreDriverRequest;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function store(StoreDriverRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['first_name'] = strtolower($validatedData['first_name']);
        $validatedData['last_name'] = strtolower($validatedData['last_name']);

        Driver::create($validatedData);

        return redirect()->route('drivers.index');
    }

    public function update(StoreDriverRequest $request, Driver $driver)
    {
        $validatedData = $request->validated();
        $validatedData['first_name'] = strtolower($validatedData['first_name']);
        $validatedData['last_name'] = strtolower($validatedData['last_name']);

        $driver->update($validatedData);

        return redirect()->route('drivers.index');
    }
}
