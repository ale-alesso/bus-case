<?php

namespace App\Http\Controllers;

use App\Models\DriverApplication;
use Illuminate\Http\Request;

class DriverApplicationController extends Controller
{
    public function showForm()
    {
        return view('drivers.application');
    }

    public function submitForm(Request $request)
    {
        $validatedData = $request->validated();

        $application = DriverApplication::create($validatedData);

        Mail::to('admin@example.com')->send(new \App\Mail\DriverApplicationReceived($application));

        return redirect()->route('become.driver')->with('success', 'Ваш запрос на получение водительского удостоверения отправлен!');
    }
}
