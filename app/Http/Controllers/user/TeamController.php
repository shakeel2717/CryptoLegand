<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index($id = null)
    {
        if ($id == null) {
            $user = auth()->user();
        } else {
            $user = User::find($id);
        }
        return view('user.dashboard.team.index', compact('user'));
    }
}
