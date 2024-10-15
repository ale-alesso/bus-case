<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarBrandRequest;
use App\Models\CarBrand;
use Illuminate\Http\Request;

class CarBrandController extends Controller
{
    public function index()
    {
        return CarBrand::all();
    }

    public function create()
    {
        return view('car_brands.create');
    }

    public function store(StoreCarBrandRequest $request)
    {
        CarBrand::create($request->validated());

        return redirect()->route('car_brands.index');
    }

    public function edit(CarBrand $carBrand)
    {
        return view('car_brands.edit', compact('carBrand'));
    }

    public function update(StoreCarBrandRequest $request, CarBrand $carBrand)
    {
        $carBrand->update($request->validated());

        return redirect()->route('car_brands.index');
    }

    public function destroy(CarBrand $carBrand)
    {
        $carBrand->delete();

        return redirect()->route('car_brands.index');
    }
}
