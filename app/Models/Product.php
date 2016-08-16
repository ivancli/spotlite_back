<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 10/08/2016
 * Time: 8:58 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    public $timestamp = true;
    protected $primaryKey = 'product_id';
    protected $fillable = ['product_name', 'product_order'];
    protected $visible = ['product_name', 'product_order'];
    protected $date = ['deleted_at'];

    public function user()
    {
        return $this->morphTo();
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'category_id');
    }

    public function sites()
    {
        return $this->belongsToMany('App\Models\Site', 'product_sites', 'product_id', 'site_id');
    }

    public function report_task()
    {
        return $this->belongsTo('App\Models\ReportTask', 'report_task_id', 'report_task_id');
    }
}