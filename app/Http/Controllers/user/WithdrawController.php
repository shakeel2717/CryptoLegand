<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Mail\Withdraw as MailWithdraw;
use App\Models\ProfitWithdraw;
use App\Models\Transaction;
use App\Models\user\RoiTransaction;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WithdrawController extends Controller
{
    public function index()
    {
        return view('user.dashboard.withdraw.index');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:20',
            'method' => 'required|string|max:255',
            'address' => 'required|alpha_num',
        ]);

        // checking if balance is enough
        if ($validatedData['amount'] > balance(auth()->user()->id)) {
            return redirect()->back()->withErrors('Insufficient balance');
        }

        $withdraw = new Withdraw();
        $withdraw->user_id = auth()->user()->id;
        $withdraw->amount = $validatedData['amount'];
        $withdraw->method = $validatedData['method'];
        $withdraw->address = $validatedData['address'];
        $withdraw->save();

        // inserting Plan Activate Transaction
        $withdraw = new Transaction();
        $withdraw->user_id = auth()->user()->id;
        $withdraw->amount = $validatedData['amount'];
        $withdraw->type = 'withdraw';
        $withdraw->sum = 'out';
        $withdraw->status = 'pending';
        $withdraw->save();


        $amount = $validatedData['amount'];
        $address = $validatedData['address'];
        $method = $validatedData['method'];

        // sending email
        Mail::to($request->user())->send(new MailWithdraw($amount, $method, $address));

        return redirect()->route('user.dashboard')->with('message', 'Withdraw request has been sent');
    }


    public function roiWithdraw()
    {
        return view('user.dashboard.withdraw.roiWithdraw');
    }

    public function roiWithdrawStore(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:20',
            'method' => 'required|string|max:255',
            'address' => 'required|alpha_num',
        ]);

        // checking if balance is enough
        if ($validatedData['amount'] > roiBalance(auth()->user()->id)) {
            return redirect()->back()->withErrors('Insufficient balance');
        }

        // checking if user roi is stopped in admin
        if (auth()->user()->roi == 0) {
            return redirect()->back()->withErrors('Issue in Withdraw Profit, kindly contact admin');
        }

        $ProfitWithdraw = new ProfitWithdraw();
        $ProfitWithdraw->user_id = auth()->user()->id;
        $ProfitWithdraw->amount = $validatedData['amount'];
        $ProfitWithdraw->method = $validatedData['method'];
        $ProfitWithdraw->address = $validatedData['address'];
        $ProfitWithdraw->status = 'pending';
        $ProfitWithdraw->save();

        $transaction = new RoiTransaction();
        $transaction->user_id = auth()->user()->id;
        $transaction->amount = $validatedData['amount'];
        $transaction->status =  'pending';
        $transaction->sum =  'out';
        $transaction->reference = 'self withdraw';
        $transaction->user_plan_id = 'withdraw balance';
        $transaction->save();


        // sending Email to this user
        Mail::to(auth()->user()->email)->send(new MailWithdraw($validatedData['amount'], $validatedData['method'], $validatedData['address']));

        return redirect()->route('user.dashboard')->with('message', 'Withdraw request has been sent');
    }
}
