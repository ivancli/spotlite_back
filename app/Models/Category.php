<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 10/08/2016
 * Time: 9:10 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'categories';
    public $timestamp = true;
    protected $primaryKey = 'category_id';
    protected $fillable = ['category_name', 'category_order'];
    protected $visible = ['category_name', 'category_order'];
    protected $date = ['deleted_at'];

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'category_id', 'category_id');
    }

    public function report_tasks()
    {
        return $this->belongsTo('App\Models\ReportTask', 'report_task_id', 'report_task_id');
    }

    public function users()
    {
        return $this->morphedByMany('App\Models\User', 'owner', 'products');
    }
}