<?php

namespace App\Http\Controllers;

use App\Models\RefundRequest;
use App\Models\UserPlan;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    public function index($user, $tid)
    {
        $refundRequest = RefundRequest::where('user_id', $user)->where('tid', $tid)->where('status', 'pending')->firstOrFail();
        // checking if this refund request is 24 hour old
        if (now()->diffInHours($refundRequest->created_at) > 24) {
            $refundRequest->status = "Expired";
            $refundRequest->save();
            return redirect()->route('user.dashboard')->with('error', 'Refund Request is Expired');
        } else {
            $refundRequest->status = 'approved';

            $plan = UserPlan::findOrFail($refundRequest->plan_id);
            $plan->status = 'refund request';
            $plan->save();
            $refundRequest->save();

            return redirect()->route('user.dashboard')->with('message', 'Refund Request Approved');
        }

    }
}
