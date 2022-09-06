<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Models\user\RoiTransaction;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function addBalance()
    {
        return view('admin.dashboard.finance.addBalance');
    }


    public function addBalanceStore(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'username' => 'required|string|exists:users',
            'type' => 'required',
            'method' => 'required'
        ]);

        $user = User::where('username', $validatedData['username'])->firstOrFail();
        if ($validatedData['method'] == 'balance') {
            if ($validatedData['type'] == 'in') {
                $type = 'deposit';
            } else {
                $type = 'balance adjust';
            }

            // add deposit transaction for this user
            $deposit = new Transaction();
            $deposit->user_id = $user->id;
            $deposit->amount = $validatedData['amount'];
            $deposit->type = $type;
            $deposit->reference = 'Binance Gateway';
            $deposit->sum = $validatedData['type'];
            $deposit->status = 'approved';
            $deposit->save();
        } elseif ($validatedData['method'] == 'roi') {
            if ($validatedData['type'] == 'in') {
                $reference = 'Binance Gateway';
            } else {
                $reference = 'balance adjust';
            }
            $transaction = new RoiTransaction();
            $transaction->user_id = $user->id;
            $transaction->amount =  $validatedData['amount'];
            $transaction->status =  'approved';
            $transaction->sum =  $validatedData['type'];
            $transaction->reference =  $reference;
            $transaction->user_plan_id = 'Admin';
            $transaction->save();
        }
        return redirect()->back()->with('message', 'Balance added successfully');
    }
}
