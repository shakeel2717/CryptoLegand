<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('backup:run')
            ->withoutOverlapping()
            ->everyThirtyMinutes()
            ->before(function () {
                Log::info('backup:run command Starting in Scheduler');
            })
            ->after(function () {
                Log::info('backup:run command Finished in Scheduler');
            })
            ->runsInMaintenanceMode();


        $schedule->command('blockchain:run')
            ->withoutOverlapping()
            ->twiceDaily()
            ->before(function () {
                Log::info('blockchain:run command Starting in Scheduler');
            })
            ->after(function () {
                Log::info('blockchain:run command Finished in Scheduler');
            })
            ->runsInMaintenanceMode();


        $schedule->command('global:share')
            ->withoutOverlapping()
            ->twiceMonthly()
            ->before(function () {
                Log::info('global:share command Starting in Scheduler');
            })
            ->after(function () {
                Log::info('global:share command Finished in Scheduler');
            })
            ->runsInMaintenanceMode();


        $schedule->command('queue:work --max-time=300 --tries=1')
            ->withoutOverlapping()
            ->everyTenMinutes()
            ->before(function () {
                Log::info('queue:work --max-time=300 --tries=1 command Starting in Scheduler');
            })
            ->after(function () {
                Log::info('queue:work --max-time=300 --tries=1 command Finished in Scheduler');
            })
            ->runsInMaintenanceMode();


        $schedule->command('queue:retry --queue=default')
            ->withoutOverlapping()
            ->everyMinute()
            ->before(function () {
                Log::info('queue:retry --queue=default command Starting in Scheduler');
            })
            ->after(function () {
                Log::info('queue:retry --queue=default command Finished in Scheduler');
            })
            ->runsInMaintenanceMode();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
