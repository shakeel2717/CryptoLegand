<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class InDirectCommissionStatementController extends Controller
{
    public function level1()
    {
        $statement = Transaction::where('user_id',auth()->user()->id)->where('type','indirect commission L1')->get();
        return view('user.dashboard.statement.indirect.level1',compact('statement'));
    }

    public function level2()
    {
        $statement = Transaction::where('user_id',auth()->user()->id)->where('type','indirect commission L2')->get();
        return view('user.dashboard.statement.indirect.level2',compact('statement'));
    }

    public function level3()
    {
        $statement = Transaction::where('user_id',auth()->user()->id)->where('type','indirect commission L3')->get();
        return view('user.dashboard.statement.indirect.level3',compact('statement'));
    }

    public function level4()
    {
        $statement = Transaction::where('user_id',auth()->user()->id)->where('type','indirect commission L4')->get();
        return view('user.dashboard.statement.indirect.level4',compact('statement'));
    }

    public function level5()
    {
        $statement = Transaction::where('user_id',auth()->user()->id)->where('type','indirect commission L5')->get();
        return view('user.dashboard.statement.indirect.level5',compact('statement'));
    }

    public function level6()
    {
        $statement = Transaction::where('user_id',auth()->user()->id)->where('type','indirect commission L6')->get();
        return view('user.dashboard.statement.indirect.level6',compact('statement'));
    }
}
