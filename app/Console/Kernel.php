<?php

namespace App\Console;

use App\Jobs\ClearUsersCarts;
use App\Jobs\SendRateReminder;
use App\Jobs\SendVisitReminder;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
        $schedule->job(new SendVisitReminder)->everyFiveMinutes();
        $schedule->job(new SendRateReminder)->everyFiveMinutes();
        $schedule->job(new ClearUsersCarts)->everyTenMinutes();
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
