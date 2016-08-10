<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 10/08/2016
 * Time: 9:19 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prices extends Model
{
    use SoftDeletes
    protected $table = 'crawled_prices';
    public $timestamp = true;
    protected $fillable = ['price'];
    protected $visible = ['price'];
    protected $date = ['deleted_at'];

    public function crawler()
    {
        return $this->belongsTo('App\Crawler', 'crawler_id');
    }

    public function site()
    {
        return $this->belongsTo('App\Site', 'site_id');
    }
}