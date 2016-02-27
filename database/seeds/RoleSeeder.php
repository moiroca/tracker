<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
	/**
	 * @var roles
	 */
	private $roles = ['Admin', 'Manager', 'Employee'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        foreach ($this->roles as $key => $role) {
        	Role::create([ 'name' => $role ]);	
        }
    }
}
