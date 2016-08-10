<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 10/08/2016
 * Time: 9:05 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes
    protected $table = 'groups';
    public $timestamp = true;
    protected $fillable = ['name', 'website', 'description'];
    protected $visible = ['name', 'website', 'description'];
    protected $date = ['deleted_at'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'group_users');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'group_products');
    }
}