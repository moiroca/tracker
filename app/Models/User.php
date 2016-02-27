<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'contact', 'address', 'username', 'password', 
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get Roles
     */
    public function roles($value='')
    {
        return $this->belongsToMany('App\Models\Role', 'user_roles', 'user_id', 'role_id');
    }

    /**
     * Get Consignee Shippings
     */
    public function consigneeShippings()
    {
        return $this->hasMany('App\Models\Shippings', 'consignee_id', 'id');
    }

    /**
     * Get Shipper Shippings
     */
    public function shipperShippings()
    {
        return $this->hasMany('App\Models\Shippings', 'shipper_id', 'id');
    }
}
