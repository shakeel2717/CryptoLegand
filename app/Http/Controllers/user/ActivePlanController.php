<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Mail\RefundConfirm;
use App\Models\RefundRequest;
use App\Models\UserPlan;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ActivePlanController extends Controller
{
    public function index()
    {
        $statement = UserPlan::where('user_id', auth()->user()->id)->where('status', 'active')->get();
        return view('user.dashboard.statement.active-plan', compact('statement'));
    }

    public function refundReq($id)
    {
        $plan = UserPlan::findOrFail($id);
        $date1 = new DateTime($plan->created_at);
        $date2 = new DateTime(now());
        $diff = $date2->diff($date1)->format("%a");
        // checking if this user is a networker
        if ($plan->user->network != 1) {
            if ($diff <= 30) {
                // create a refund requet
                $refundRequest = new RefundRequest();
                $refundRequest->user_id = auth()->user()->id;
                $refundRequest->plan_id = $plan->id;
                $refundRequest->tid = rand(1, 999999999);
                $refundRequest->status = 'pending';
                $refundRequest->save();
            } else {
                return redirect()->back()->withErrors('You can not request refund for this plan');
            }
        } else {
            return redirect()->back()->withErrors('You can not request refund as a networker');
        }

        // sending confirmmation mail
        Mail::to(auth()->user()->email)->send(new RefundConfirm(auth()->user()->id, $plan->name, $refundRequest->tid));
        return back()->with('message', 'Please Check your email to Confirm Refund');
    }
}
