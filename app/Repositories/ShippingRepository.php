<?php namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Shipping;
use App\Utilities\Constant;

/**
 * Shipping Repository Class
 *
 * @author John Temoty Roca <rocajohntemoty@gmail.com>
 * @since 2016
 */
class ShippingRepository extends BaseRepository
{
	/**
	 * @var Shipping $model
	 */
	public $model;

	/**
	 * Constructor Function
	 */
	public function __construct(Shipping $shipping)
	{
		$this->model = $shipping;
	}

	/** 
	 * Get Shipping Modes
 	 * @return Array
 	 */
	public function getModes()
	{
		return [
			Constant::BRANCH_PICK_UP,
			Constant::HOUSE_TO_HOUSE
		];
	}
}