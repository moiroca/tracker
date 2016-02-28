<?php namespace App\Repositories;

/**
 * Base Repository Class
 *
 * @author John Temoty Roca <rocajohntemoty@gmail.com>
 * @since 2016
 */
class BaseRepository
{
	/**
	 * Get Single Row
	 *
     * @param Int $id
     *
     * @return Model
	 */
	public function find($id)
	{
		return $this->model->find($id);
	}

	/**
	 * User Repo
	 *
	 * @return Collection
	 */
	public function getAll()
	{
		return $this->model;
	}
}