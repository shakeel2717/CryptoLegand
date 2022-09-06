<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NetworkController extends Controller
{
    public function index()
    {
        $overAllRefers =  overAllRefers(auth()->user()->id);
        $refers = User::whereIn('id', $overAllRefers)->get();
        return view('user.dashboard.network.index', compact('refers'));
    }

    public function loginUser(Request $request)
    {
        $validationData = $request->validate([
            'user_id' => 'required|integer',
        ]);

        $user = User::findOrFail($validationData['user_id']);
        Auth::logout();
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
