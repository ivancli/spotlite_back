<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 10/08/2016
 * Time: 8:58 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    public $timestamp = true;
    protected $fillable = ['product_name'];
    protected $visible = ['product_name'];
    protected $date = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'category_id');
    }

    public function sites()
    {
        return $this->hasMany('App\Site', 'product_id', 'product_id');
    }

    public function report_task()
    {
        return $this->belongsTo('App\ReportTask', 'report_task_id', 'report_task_id');
    }
}