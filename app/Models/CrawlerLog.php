<?php
/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 8/15/2016
 * Time: 9:56 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CrawlerLog extends Model
{
    protected $table = 'crawler_logs';
    public $timestamp = true;
    protected $primaryKey = 'crawler_log_id';
    protected $fillable = ['status', 'message'];
    protected $visible = ['status', 'message'];

    public function crawler()
    {
        return $this->belongsTo('App\Models\Crawler', 'crawler_id', 'crawler_id');
    }
}