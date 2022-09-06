<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Affiliate;
use App\Models\btcPayments;
use App\Models\Plan;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserPlan;
use Illuminate\Http\Request;
use CoinpaymentsAPI;
use Illuminate\Support\Facades\Log;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();
        return view('user.dashboard.plan.index', compact('plans'));
    }


    public function activate(Request $request)
    {
        $validatedData = $request->validate([
            'method' => 'required|string',
            'amount' => 'required|numeric|min:10',
        ]);

        $private_key = env('PRIKEY');
        $public_key = env('PUBKEY');
        $method = $validatedData['method'];

        try {
            $cps_api = new CoinpaymentsAPI($private_key, $public_key, 'json');
            $amount = $validatedData['amount'];;
            $currency1 = "USD";
            $currency2 = $method;
            $buyer_email = auth()->user()->email;
            $ipn_url = env('IPN_URL');
            $information = $cps_api->CreateSimpleTransactionWithConversion($amount, $currency1, $currency2, $buyer_email, $ipn_url);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            exit();
        }

        if ($information['error'] != 'ok') {
            return "Please send USDT TRC20 to this address(TD3JBrzzjJPANa3fDtacJ8wophuLaZtehR), and take a screenshot of your payment. After successful payment, don't forget to send the payment proof or transaction id for instant Deposit. Our WhatsApp Number: (+971561559810)";
        }

        // Inserting New Transaction Request Storing into session
        $task = new btcPayments();
        $task->user_id = auth()->user()->id;
        $task->amount = $information['result']['amount'];
        $task->address = $information['result']['address'];
        $task->timeout = $information['result']['timeout'];
        $task->dest_tag = 1;
        $task->from_currency = $currency1;
        $task->to_currency = $currency2;
        $task->txn_id = $information['result']['txn_id'];
        $task->confirms_needed = $information['result']['confirms_needed'];
        $task->checkout_url = $information['result']['checkout_url'];
        $task->status_url = $information['result']['status_url'];
        $task->qrcode_url = $information['result']['qrcode_url'];
        $task->save();

        return view('user.dashboard.deposit.qr', compact('task'));
        // return redirect($task->checkout_url);
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
        $validatedData = $request->validate([
            'plan_id' => 'required',
        ]);


        $plan = Plan::findOrFail($request->plan_id);

        if ($plan->price > balance(auth()->user()->id)) {
            return redirect()->back()->withErrors('Insufficient balance');
        }



        // inserting Plan Activate Transaction
        $deposit = new Transaction();
        $deposit->user_id = auth()->user()->id;
        $deposit->amount = $plan->price;
        $deposit->type = 'plan activated';
        $deposit->sum = 'out';
        $deposit->status = 'approved';
        $deposit->save();

        // activating this user plan
        $userPlan = new UserPlan();
        $userPlan->user_id = auth()->user()->id;
        $userPlan->plan_id = $validatedData['plan_id'];
        $userPlan->status = 'active';
        $userPlan->save();

        // activate this user status
        $user = User::find(auth()->user()->id);
        $user->status = 'active';
        $user->save();

        Log::info('User Plan Activated, Proces to Refer Section');

        // checking if this user is networker
        if (auth()->user()->network == 1) {
            goto endLoop;
        }

        // checking if this user has valid refer for commission
        if ($user->refer != 'default') {
            // Direct Refer Commission
            $directRefer = Affiliate::where('level', 'Direct')->first()->value;
            $sponser = User::where('username', $user->refer)->where('status', 'active')->first();
            if ($sponser == "") {
                Log::info('No Sponser Found, Skipping Commission');
                goto endLoop;
            }
            Log::info($sponser->username . ' is sponser Found. Commission will be given');

            $security = myPlanCount($sponser->id) * 7;
            if (networkCap($sponser->id) >= $security) {
                Log::info('Total Network Cap is: '.networkCap($sponser->id));
                Log::info('Current Target Netowrk Cap Limit is: '.$security);
                Log::info('My Plan Amount total is: '.myPlanCount($sponser->id));
                Log::info('networkCap Reached, Skipping this Complete loop');
                goto endLoop;
            }
            Log::info('networkCap NOt yet Reach, Process for Commission');

            // inserting Plan Activate Transaction
            $commission = new Transaction();
            $commission->user_id = $sponser->id;
            $commission->amount = $plan->price * $directRefer / 100;
            $commission->type = 'direct commission';
            $commission->sum = 'in';
            $commission->status = 'approved';
            $commission->reference = auth()->user()->username;
            $commission->save();

            Log::info('Process for Indirect Level Commission');

            // Indirect Refer Loop
            for ($i = 1; $i < 7; $i++) {
                Log::info($i. ' Level Indirect Commission');
                // checking if this direct user has valid Refer
                if ($sponser->refer != 'default') {
                    // checking if this direct user has valid Refer
                    $level = "Level " . $i;
                    $indirectRefer = Affiliate::where('level', $level)->first()->value;
                    $sponser = User::where('username', $sponser->refer)->first();

                    $security = myPlanCount($sponser->id) * 7;
                    if (networkCap($sponser->id) >= $security) {
                        Log::info('networkCap Reached, Skipping this loop Step');
                        goto skipLoop;
                    }
                    Log::info('networkCap not Reached, Proccess');

                    // inserting Plan Activate Transaction
                    $commission = new Transaction();
                    $commission->user_id = $sponser->id;
                    $commission->amount = $plan->price * $indirectRefer / 100;
                    $commission->type = 'indirect commission L' . $i;
                    $commission->sum = 'in';
                    $commission->reference = auth()->user()->username;
                    $commission->status = 'approved';
                    $commission->save();

                    Log::info($sponser->username. ' Indirect Commission Added, Indirct No:' . $i);

                    skipLoop:
                } else {
                    goto endLoop;
                }
            }
            endLoop:
        }

        return redirect()->route('user.dashboard')->with('message', 'Plan Activated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        return view('user.dashboard.plan.show', compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
