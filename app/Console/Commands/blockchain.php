<?php

namespace App\Console\Commands;

use App\Models\directAward;
use App\Models\InDirectAward;
use App\Models\passive;
use App\Models\Transaction;
use App\Models\User;
use App\Models\user\RoiTransaction;
use App\Models\UserPlan;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class blockchain extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blockchain:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info('blockchain:run Successfully');
        // getting all user who have plans
        $userPlans = UserPlan::where('status', 'active')->get();
        Log::info('Loop Start');

        foreach ($userPlans as $userPlan) {
            Log::info('Loop Count');

            // checking if this user is netowrk Pin
            $user = User::find($userPlan->user_id);
            if ($user->network == 1) {
                Log::info($user->username . ' User is Networker');
                goto endThisUser;
            }

            // checking if this user plan activate today
            if ($userPlan->created_at->format('Y-m-d') == Carbon::now()->format('Y-m-d')) {
                Log::info($user->username . ' User Plan is activate today, skipping :' .  $userPlan->created_at);
                goto endThisUser;
            }


            $calc = $userPlan->plan->profit / 100;
            $durationCalculation = $userPlan->plan->price * $calc;
            $durationLeft = $durationCalculation / $userPlan->plan->duration;
            $monthLeft = $durationLeft / 30;

            // // checking if this user ROI is Stopped
            // if ($user->roi == 0) {
            //     Log::info($user->username.' User ROi is Stoped in Admin');
            //     goto endThisUser;
            // }

            // checking if this ROI already Inserted
            $transaction = RoiTransaction::where('user_id', $userPlan->user_id)
                ->whereDate('created_at', Carbon::today())
                ->where('amount', $monthLeft)
                ->where('sum', 'in')
                ->where('user_plan_id', $userPlan->id)
                ->get();
            // checking all roi transaction who created_at today with carbon

            if ($transaction->count() > 0) {
                Log::info($user->username . ' Already ROI Inserted');
                goto endThisUser;
            } else {
                $transaction = new RoiTransaction();
                $transaction->user_id = $userPlan->user_id;
                $transaction->amount =  $monthLeft;
                $transaction->status =  'approved';
                $transaction->sum =  'in';
                $transaction->reference =  $userPlan->plan->name;
                $transaction->user_plan_id = $userPlan->id;
                $transaction->save();
                Log::info('daily roi for User: ' . $user->username . ' Successfully');
            }

            // Passive Income upto 2 levels
            // checking if this user has valid refer
            if ($user->refer != 'default') {
                // checking if passive income is stopped in admin
                if ($user->passive == 1) {
                    $user = User::where('username', $user->refer)->first();
                    if ($user) {
                        $passive = passive::where('level', 'Direct')->first();
                        if ($passive) {
                            $directPassive = $monthLeft * $passive->value / 100;
                            $security = myPlanCount($user->id) * 7;
                            if (networkCap($user->id) >= $security) {
                                Log::info('networkCap Reached, Skipping this Complete loop');
                                goto endThisUser;
                            }
                            $transaction = new Transaction();
                            $transaction->user_id = $user->id;
                            $transaction->type =  'passive income 1';
                            $transaction->amount =  $directPassive;
                            $transaction->status =  'approved';
                            $transaction->sum =  'in';
                            $transaction->reference =  $userPlan->user->username;
                            $transaction->save();

                            Log::info('passive income 1: ' . $user->username . ' Successfully');

                            // checking if this user has valid refer
                            if ($user->refer != 'default') {
                                $user = User::where('username', $user->refer)->first();
                                if ($user) {
                                    $passive = passive::where('level', 'Level 1')->first();
                                    if ($passive) {
                                        $level1Passive = $monthLeft * $passive->value / 100;
                                        $security = myPlanCount($user->id) * 7;
                                        if (networkCap($user->id) >= $security) {
                                            Log::info('networkCap Reached, Skipping this Complete loop');
                                            goto endThisUser;
                                        }
                                        $transaction = new Transaction();
                                        $transaction->user_id = $user->id;
                                        $transaction->type =  'passive income 2';
                                        $transaction->amount =  $level1Passive;
                                        $transaction->status =  'approved';
                                        $transaction->sum =  'in';
                                        $transaction->reference =  $userPlan->user->username;
                                        $transaction->save();

                                        Log::info('passive income 2: ' . $user->username . ' Successfully');

                                        // checking if this user has valid refer
                                        if ($user->refer != 'default') {
                                            $user = User::where('username', $user->refer)->first();
                                            if ($user) {
                                                $passive = passive::where('level', 'Level 2')->first();
                                                if ($passive) {
                                                    $level2Passive = $monthLeft * $passive->value / 100;
                                                    $security = myPlanCount($user->id) * 7;
                                                    if (networkCap($user->id) >= $security) {
                                                        Log::info('networkCap Reached, Skipping this Complete loop');
                                                        goto endThisUser;
                                                    }
                                                    $transaction = new Transaction();
                                                    $transaction->user_id = $user->id;
                                                    $transaction->type =  'passive income 3';
                                                    $transaction->amount =  $level2Passive;
                                                    $transaction->status =  'approved';
                                                    $transaction->sum =  'in';
                                                    $transaction->reference =  $userPlan->user->username;
                                                    $transaction->save();

                                                    Log::info('passive income 3: ' . $user->username . ' Successfully');
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            endThisUser:


            // checking for this user achive reward
            $user = User::find($userPlan->user_id);
            if (directBusiness($userPlan->user_id) > 0) {
                Log::info('Award Direct Started');
                // proccess for direct award
                $awardSlab = directAward($user->id);
                Log::info('direct award slab' . $awardSlab);
                $awardSlabRow = directAward::where('name', $awardSlab)->first();
                if ($awardSlabRow != "") {

                    // Direct Business Award Start for all Slabs
                    $directAwards = directAward::get();
                    foreach ($directAwards as $directAward) {
                        // checking if already inserted
                        $transaction = Transaction::where('user_id', $userPlan->user_id)
                            ->where('type', 'direct business award')
                            ->where('amount', $directAward->award)
                            ->where('reference', $directAward->name)
                            ->get();

                        if ($transaction->count() > 0) {
                            Log::info('Skip skipAwardDirect');
                            goto skipThisLoopDirectAward;
                        }

                        Log::info('direct award slab row' . $awardSlabRow->award);
                        $security = myPlanCount($userPlan->user_id) * 7;
                        if (networkCap($userPlan->user_id) >= $security) {
                            Log::info('networkCap Reached, Skipping this Complete loop');
                            goto endThisLoopDirectAward;
                        }

                        $transaction = new Transaction();
                        $transaction->user_id = $userPlan->user_id;
                        $transaction->type =  'direct business award';
                        $transaction->amount =  $directAward->award;
                        $transaction->status =  'approved';
                        $transaction->sum =  'in';
                        $transaction->reference =  $directAward->name;
                        $transaction->save();
                        Log::info('direct business award: ' . $userPlan->user->username . ' Successfully');
                        skipThisLoopDirectAward:
                        if ($directAward->name == $awardSlab) {
                            goto endThisLoopDirectAward;
                        }
                    }
                    endThisLoopDirectAward:
                } else {
                    Log::info('no direct award slab');
                }
                Log::info('Award Direct Started ENDED');
            }





            // InDirect Business Reward Section Start
            $user = User::find($userPlan->user_id);
            Log::info('InDirect Business Reward Section Started');
            if (inDirectBusiness($userPlan->user_id) > 0) {
                // proccess for direct award
                $awardSlab = inDirectAward($userPlan->user_id);
                Log::info('in direct award slab' . $awardSlab);
                $awardSlabRow = inDirectAward::where('name', $awardSlab)->first();
                if ($awardSlabRow != "") {

                    // InDirect Business Award Start for all Slabs
                    $inDirectAwards = inDirectAward::get();
                    foreach ($inDirectAwards as $inDirectAward) {
                        // checking if already inserted
                        $transaction = Transaction::where('user_id', $userPlan->user_id)
                            ->where('type', 'InDirect 1 business award')
                            ->where('amount', $inDirectAward->award)
                            ->where('reference', $inDirectAward->name)
                            ->get();

                        if ($transaction->count() > 0) {
                            Log::info('Skip skipAwardInDirect');
                            goto skipThisLoopInDirectAward;
                        }

                        Log::info('in direct award slab row' . $awardSlabRow->award);
                        $security = myPlanCount($userPlan->user_id) * 7;
                        if (networkCap($userPlan->user_id) >= $security) {
                            Log::info('networkCap Reached, Skipping this Complete loop');
                            goto endThisLoopInDirectAward;
                        }

                        $transaction = new Transaction();
                        $transaction->user_id = $userPlan->user_id;
                        $transaction->type =  'InDirect 1 business award';
                        $transaction->amount =  $inDirectAward->award;
                        $transaction->status =  'approved';
                        $transaction->sum =  'in';
                        $transaction->reference =  $inDirectAward->name;
                        $transaction->save();
                        skipThisLoopInDirectAward:
                        if ($inDirectAward->name == $awardSlab) {
                            goto endThisLoopInDirectAward;
                        }
                    }
                    endThisLoopInDirectAward:
                }
            } else {
                Log::info('No InDirect Business');
            }



            // Removing User balance who already get more balance then 7x
            if (networkCap($userPlan->user_id) > 0) {
                Log::info('Network Cap Reached  Started');
                $user = User::find($userPlan->user_id);
                Log::info('Working on User: ' . $user->username . ' and network cap is: ' . networkCapReach($user->id) . ' and he already got: ' . networkCap($user->id));

                // checking if this user already got more then network reach
                // sum all already removed balance transaction
                $sumAllAlreadyRemoved = Transaction::where('user_id', $user->id)
                    ->where('type', '7x cap reached')
                    ->where('sum', 'out')
                    ->sum('amount');
                Log::info('Total Already Remvoed balance: ' . $sumAllAlreadyRemoved);
                if (networkCap($user->id) > (networkCapReach($user->id) + $sumAllAlreadyRemoved)) {
                    Log::info('network cap reached, but he already got more then network cap');

                    // Removing Balance from this User Account
                    $amountClean = networkCap($user->id) - networkCapReach($user->id) - $sumAllAlreadyRemoved;
                    $transaction = new Transaction();
                    $transaction->user_id = $user->id;
                    $transaction->type =  '7x cap reached';
                    $transaction->amount =  $amountClean;
                    $transaction->status =  'approved';
                    $transaction->sum =  'out';
                    $transaction->reference = 'blockchain';
                    Log::info('Netowrk Clean Amount: ' . $amountClean);
                    $transaction->save();
                }
                Log::info('Network Cap Reached  Ended');
            }
        }

        Log::info('blockchain:run and Ended Successfully');
        return 0;
    }
}
