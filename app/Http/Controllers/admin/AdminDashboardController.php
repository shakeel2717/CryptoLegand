<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Job;
use App\Models\ProfitWithdraw;
use App\Models\User;
use App\Models\user\RoiTransaction;
use App\Models\UserPlan;
use App\Models\Withdraw;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $jobs = Job::count();
        $user = User::get();
        $invest = UserPlan::get();
        $totalInvest = UserPlan::with(['plan' => function ($query) {
            $query->sum('price');
        }])->get();

        $activeInvest = UserPlan::with(['plan' => function ($query) {
            $query->sum('price');
        }])->where('status', 'active')->get();


        $pendingInvest = UserPlan::with(['plan' => function ($query) {
            $query->sum('price');
        }])->where('status', 'pending')->get();


        $completeInvest = UserPlan::with(['plan' => function ($query) {
            $query->sum('price');
        }])->where('complete', 1)->get();

        $withdraw = Withdraw::get();
        $roi = ProfitWithdraw::get();

        return view('admin.dashboard.index', compact('user', 'invest', 'totalInvest', 'activeInvest', 'pendingInvest', 'completeInvest', 'withdraw', 'roi', 'jobs'));
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


    public function winnerUser($user)
    {
        $user = User::findOrFail($user);
        // Toggle the user's active status
        $user->winner = $user->winner ? false : true;
        $user->save();
        return redirect()->back()->with('success', 'User Winner Status has been updated.');
    }
}
