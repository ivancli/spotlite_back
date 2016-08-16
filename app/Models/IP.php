<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 10/08/2016
 * Time: 9:26 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IP extends Model
{
    use SoftDeletes;
    protected $table = 'ips';
    public $timestamp = true;
    protected $primaryKey = ['ip_id'];
    protected $fillable = ['ip_address'];
    protected $visible = ['ip_address'];
    protected $date = ['deleted_at'];

    public function crawlers()
    {
        return $this->belongsToMany('App\Models\Crawler', 'crawler_ips', 'ip_id', 'crawler_id');
    }

    public function domains()
    {
        return $this->belongsToMany('App\Models\Domain', 'domain_ips', 'ip_id', 'domain_id');
    }
}