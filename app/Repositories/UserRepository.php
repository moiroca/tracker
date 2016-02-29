<?php namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\User;

/**
 * User Repository Class
 *
 * @author John Temoty Roca <rocajohntemoty@gmail.com>
 * @since 2016
 */
class UserRepository extends BaseRepository
{
	/**
	 * @var User $model
	 */
	public $model;

	/**
	 * Constructor Function
	 */
	public function __construct(User $user)
	{
		$this->model = $user;
	}

	/**
	 * Get All User By Type
	 *
	 * @param String $type
	 *
	 * @return ModelCollection
	 */
	public function getAllUserType($type)
	{
		return $this->model->roles->where('name', $type)->get();
	}

	/** 
	 * Get All System Users
	 */
	public function getAllSystemUser()
	{
		return $this->model->with('roles')->join('user_roles', 'user_roles.user_id', '=', 'users.id')->join('roles', 'user_roles.role_id', '=', 'roles.id')->get();
	}
}