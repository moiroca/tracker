<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ShippingRepository;

class ShippingController extends Controller
{

    /** 
     * @var ShippingRepository $shippingRepository
     */
    public $shippingRepository;

    /** 
     * Constructor Function
     */
	public function __construct(ShippingRepository $shippingRepository)
	{		
        $this->data = [
            'page_header'       => 'Shippings',
            'page_description'  => ''
        ];

        $this->shippingRepository = $shippingRepository;
	}

    /**
     * Index Page for Shipping
     */
    public function index(Request $request)
    {
        $this->data['shippings'] = $this->shippingRepository->getAll();

    	return view('shipping.index', $this->data );
    }

    /**
     * Create New Shipping
     */
    public function create(Request $request)
    {
        return 'Create New';
    }
}
