<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 10/08/2016
 * Time: 9:10 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes
    protected $table = 'categories';
    public $timestamp = true;
    protected $fillable = ['name'];
    protected $visible = ['name'];
    protected $date = ['deleted_at'];

    public function products()
    {
        $this->hasMany('App\Product', 'category_id');
    }
}