<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
<<<<<<< HEAD
        Commands\Inspire::class,
=======
        // Commands\Inspire::class,
        Commands\Inspire::class
>>>>>>> 21e97a76e8b6980ebc242837e0f02c6cd74158db
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->call(function () {
            file_put_contents("/var/www/html/test.txt", file_get_contents("/var/www/html/test.txt") . "\r\n" . date('m/d/Y h:i:s a', time()) . ": helloworld" . "\r\n");
        })->everyMinute();
    }
}
