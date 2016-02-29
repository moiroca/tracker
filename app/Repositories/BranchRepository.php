<?php namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Branch;

/**
 * Branch Repository Class
 *
 * @author John Temoty Roca <rocajohntemoty@gmail.com>
 * @since 2016
 */
class BranchRepository extends BaseRepository
{
	/**
	 * @var Branch $model
	 */
	public $model;

	/**
	 * Constructor Function
	 */
	public function __construct(Branch $branch)
	{
		$this->model = $branch;
	}
}