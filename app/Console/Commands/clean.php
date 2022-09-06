<?php

namespace App\Console\Commands;

use App\Models\Affiliate;
use App\Models\directAward;
use App\Models\InDirectAward;
use App\Models\passive;
use App\Models\Plan;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class clean extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:clean';

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
        Artisan::call('migrate:fresh');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');


        // Create a new user


        $user = new User();
        $user->name = "Administrator";
        $user->username = "test";
        $user->email = "admin@gmail.com";
        $user->role = "admin";
        $user->email_verified_at = now();
        $user->password = Hash::make("asdfasdf");
        $user->save();

        $user = new User();
        $user->name = "Shakeel Ahmad";
        $user->username = "shakeel2717";
        $user->email = "shakeel2717@gmail.com";
        $user->password = Hash::make("asdfasdf");
        $user->email_verified_at = now();
        $user->save();

        $deposit = new Transaction();
        $deposit->user_id = $user->id;
        $deposit->amount = 50000;
        $deposit->type = 'deposit';
        $deposit->reference = 'Make Clean';
        $deposit->sum = 'in';
        $deposit->status = 'approved';
        $deposit->save();

        // create new package
        $plan = new Plan();
        $plan->name = "Learn & Earn";
        $plan->price = 50;
        $plan->profit = 250;
        $plan->duration = 24;
        $plan->save();

        // create next package
        $plan = new Plan();
        $plan->name = "Basic";
        $plan->price = 200;
        $plan->profit = 250;
        $plan->duration = 24;
        $plan->save();

        // create next package
        $plan = new Plan();
        $plan->name = "Starter";
        $plan->price = 500;
        $plan->profit = 250;
        $plan->duration = 24;
        $plan->save();

        // create next package
        $plan = new Plan();
        $plan->name = "Beginner";
        $plan->price = 1000;
        $plan->profit = 300;
        $plan->duration = 24;
        $plan->save();

        // create next package
        $plan = new Plan();
        $plan->name = "Intermediate";
        $plan->price = 3000;
        $plan->profit = 300;
        $plan->duration = 22;
        $plan->save();

        // create next package
        $plan = new Plan();
        $plan->name = "Advance";
        $plan->price = 6000;
        $plan->profit = 350;
        $plan->duration = 22;
        $plan->save();

        // create next package
        $plan = new Plan();
        $plan->name = "Business";
        $plan->price = 10000;
        $plan->profit = 350;
        $plan->duration = 22;
        $plan->save();

        // create next package
        $plan = new Plan();
        $plan->name = "Entrepreneur";
        $plan->price = 15000;
        $plan->profit = 380;
        $plan->duration = 20;
        $plan->save();

        // create next package
        $plan = new Plan();
        $plan->name = "Professional";
        $plan->price = 25000;
        $plan->profit = 380;
        $plan->duration = 18;
        $plan->save();

        // create next package
        $plan = new Plan();
        $plan->name = "Owner";
        $plan->price = 50000;
        $plan->profit = 390;
        $plan->duration = 17;
        $plan->save();

        // inserting refer commision detail in database
        $affiliate = new Affiliate();
        $affiliate->level = "Direct";
        $affiliate->value = 10;
        $affiliate->save();

        $affiliate = new Affiliate();
        $affiliate->level = "Level 1";
        $affiliate->value = 5;
        $affiliate->save();

        $affiliate = new Affiliate();
        $affiliate->level = "Level 2";
        $affiliate->value = 4;
        $affiliate->save();

        $affiliate = new Affiliate();
        $affiliate->level = "Level 3";
        $affiliate->value = 2;
        $affiliate->save();

        $affiliate = new Affiliate();
        $affiliate->level = "Level 4";
        $affiliate->value = 2;
        $affiliate->save();

        $affiliate = new Affiliate();
        $affiliate->level = "Level 5";
        $affiliate->value = 1;
        $affiliate->save();

        $affiliate = new Affiliate();
        $affiliate->level = "Level 6";
        $affiliate->value = 1;
        $affiliate->save();


        $passive = new passive();
        $passive->level = "Direct";
        $passive->value = 3;
        $passive->save();

        $passive = new passive();
        $passive->level = "Level 1";
        $passive->value = 2;
        $passive->save();


        $passive = new passive();
        $passive->level = "Level 2";
        $passive->value = 1;
        $passive->save();

        $directAward = new directAward();
        $directAward->name = "PREMIUM";
        $directAward->business_from = 5000;
        $directAward->business_to = 9999;
        $directAward->award = 300;
        $directAward->global = 0.25;
        $directAward->save();

        $directAward = new directAward();
        $directAward->name = "EXECUTIVE";
        $directAward->business_from = 10000;
        $directAward->business_to = 24999;
        $directAward->award = 700;
        $directAward->global = 0.35;
        $directAward->save();

        $directAward = new directAward();
        $directAward->name = "DIAMOND";
        $directAward->business_from = 25000;
        $directAward->business_to = 49999;
        $directAward->award = 3000;
        $directAward->global = 0.50;
        $directAward->save();


        $directAward = new directAward();
        $directAward->name = "Representative";
        $directAward->business_from = 50000;
        $directAward->business_to = 99999;
        $directAward->award = 7000;
        $directAward->global = 1.00;
        $directAward->save();


        $directAward = new directAward();
        $directAward->name = "manager";
        $directAward->business_from = 100000;
        $directAward->business_to = 249999;
        $directAward->award = 12000;
        $directAward->global = 1.50;
        $directAward->save();

        $directAward = new directAward();
        $directAward->name = "DIRECTOR";
        $directAward->business_from = 250000;
        $directAward->business_to = 499999;
        $directAward->award = 25000;
        $directAward->global = 2.00;
        $directAward->save();


        // In-Direct Award
        $inDirectAward = new InDirectAward();
        $inDirectAward->name = "Squire";
        $inDirectAward->business_from = 5000;
        $inDirectAward->business_to = 9999;
        $inDirectAward->award = 50;
        $inDirectAward->save();

        $inDirectAward = new InDirectAward();
        $inDirectAward->name = "Executor";
        $inDirectAward->business_from = 10000;
        $inDirectAward->business_to = 24999;
        $inDirectAward->award = 200;
        $inDirectAward->save();


        $inDirectAward = new InDirectAward();
        $inDirectAward->name = "High Minister";
        $inDirectAward->business_from = 25000;
        $inDirectAward->business_to = 49999;
        $inDirectAward->award = 500;
        $inDirectAward->save();


        $inDirectAward = new InDirectAward();
        $inDirectAward->name = "Royal Paladin";
        $inDirectAward->business_from = 50000;
        $inDirectAward->business_to = 99999;
        $inDirectAward->award = 1000;
        $inDirectAward->save();


        $inDirectAward = new InDirectAward();
        $inDirectAward->name = "Regent";
        $inDirectAward->business_from = 100000;
        $inDirectAward->business_to = 249999;
        $inDirectAward->award = 3000;
        $inDirectAward->save();


        $inDirectAward = new InDirectAward();
        $inDirectAward->name = "Ambassador";
        $inDirectAward->business_from = 250000;
        $inDirectAward->business_to = 49999999;
        $inDirectAward->award = 10000;
        $inDirectAward->save();

        return 0;
    }
}
