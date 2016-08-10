<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 10/08/2016
 * Time: 9:16 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Crawler extends Model
{
    use SoftDeletes
    protected $table = 'crawlers';
    public $timestamp = true;
    protected $fillable = ['crawler_class', 'parser_class'];
    protected $visible = ['crawler_class', 'parser_class'];
    protected $date = ['deleted_at', 'active_at'];

    public function site()
    {
        return $this->belongsTo('App\Site', 'site_id');
    }

    public function cookie()
    {
        return $this->belongsTo('App\Cookie', 'cookie_id');
    }

    public function ips()
    {
        return $this->belongsToMany('App\IP', 'crawler_ips');
    }
}