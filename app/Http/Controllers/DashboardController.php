<?php

namespace App\Http\Controllers;

use App\Models\Hip;
use App\Models\Knee;
use App\Models\Shoulder;

class DashboardController extends Controller
{

    public function index()
    {
        return view('dashboard', [
            'hips' => Hip::with('consultant')->latest()->take(5)->get(),
            'knees' => Knee::with('consultant')->latest()->take(5)->get(),
            'shoulders' => Shoulder::with('consultant')->latest()->take(5)->get(),
        ]);
    }


}