<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function products()
    {
        return $this->morphMany('App\Models\Product', 'owner');
    }

    public function categories()
    {
        return $this->morphToMany('App\Models\Category', 'owner', 'products');
    }

    public function subscription()
    {
        return $this->hasOne('App\Models\Subscription', 'user_id', 'id');
    }

    public function subscription_expired()
    {
//        if($this->subscription)
//        $expiryTimestamp = strtotime($this->subscription->expiry_date);
//        $currentTimestamp = time();
//        return $expiryTimestamp < $currentTimestamp;
        return false;
    }
}
