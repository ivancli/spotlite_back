<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 10/08/2016
 * Time: 9:24 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cookie extends Model
{
    use SoftDeletes;
    protected $table = 'cookies';
    public $timestamp = true;
    protected $primaryKey = 'cookie_id';
    protected $fillable = ['cookie_name', 'cookie_header', 'cookie_file'];
    protected $visible = ['cookie_name', 'cookie_header', 'cookie_file'];
    protected $date = ['deleted_at'];

    public function crawlers()
    {
        return $this->hasMany('App\Crawler', 'cookie_id', 'cookie_id');
    }

    public function domains()
    {
        return $this->hasMany('App\Domain', 'cookie_id', 'cookie_id');
    }
}