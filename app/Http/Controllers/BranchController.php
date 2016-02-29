<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BranchRepository;

class BranchController extends Controller
{
	/**
	 * @var BranchRepository $branchRepository
	 */
	public $brancRepository;

    /**
	 * Constructor Function
	 */ 
	public function __construct(BranchRepository $branchRepository)
	{
		$this->branchRepository = $branchRepository;

		$this->data = [
			'page_header'	 	=> 'Branches',
			'page_description'  => ''
		];
	}

    /** 
     * Get Index
     */
    public function index(Request $request)
    {
    	$this->data['branches'] = $this->branchRepository->getAll();

    	return view('branch.index', $this->data);
    }

    /**
     * Create New
     */
    public function create(Request $request)
    {
    	return 1;
    }
}
