<?php
/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 8/15/2016
 * Time: 10:10 AM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscription_id';
    public $timestamp = true;
    protected $fillable = ['api_product_id', 'api_customer_id', 'api_subscription_id', 'expiry_date'];
    protected $visible = ['api_product_id', 'api_customer_id', 'api_subscription_id', 'expiry_date'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}