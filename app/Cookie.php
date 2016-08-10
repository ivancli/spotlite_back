<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 10/08/2016
 * Time: 9:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cookie extends Model
{
    use SoftDeletes
    protected $table = 'cookies';
    public $timestamp = true;
    protected $fillable = ['name', 'cookie_header', 'cookie_file'];
    protected $visible = ['name', 'cookie_header', 'cookie_file'];
    protected $date = ['deleted_at'];

    public function crawlers()
    {
        return $this->hasMany('App\Crawler', 'cookie_id');
    }
}