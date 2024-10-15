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
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date|before:65 years ago', // Валидация возраста
        ]);

        $application = DriverApplication::create($validatedData);

        Mail::to('admin@example.com')->send(new \App\Mail\DriverApplicationReceived($application));

        return redirect()->route('become.driver')->with('success', 'Ваш запрос на получение водительского удостоверения отправлен!');
    }
}
