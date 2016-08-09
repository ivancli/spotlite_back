<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 7/08/2016
 * Time: 12:28 AM
 */

namespace App\Jobs;


use App\User;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CrawlPrice extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     *
     */
    public function handle()
    {
        date_default_timezone_set('Australia/Sydney');
        file_put_contents("/var/www/html/test.txt", file_get_contents("/var/www/html/test.txt") . "\r\n" . date('m/d/Y h:i:s a', time()) . json_encode($this->user) . "\r\n");
    }
}