<?php namespace App\Utilities;

/**
 * Class Shipping Utility
 *
 * @author John Temoty Roca <rocajohntemoty@gmail.com>
 * @since 2016
 */
class ShippingUtility {

	/** 
	 * Generate New Shipping Code
	 *
	 * @return String
	 */
	public function generateCode()
	{
		return uniqid();
	}
}