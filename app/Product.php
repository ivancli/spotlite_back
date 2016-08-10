<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 10/08/2016
 * Time: 8:58 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    public $timestamp = true;
    protected $fillable = ['name'];
    protected $visible = ['name'];
    protected $date = ['deleted_at'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_products');
    }

    public function group()
    {
        return $this->belongsToMany('App\Group', 'group_products');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand', 'brand_id');
    }

    public function sites()
    {
        return $this->hasMany('App\Site', 'product_id');
    }
}