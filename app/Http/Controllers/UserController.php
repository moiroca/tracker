<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\BranchRepository;
use App\Repositories\RoleRepository;
use App\Services\UserService;
use App\Utilities\UserUtility;
use App\Models\User;
use App\Models\Branch;

class UserController extends Controller
{
	/**
	 * @var UserRepository $userRepo
	 */
	public $userRepo;

	/**
	 * @var UserUtility $userUtility
	 */
	public $userUtility;

	/**
	 * @var UserService $userService
	 */
	public $userService;

	/**
	 * Constructor Function
	 */ 
	public function __construct( UserRepository $userRepo, UserService $userService, UserUtility $userUtility )
	{
		$this->data = [
			'page_header'	 	=> 'Users',
			'page_description'  => ''
		];

		$this->userRepo = $userRepo;
		$this->userService = $userService;
		$this->userUtility = $userUtility;
	}

	/**
	 * Index Page
	 */ 
    public function index(Request $request)
    {
    	$this->data['users'] = $this->userRepo->getAllSystemUser();
    	
    	return view('users.index', $this->data );
    }

    /** 
     * Create New User
     * 
     * @param Request $request
     * @param BranchRepository $branchRepo
     * @param RoleRepository $roleRepo
     *
     * @return View
     */
    public function getCreate(Request $request, BranchRepository $branchRepo, RoleRepository $roleRepo)
    {
    	$this->data['branches'] = $branchRepo->getAll();
    	$this->data['roles']	= $roleRepo->getNoneAdminRole();

    	return view('users.create', $this->data);
    }

    /**
     * Post Create
     *
     * @param CreateUserRequest $createUserRequest
     *
     * @return Redirect
     */
    public function postCreate(CreateUserRequest $createUserRequest)
    {
    	$isRequestSuccess = false;
    	$errors 		  = [];
    	try {
    		$data = $createUserRequest->all();

	    	# Encrypt Password
	    	$this->userUtility->setPassword($data);

	    	# Save User
	    	$user = $this->userService->save($data);

	    	# Save Role
	    	$this->userService->saveRole($user, $data['role']);

	    	# Save Branch Of User
	    	$branch = Branch::find($data['branch']);
	    	$this->userService->saveBranch($user, $branch);

	    	$isRequestSuccess = true;
    	} catch (\Exception $e) {
    		$errors[] = $e->getMessage();
    	}
    	
		return redirect()->route('users')->withErrors(['isRequestSuccess' => $isRequestSuccess, 'errors' => $errors]);
    }
}
