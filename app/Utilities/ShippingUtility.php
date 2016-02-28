<?php namespace App\Utilities;

use App\Utilities\Constant;
use App\Models\Branch;

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

	/**
	 * Set Destination Location of Shipping
	 * 
	 * @param Array $shipping
	 */
	public function setLocation(&$shipping)
	{
        if ($shipping['mode'] == Constant::BRANCH_PICK_UP) {
            
            # Get Branch with Id of 2 for testing only
            $destinationBranch = Branch::find($shipping['to']);
            
            $shipping['location'] = $destinationBranch->address;
        }
	}
}