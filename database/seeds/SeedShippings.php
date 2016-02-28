<?php

use Illuminate\Database\Seeder;
use App\Models\Shipping;
use App\Utilities\ShippingUtility;
use App\Models\Branch;
use App\Models\User;
use App\Utilities\Constant;

class SeedShippings extends Seeder
{
	/**  
	 * @var ShippingUtility $shippingUtility
	 */
	private $shippingUtility;

	/**
	 * @var Array $shippings
	 */
	private $shippings = [
		[
			'mode'   => Constant::BRANCH_PICK_UP,
			'status' => Constant::SHIPPING_PENDING,
			'location' => 'Manila, Manila'
		],
		[
			'mode'	=> Constant::HOUSE_TO_HOUSE,
			'status' => Constant::SHIPPING_PENDING,
			'location' => 'Davao City'
		]
	];

	/**
	 * Constructor Function
	 */
	public function __construct(ShippingUtility $shippingUtility)
	{
		$this->shippingUtility = $shippingUtility;
	}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shippings')->truncate();

        foreach ($this->shippings as $key => $shippingData) {

        	$shippingData = array_merge($shippingData, [
        			'code' => $this->shippingUtility->generateCode()
        		]);
            
        	$shipping = Shipping::create($shippingData);

        	if ($shipping->mode == Constant::BRANCH_PICK_UP) {

        		# Get Branch with Id of 2 for testing only
        		$destinationBranch = Branch::find(2);

        		$shipping->destination()->associate($destinationBranch);
        		$shipping->location = $destinationBranch->address;
        	}

        	# Save Shipper
        	$shipping->shipper()->associate(User::find(4));

        	# Save Consignee
        	$shipping->consignee()->associate(User::find(5));

        	# Save Branch
        	$shipping->origin()->associate(Branch::first());

        	$shipping->save();
        }
    }
}
