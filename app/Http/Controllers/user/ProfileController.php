<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.dashboard.profile.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'profile' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::find(auth()->user()->id);
        if (isset($validatedData['profile'])) {
            // get picture
            $profile = $request->file('profile');
            $profile_name = auth()->user()->username . time() . '.' . $profile->getClientOriginalExtension();
            $profile->move(public_path('assets/profile'), $profile_name);
        } else {
            $profile_name = $user->profile;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile = $profile_name;
        $user->save();

        return redirect()->route('user.profile.index')->with('message', 'Profile updated successfully.');
    }


    public function passwordChange()
    {
        return view('user.dashboard.profile.password.change');
    }


    public function passwordupdate(Request $request)
    {
        $validatedData = $request->validate([
            'cpassword' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::find(auth()->user()->id);
        if (Hash::check($request->cpassword, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('user.profile.index')->with('message', 'Password updated successfully.');
        } else {
            return redirect()->route('user.profile.password.change')->withErrors('Current password is incorrect.');
        }
    }
}
