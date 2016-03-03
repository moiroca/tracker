<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateShippingRequest;
use App\Http\Controllers\Controller;
use App\Repositories\ShippingRepository;
use App\Repositories\BranchRepository;
use App\Services\ShippingService;
use App\Services\UserService;
use App\Utilities\Constant;
use App\Utilities\ShippingUtility;
use App\Models\Branch;

class ShippingController extends Controller
{

    /** 
     * @var ShippingRepository $shippingRepository
     */
    public $shippingRepository;

    /**
     * @var ShippingService
     */
    public $shippingService;

    /**
     * @var ShippingUtility
     */
    public $shippingUtility;

    /** 
     * Constructor Function
     */
	public function __construct(ShippingRepository $shippingRepository, ShippingService $shippingService, ShippingUtility $shippingUtility)
	{		
        $this->data = [
            'page_header'       => 'Shippings',
            'page_description'  => ''
        ];

        $this->shippingRepository = $shippingRepository;
        $this->shippingService    = $shippingService;
        $this->shippingUtility    = $shippingUtility;
	}

    /**
     * Index Page for Shipping
     */
    public function index(Request $request)
    {
        $code = $request->get('code', '');

        if (!empty($code)) {
            $this->data['shippings'] = $this->shippingRepository->getShippingByCode($code);
        } else {
            $this->data['shippings'] = $this->shippingRepository->getAll();   
        }

    	return view('shipping.index', $this->data );
    }

    /**
     * Create New Shipping
     */
    public function getCreate(Request $request, BranchRepository $branchRepo)
    {
        $this->data['modes']    = $this->shippingRepository->getModes();
        $this->data['branches'] = $branchRepo->getAll();

        return view('shipping.create', $this->data);
    }

    /**
     * Post Create
     */
    public function postCreate(
        CreateShippingRequest $createShippingRequest, 
        UserService $userService)
    {
        $isRequestSuccess = false;
        $error = '';

        try {

            # Get All Data
            $data = $createShippingRequest->all();
            $origin = Branch::find($data['origin']);
            $destination = null;

            # If Mode is Branch Pick-Up Save Destination
            if ($data['mode'] == Constant::BRANCH_PICK_UP) {
                $destination = Branch::find($data['destination_branch']);
            } 

            # Save Shipper
            $shipper = $userService->save([
                    'first_name' => $data['shipper_first_name'],
                    'last_name'  => $data['shipper_last_name'],
                    'contact'    => $data['shipper_contact'],
                    'address'    => $data['shipper_address'],
                ]);

            # Save Consignee
            $consignee = $userService->save([
                    'first_name' => $data['consignee_first_name'],
                    'last_name'  => $data['consignee_last_name'],
                    'contact'    => $data['consignee_contact'],
                    'address'    => $data['consignee_address'],
                ]);

            # Save Shipping
            $shipping = $this->shippingService->save([
                    'mode'      => $data['mode'],
                    'code'      => $this->shippingUtility->generateCode(),
                    'status'    => Constant::SHIPPING_PENDING,
                    'location'  => $data['location']
                ], null, $shipper, $consignee, $origin, $destination);               

            $isRequestSuccess = true;

        } catch (\Exception $e) {
            $error = $e->getMessage();
        }

        return redirect()->route('shippings')->withErrors([ 'isRequestSuccess' => $isRequestSuccess, 'error' => $error ]);
    }
}
