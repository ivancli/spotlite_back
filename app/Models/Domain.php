<?php
/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 8/15/2016
 * Time: 9:51 AM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Domain extends Model
{
    use SoftDeletes;
    protected $table = 'domains';
    public $timestamp = true;
    protected $primaryKey = 'domain_id';
    protected $fillable = ['domain_url', 'domain_name', 'domain_xpath', 'crawler_class', 'parser_class'];
    protected $visible = ['domain_url', 'domain_name', 'domain_xpath', 'crawler_class', 'parser_class'];
    protected $date = ['deleted_at'];

    public function cookie()
    {
        return $this->belongsTo('App\Cookie', 'cookie_id', 'cookie_id');
    }

    public function ips()
    {
        return $this->belongsToMany('App\IP', 'domain_ips', 'domain_id', 'ip_id');
    }
}