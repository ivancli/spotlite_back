<?php
/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 8/15/2016
 * Time: 10:24 AM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class UserActivityLog extends Model
{
    protected $table = 'user_activity_logs';
    public $timestamp = true;
    protected $primaryKey = 'user_activity_log_id';
    protected $fillable = ['activity'];
    protected $visible = ['activity'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}