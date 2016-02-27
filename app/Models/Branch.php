<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address'
    ];

    /**
     * Get Shippings
     */
    public function shippings()
    {
    	return $this->hasMany('App\Models\Shippings', 'from', 'id');
    }

    /**
     * Get Shippings that mark this branch as its destination
     */
    public function shippingDestination()
    {
    	return $this->hasMany('App\Models\Shippings', 'to', 'id')
    }
}
