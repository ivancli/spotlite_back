<?php
/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 8/15/2016
 * Time: 10:03 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;
    protected $table = 'reports';
    public $timestamp = true;
    protected $fillable = ['content'];
    protected $visible = ['content'];
    protected $date = ['deleted_at'];

    public function report_task()
    {
        return $this->belongsTo('App\Models\ReportTask', 'report_task_id', 'report_task_id');
    }
}