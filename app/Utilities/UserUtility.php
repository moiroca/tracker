<?php namespace App\Utilities;

/**
 * User Utility
 *
 * @author John Temoty Roca <rocajohntemoty@gmail.com>
 * @since 2016
 */
Class UserUtility
{	
	/**
	 * Set Password
	 *
	 * @param Array $data
	 */
	public function setPassword(&$data)
	{
		if (isset($data['password'])) {
			$data['password'] = bcrypt($data['password']);
		}
	}
}