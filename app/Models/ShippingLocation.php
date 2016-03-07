<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ShippingLocation extends Model
{
	use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shipping_id', 'location', 'added_by'
    ];

    /** 
     * Get Shipping 
     *
     * @return BelongsTo
     */
    public function shipping()
    {
    	return $this->belongsTo('App\Models\Shipping', 'shipping_id');
    }

    /** 
     * Get Added By 
     *
     * @return BelongsTo
     */
    public function actor()
    {
    	return $this->belongsTo('App\Models\User', 'added_by');
    }
}
