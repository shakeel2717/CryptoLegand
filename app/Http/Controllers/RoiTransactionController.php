<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\user\RoiTransaction;
use Illuminate\Http\Request;

class RoiTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amount = roiBalance(auth()->user()->id);
        if ($amount < 4) {
            return redirect()->back()->withErrors('You have not enough ROI balance to withdraw, Minimum limit is $10');
        }

        // checking if withdraw for roi is stopped
        if (auth()->user()->roi == 0) {
            return redirect()->back()->withErrors('Withdraw for ROI is stopped by admin');
        }

        // creating a roi transaction for available balance
        $transaction = new Transaction();
        $transaction->user_id = auth()->user()->id;
        $transaction->type = "daily roi";
        $transaction->amount =  $amount;
        $transaction->status =  'approved';
        $transaction->sum =  'in';
        $transaction->reference =  'self withdraw';
        $transaction->save();

        $transaction = new RoiTransaction();
        $transaction->user_id = auth()->user()->id;
        $transaction->amount = $amount;
        $transaction->status =  'approved';
        $transaction->sum =  'out';
        $transaction->reference = 'self withdraw';
        $transaction->user_plan_id = 'withdraw balance';
        $transaction->save();


        return redirect()->back()->with('message', 'Your ROI balance has been withdrawn');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user\RoiTransaction  $roiTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(RoiTransaction $roiTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user\RoiTransaction  $roiTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(RoiTransaction $roiTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user\RoiTransaction  $roiTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoiTransaction $roiTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user\RoiTransaction  $roiTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoiTransaction $roiTransaction)
    {
        //
    }
}
