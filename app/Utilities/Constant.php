<?php namespace App\Utilities;


/** 
 * Constant Class
 */ 
class Constant {

	const

		# Role Types
		ADMIN    = 1,
		MANAGER  = 2,
		EMPLOYEE = 3,

		# Shipping Status
		SHIPPING_PENDING 	= 'Pending',
		SHIPPING_COMPLETE 	= 'Complete',

		# Delivery Mode
		BRANCH_PICK_UP = 'Branch Pick-Up',
		HOUSE_TO_HOUSE = 'House to House';
}