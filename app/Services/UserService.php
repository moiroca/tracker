<?php namespace App\Services;

use App\Models\User;

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
}