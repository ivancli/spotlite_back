<?php

namespace App\Console;

use App\Jobs\CrawlPrice;
use App\Models\Crawler;
use App\Models\Site;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    use DispatchesJobs;
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
        Commands\Inspire::class
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
            /* get all crawlers */
            $sites = Site::all();
            foreach($sites as $siteIndex=>$site){
                $products = $site->products;
                if(count($products) == 0){
                    unset($sites[$siteIndex]);
                    continue;
                }else{
                    $anyUserUsingTheSite = false;
                    foreach($products as $productIndex=>$product){
                        $user = $product->user;
                        $subscription = $user->subscription;
                        $expiryDateTimestamp = strtotime($subscription->expiry_date);
                        $currentTimestamp = time();
                        if($expiryDateTimestamp > $currentTimestamp)
                        {
                            $anyUserUsingTheSite = true;
                        }
                    }
                    if($anyUserUsingTheSite === false){
                        unset($sites[$siteIndex]);
                        continue;
                    }
                }
            }

//            $users = User::all();
//            foreach ($users as $user) {
//                if ($user->subscription_expired === false) {
//                    $products = $user->products;
//                    foreach($products as $product){
//                        $sites = $product->sites;
//                    }
//                }
//            }

//            foreach($users as $user){
//                $this->dispatch(new CrawlPrice($user));
//            }
        })->everyMinute();
    }
}
