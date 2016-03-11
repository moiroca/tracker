<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CreateShippingLocation;
use App\Http\Requests;
use App\Http\Requests\CreateShippingRequest;
use App\Http\Controllers\Controller;
use App\Repositories\ShippingRepository;
use App\Repositories\BranchRepository;
use App\Services\ShippingService;
use App\Services\ShippingLocationService;
use App\Services\UserService;
use App\Utilities\Constant;
use App\Utilities\ShippingUtility;
use App\Models\Branch;
use App\Models\ShippingLocation;

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
     *
     * @param Request $request
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
     *
     * @param Request $request
     * @param BranchRepository $branchRepo
     */
    public function getCreate(Request $request, BranchRepository $branchRepo)
    {
        $this->data['modes']    = $this->shippingRepository->getModes();
        $this->data['branches'] = $branchRepo->getAll();

        return view('shipping.create', $this->data);
    }

    /**
     * Post Create
     *
     * @param CreateShippingRequest
     * @param UserService $userService
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

        dd($error);
        // return redirect()->route('shippings')->withErrors([ 'isRequestSuccess' => $isRequestSuccess, 'error' => $error ]);
    }

    /**
     * Get Create Shipping Location
     *
     * @param Request $request
     * @param String $code
     */
    public function getCreateShippingLocation(Request $request, $code)
    {   
        $this->data['shipping'] = $this->shippingRepository->model->where('code', '=', $code)->first();
        $this->data['shippingLocations'] = ShippingLocation::where('shipping_id', '=', $this->data['shipping']->id)->withTrashed()->orderBy('created_at', 'DESC')->get();

        return view('shipping.location.create', $this->data);
    }

    /**
     * Post Create Shipping Location
     *
     * @param Request $request 
     *
     * @return Mixed
     */
    public function postCreateShippingLocation(CreateShippingLocation $request, ShippingLocationService $shippingLocationService)
    {
        $isRequestSuccess = false;
        $error = '';
        $code = $request->get('shipping_code', '');

        try {
            
            $data = $request->all();
            $shipping = $this->shippingRepository->model->where('code', '=', $code)->first();

            if (!$shipping) { throw new \Exception('No Shipping Found'); }

            $shippingLocation = $shipping->shippingLocation->first();

            # Delete Current Shipping Location
            if($shippingLocation) { $shippingLocationService->deleteShippingLocation($shippingLocation); }

            $shippingLocation = $shippingLocationService->save([
                    'location'  => $data['shipping_location']
                ], $shipping, Auth::user());

            $isRequestSuccess = true;
        } catch (\Exception $e) {
            $error = $e->getMessage();
        }

        return redirect()->route('shippings.location.new', ['code' => $code])->withErrors([ 'isRequestSuccess' => $isRequestSuccess, 'error' => $error ]);
    }

    /**
     * Patch Update
     *
     * @todo Make this an Ajax Request
     * @param Request $request
     * @param Int $id
     */
    public function update(Request $request, $id)
    {
        $error = false;

        try {
            $shipping = $this->shippingRepository->find($id);

            $this->shippingService->save([
                    'status' => Constant::SHIPPING_COMPLETE
                ], $shipping);

        } catch (\Exception $e) {
            $error = true;
        }

        \Session::flash('isUpdateShippingStatusRequestSuccess', $error);

        return redirect()->route('shippings');
    }
}
