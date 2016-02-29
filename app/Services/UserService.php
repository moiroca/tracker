<?php namespace App\Services;

use App\Models\User;
use App\Models\Role;
use App\Models\Branch;

/**
 * Class User Service
 *
 * @author John Temoty Roca <rocajohntemoty@gmail.com>
 * @since 2016
 */
class UserService {

	/**
	 * Save User
	 *
	 * @param Array $data
	 * @param User $user
	 *
	 * @return User $user
	 */
	public function save($data, User $user = null)
	{
		# Check if User is for update
		if (!$user) {
			$user = new User();
		}

		$user->fill($data);
		$user->save();

		return $user;
	}

	/**
	 * Save User Role
	 *
	 * @param User $user
	 * @param Int $role
	 */
	public function saveRole(User $user, $role)
	{
		$user->roles()->save(Role::find($role));
		$user->save();
	}

	/**
	 * Save User Current Branch
	 *
	 * @param User $user
	 * @param Branch $branch
	 *
	 */
	public function saveBranch(User $user, Branch $branch)
	{
		$user->employerBranch()->save($branch, [ 'created_at' => date_create()->format('Y-m-d H:i:s') ]);
		$user->save();
	}
}