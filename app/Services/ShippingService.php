<?php namespace App\Services;

use App\Models\Shipping;
use App\Utilities\Constant;
use App\Models\User;
 
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
	public function save($data, Shipping $shipping = null)
	{
		if (!$shipping) {
			$shipping = new Shipping();
		}

		$shipping->fill($data);
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