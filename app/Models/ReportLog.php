<?php
/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 8/15/2016
 * Time: 9:45 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ReportLog extends Model
{
    protected $table = 'report_logs';
    public $timestamp = true;
    protected $primaryKey = 'report_log_id';
    protected $fillable = ['status', 'message'];
    protected $visible = ['status', 'message'];

    public function report_tasks()
    {
        return $this->belongsTo('App\Models\ReportTask', 'report_task_id', 'report_task_id');
    }
}