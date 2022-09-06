<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

class BlockchainController extends Controller
{
    function index()
    {
        Artisan::call('blockchain:run');
        return redirect()->back()->with('message', 'Blockchain is running');
    }
}
