<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DriverApplication;

class DriverApplicationController extends Controller
{
    public function index()
    {
        $applications = DriverApplication::all();

        return view('admin.driver_applications.index', compact('applications'));
    }
}
