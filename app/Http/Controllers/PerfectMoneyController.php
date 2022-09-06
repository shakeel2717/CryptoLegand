<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfectMoneyController extends Controller
{
    public function failed(Request $request)
    {
        // login this user
        $user = User::findOrFail($request->PAYMENT_ID);
        Auth::login($user);
        info(json_encode($request->input()));
        return view('payment.failed');
    }


    public function success(Request $request)
    {
        // login this user
        $user = User::findOrFail($request->PAYMENT_ID);
        Auth::login($user);
        info(json_encode($request->input()));

        $security = Transaction::where('note', $request->PAYMENT_BATCH_NUM)->where('amount', $request->PAYMENT_AMOUNT)->count();
        if ($security > 0) {
            return view('payment.failed');
            die();
        } else {
            // inserting new Payment
            // getting this user Payment ID
            $deposit = new Transaction();
            $deposit->user_id = auth()->user()->id;
            $deposit->amount = $request->PAYMENT_AMOUNT;
            $deposit->type = 'deposit';
            $deposit->reference = 'PerfectMoney Gateway';
            $deposit->sum = 'in';
            $deposit->status = 'approved';
            $deposit->note = $request->PAYMENT_BATCH_NUM;
            $deposit->save();
            info('PerfectMoney Payment Success');
        }

        return view('payment.success');
    }
}
