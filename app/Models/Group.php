<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 10/08/2016
 * Time: 9:05 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;
    protected $table = 'groups';
    public $timestamp = true;
    protected $primaryKey = 'group_id';
    protected $fillable = ['group_name', 'website', 'description'];
    protected $visible = ['group_name', 'website', 'description'];
    protected $date = ['deleted_at'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'group_users', 'group_id', 'user_id');
    }
}