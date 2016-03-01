<?php namespace App\Services;

use App\Utilities\Constant;
use App\Models\User;
use App\Models\Shipping;
use App\Models\Branch;
 
/**
 * Shipping Service Class
 *
 * @author John Temoty Roca <rocajohntemoty@gmail.com>
 * @since 2016
 */
class ShippingService
{
	/**
	 * Save Shippings
	 * 
	 * @param Array $data
	 * @param Shipping $shipping
	 *
	 * @return Shipping $shipping
	 */
	public function save(
		$data, 
		Shipping $shipping = null, 
		User 	 $shipper  = null, 
		User 	 $consignee = null, 
		Branch   $origin = null,
		Branch   $destination = null)
	{
		if (!$shipping) {
			$shipping = new Shipping();
		}

		$shipping->fill($data);

		# Set Destination
		if ($destination) {
    		$shipping->destination()->associate($destination);
    	}

    	# Save Shipper
    	$shipping->shipper()->associate($shipper);

    	# Save Consignee
    	$shipping->consignee()->associate($consignee);

    	# Save Branch
    	$shipping->origin()->associate($origin);

    	$shipping->save();

		return $shipping;
	}

	/**
	 * Save Shipper
	 *
	 * @param User $user
	 * @param Shipping $shipping
	 * @param String $actor [Constant::SHIPPING_SHIPPER, Constant::SHIPPING_CONSIGNEE]
	 */  
	public function saveShippingActor(User $user, Shipping $shipping, $actor)
	{
		
	}
}