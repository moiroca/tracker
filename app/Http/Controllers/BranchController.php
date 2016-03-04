<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBranchRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BranchRepository;
use App\Services\BranchService;

class BranchController extends Controller
{
	/**
	 * @var BranchRepository $branchRepository
	 */
	public $brancRepository;

    /**
     * @var BranchService $branchService
     */
    public $branchService;

    /**
	 * Constructor Function
	 */ 
	public function __construct(BranchRepository $branchRepository, BranchService $branchService)
	{
		$this->branchRepository = $branchRepository;
        $this->branchService    = $branchService;

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
     * Create New Branch
     * 
     * @param Request $request
     */
    public function getCreate(Request $request)
    {
    	return view('branch.create', $this->data);
    }

    /**
     * Post Create Branch
     * 
     * @param CreateBranchRequest $request
     */
    public function postCreate(CreateBranchRequest $request)
    {
        $isRequestSuccess = false;
        $errors = '';

        try {

            $data = $request->all();
            $this->branchService->save($data);
            $isRequestSuccess = true;
            
        } catch (\Exception $e) {
            $error = $e->getMessage();
        }

        return redirect()->route('branch')->withErrors(['isRequestSuccess' => $isRequestSuccess, 'errors' => $errors]);
    }
}
