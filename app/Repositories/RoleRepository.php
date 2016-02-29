<?php namespace App\Repositories;

use App\Utilities\Constant;
use App\Repositories\BaseRepository;
use App\Models\Role;

/**
 * Role Repository Class
 *
 * @author John Temoty Roca <rocajohntemoty@gmail.com>
 * @since 2016
 */
class RoleRepository extends BaseRepository
{
	/**
	 * @var Role $model
	 */
	public $model;

	/**
	 * Constructor Function
	 */
	public function __construct(Role $role)
	{
		$this->model = $role;
	}

	/**
	 * Get None Admin Roles
	 *
	 * @return Collection
	 */
	public function getNoneAdminRole()
	{
		return $this->model->where('id', '!=', Constant::ADMIN)->get();
	}
}