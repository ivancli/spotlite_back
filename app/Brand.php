<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 10/08/2016
 * Time: 9:12 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes
    protected $table = 'brands';
    public $timestamp = true;
    protected $fillable = ['name'];
    protected $visible = ['name'];
    protected $date = ['deleted_at'];

    public function products()
    {
        $this->hasMany('App\Product', 'brand_id');
    }
}