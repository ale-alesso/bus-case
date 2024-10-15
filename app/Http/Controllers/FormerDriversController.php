<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class FormerDriversController extends Controller
{
    public function index()
    {
        $drivers = Driver::onlyTrashed()->get();

        return view('drivers.former', compact('drivers'));
    }
}
