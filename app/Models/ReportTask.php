<?php
/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 8/15/2016
 * Time: 9:36 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ReportTask extends Model
{
    protected $table = 'report_tasks';
    public $timestamp = true;
    protected $primaryKey = 'report_task_id';
    protected $fillable = ['frequency', 'date', 'day', 'time', 'weekday_only', 'delivery_method'];
    protected $visible = ['frequency', 'date', 'day', 'time', 'weekday_only', 'delivery_method'];

    public function product()
    {
        return $this->hasOne('App\Models\Product', 'report_task_id', 'report_task_id');
    }

    public function category()
    {
        return $this->hasOne('App\Models\Category', 'report_task_id', 'report_task_id');
    }

    public function logs()
    {
        return $this->hasMany('App\Models\ReportLog', 'report_task_id', 'report_task_id');
    }

    public function report()
    {
        return $this->hasMany('App\Models\Report', 'report_task_id', 'report_task_id');
    }
}