<?php namespace App\Services;

use App\Models\Branch;

/**
 * Branch Service 
 *
 * @author John Temoty Roca <rocajohntemoty@gmail.com>
 * @since 2016
 */
class BranchService {

	/**
	 * Save Branch
	 *
	 * @param Array $data
	 * @param Branch $branch
	 *
	 * @return Branch $branch
	 */
	public function save($data, Branch $branch = null)
	{
		# Create or New If $branch is not null
		if (!$branch) {
			$branch = new Branch();
		}

		$branch->fill($data);
		$branch->save();

		return $branch;
	}
}