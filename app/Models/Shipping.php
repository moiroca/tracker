<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mode', 'code', 'shipper_id', 'consignee_id', 'status', 'from', 'to', 'location', 'added_by'
    ];

    
    /** 
     * Get Consignee 
     */
    public function consignee()
    {
    	return $this->belongsTo('App\Models\User', 'consignee_id');
    }

    /** 
     * Get Shipper 
     */
    public function shipper()
    {
    	return $this->belongsTo('App\Models\User', 'shipper_id');
    }

    /**
     * Get Shipping Origin
     */
    public function origin()
    {
    	return $this->belongsTo('App\Models\Branch', 'from');
    }

    /**
     * Get Shipping Destination
     */
    public function destination()
    {
    	return $this->belongsTo('App\Models\Branch', 'to');
    }

    /**
     * Get Added Shippings
     */
    public function addedBy()
    {
        return $this->belongsTo('App\Models\User', 'added_by', 'id');
    }
    /**
     * Get Locations
     *
     * @return HasMany
     */
    public function shippingLocation()
    {
        return $this->hasMany('App\Models\ShippingLocation', 'shipping_id', 'id');
    }
}
