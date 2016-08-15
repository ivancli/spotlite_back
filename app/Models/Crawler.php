<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 10/08/2016
 * Time: 9:16 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Crawler extends Model
{
    use SoftDeletes;
    protected $table = 'crawlers';
    public $timestamp = true;
    protected $primaryKey = 'crawler_id';
    protected $fillable = ['crawler_class', 'parser_class', 'active_at'];
    protected $visible = ['crawler_class', 'parser_class', 'active_at'];
    protected $date = ['deleted_at'];

    public function site()
    {
        return $this->belongsTo('App\Site', 'site_id', 'site_id');
    }

    public function cookie()
    {
        return $this->belongsTo('App\Cookie', 'cookie_id', 'cookie_id');
    }

    public function ips()
    {
        return $this->belongsToMany('App\IP', 'crawler_ips', 'crawler_id', 'ip_id');
    }

    public function historical_prices()
    {
        return $this->hasMany('App\Price', 'crawler_id', 'crawler_id');
    }

    public function logs()
    {
        return $this->hasMany('App\CrawlerLog', 'crawler_id', 'crawler_id');
    }
}