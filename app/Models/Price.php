<?php
/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 8/15/2016
 * Time: 9:31 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use SoftDeletes;
    protected $table = 'historical_prices';
    public $timestamp = true;
    protected $primaryKey = 'price_id';
    protected $fillable = ['price'];
    protected $visible = ['price'];
    protected $date = ['deleted_at'];

    public function crawlers()
    {
        return $this->belongsTo('App\Models\Crawler', 'crawler_id', 'crawler_id');
    }

    public function site()
    {
        return $this->belongsTo('App\Models\Site', 'site_id', 'site_id');
    }
}