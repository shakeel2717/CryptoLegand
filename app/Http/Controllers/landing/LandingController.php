<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('landing.index', compact('plans'));
    }

    public function privacy()
    {
        return view('landing.privacy');
    }
}
