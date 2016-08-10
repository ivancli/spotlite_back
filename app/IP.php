<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 10/08/2016
 * Time: 9:26 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IP extends Model
{
    use SoftDeletes
    protected $table = 'ips';
    public $timestamp = true;
    protected $fillable = ['ip_address'];
    protected $visible = ['ip_address'];
    protected $date = ['deleted_at'];

    public function crawlers()
    {
        return $this->belongsToMany('App\Crawler', 'crawler_ips');
    }
}