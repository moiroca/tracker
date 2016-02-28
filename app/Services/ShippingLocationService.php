<?php namespace App\Services;

use App\Models\Shipping;
use App\Models\User;

/**
 * Shipping Location Service
 *
 * @author John Temoty Roca <rocajohntemoty@gmail.com>
 * @since 2016
 */
class ShippingLocationService 
{
	/**
	 * Save Shipping Location
	 */
	public function save($data, User $user, Shipping $shipping)
	{
		$shipping->location->pivot->location = $data['location'];
		$shipping->location->associate($user);
		$shipping->save();
	}
}