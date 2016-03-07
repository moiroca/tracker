<?php namespace App\Services;

use App\Models\Shipping;
use App\Models\User;
use App\Models\ShippingLocation;

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
	 *
	 * @param Array $data
	 * @param User $actor
	 */
	public function save($data, Shipping $shipping, User $actor)
	{
		$shippingLocation = new ShippingLocation();


        $shippingLocation->fill([
                'location' => $data['location']
            ]);

        # Save Shipping Location
        $shippingLocation->shipping()->associate($shipping);

        # Save Shippign Actor
        $shippingLocation->actor()->associate($actor);


        $shippingLocation->save();

		return $shipping;
	}

	/**
	 * Delete Shipping Location
	 *
	 * @param ShippingLocation $shippingLocation
	 */
	public function deleteShippingLocation(ShippingLocation $shippingLocation)
	{
		$shippingLocation->delete();
	}
}