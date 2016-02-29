<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', $this->data);
    }
}
