<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 10/08/2016
 * Time: 9:14 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model
{
    use SoftDeletes
    protected $table = 'sites';
    public $timestamp = true;
    protected $fillable = ['link', 'xpath'];
    protected $visible = ['link', 'xpath'];
    protected $date = ['deleted_at'];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function prices()
    {
        return $this->hasMany('App\Price', 'site_id');
    }
}