<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\ShippingRepository;
use App\Models\ShippingLocation;

class HomeController extends Controller
{
	public function __construct()
	{
		$this->data = [
            'page_header'       => 'Home',
            'page_description'  => ''
        ];
	}

    /**
     * Show the application Index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ShippingRepository $shippingRepository)
    {
        $code = $request->get('code', '');

        if (!empty($code)) {
            $this->data['shipping'] = $shippingRepository->getShippingByCode($code)->first();
            
            if ($this->data['shipping']) {
               $this->data['shippingLocations'] = ShippingLocation::where('shipping_id', '=', $this->data['shipping']->id)->withTrashed()->orderBy('created_at', 'DESC')->get();
            } else {
               $this->data['shippingLocations'] = [];
            }
        } 
        
        return view('welcome', $this->data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('home', $this->data);
    }
}
