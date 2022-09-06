<?php

namespace App\Console\Commands;

use App\Models\directAward;
use App\Models\globalShareMembers;
use App\Models\globalShareRevenue;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserPlan;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class globalShare extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'global:share';

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
        Log::info('Starting Global Share Procces');
        // checking for this user achive reward
        // getting all user who have plans
        $userPlans = UserPlan::where('status', 'active')->get();
        Log::info('Loop Start');

        if (globalShareBusiness() < 1) {
            goto endGlobalShare;
        }

        $globalShareRevenue = globalShareRevenue::where('month', date('m'))->where('year', date('Y'))->where('status', 'close')->get();
        if ($globalShareRevenue->count() > 0) {
            Log::info('Global Share Already Closed');
            goto endGlobalShare;
        } else {
            $globalShareRevenue = globalShareRevenue::where('month', date('m'))->where('year', date('Y'))->where('status', 'open')->first();
            if ($globalShareRevenue == "") {
                $globalShareRevenue = new globalShareRevenue();
                $globalShareRevenue->month = date('m');
                $globalShareRevenue->year = date('Y');
                $globalShareRevenue->business = globalShareBusiness();
                $globalShareRevenue->status = 'open';
                $globalShareRevenue->save();
            }
        }

        Log::info('Global Share Revenue Updated: ' . $globalShareRevenue->business);

        foreach ($userPlans as $userPlan) {
            Log::info('Global Share Loop Count');
            // checking for this user achive reward
            $user = User::find($userPlan->user_id);
            if (directBusiness($userPlan->user_id) > 0) {
                Log::info('Direct Business Found');
                // proccess for direct award
                $awardSlab = directAward($user->id);
                Log::info('direct award slab: ' . $awardSlab);
                if ($awardSlab == "No Reward") {
                    goto endUserPlanLoopForGlobalShare;
                }
                $awardSlabRow = directAward::where('name', $awardSlab)->first();
                Log::info('direct award slab row: ' . $awardSlabRow);


                $addInQueue = globalShareMembers::updateOrCreate(
                    ['user_id' => $user->id, 'direct_award_id' => $awardSlabRow->id, 'global_share_revenue_id' => $globalShareRevenue->id, 'status' => 'queue'],
                    ['month' => date('m'), 'year' => date('Y')]
                );

                Log::info('User Added in Queue: ' . $user->username);
            }
            endUserPlanLoopForGlobalShare:
        }

        Log::info('User Generating End');

        $globalShareRevenue = globalShareRevenue::where('month', date('m'))->where('year', date('Y'))->where('status', 'open')->first();

        Log::info('Proccess to Deliver Global Share Start');
        // getting all user who have global share in queue
        $directAwards = directAward::get();
        foreach ($directAwards as $directAward) {
            $globalShareMembers = globalShareMembers::where('direct_award_id', $directAward->id)->where('month', date('m'))->where('year', date('Y'))->where('status', 'queue')->get();
            Log::info('Global Share Member: ' . $globalShareMembers);
            if ($globalShareMembers->count() < 1) {
                // getting currenct globalShareRevenue id
                $addInQueue = globalShareMembers::updateOrCreate(
                    ['user_id' => 1, 'direct_award_id' => $directAward->id, 'global_share_revenue_id' => $globalShareRevenue->id, 'status' => 'queue', 'month' => date('m'), 'year' => date('Y')]
                );
            }
        }

        Log::info('Proccess to Deliver Global Share Ended');


        // Deliver Proccess Start
        $directAwards = directAward::get();
        foreach ($directAwards as $directAward) {
            $globalShareMembers = globalShareMembers::where('direct_award_id', $directAward->id)->where('month', date('m'))->where('year', date('Y'))->where('status', 'queue')->get();
            Log::info('Global Share Members Count: ' . $globalShareMembers->count());
            $totalProfitforThisSlab = $directAward->global;
            Log::info('Total Profit for this slab: ' . $totalProfitforThisSlab);
            // 50000
            // 0.25%
            // 125
            $calculation = $globalShareRevenue->business * $directAward->global / 100; // 125$
            Log::info('Global Share Business: ' . $calculation);
            // divde globalshare to each member

            foreach ($globalShareMembers as $globalShareMember) {
                $perUserGlobalShareAmount =  $calculation / $globalShareMembers->count(); // 125
                // checking if already delivered
                $alreadyTransactionSecurity = Transaction::where('user_id', $globalShareMember->user_id)
                    ->where('type', 'global share')
                    ->where('status', 'approved')
                    ->where('note', date('m'))
                    ->where('amount', $perUserGlobalShareAmount)
                    ->first();
                if ($alreadyTransactionSecurity == "") {
                    $transaction = new Transaction();
                    $transaction->user_id = $globalShareMember->user_id;
                    $transaction->type =  'global share';
                    $transaction->amount =  $perUserGlobalShareAmount;
                    $transaction->status =  'approved';
                    $transaction->sum =  'in';
                    $transaction->note =  date('m');
                    $transaction->reference =  "Global Share " . strtoupper($directAward->name) . ' ' . number_format($directAward->global, 2) . '%';
                    $transaction->save();
                } else {
                    Log::info('Already Delivered to this User');
                }
                // update global share members status
                $globalShareMember->status = 'delivered';
                $globalShareMember->save();
                Log::info('Global Share Members Status Updated');
            }
            Log::info('Global Share Members Profit Added: ' . $perUserGlobalShareAmount);

            $globalShareRevenue->status = 'close';
            $globalShareRevenue->save();

            Log::info('Global Share Revenue Status Closed');
        }
        endGlobalShare:
        Log::info('Global Share End');
        return 0;
    }
}
