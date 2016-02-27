<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Utilities\Constant;

class SeedUserRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('user_roles')->truncate();

     	$users = User::all();

     	foreach ($users as $key => $user) {
     		switch ($user->id) {

     			case Constant::ADMIN:
     				$user->roles()->save(Role::find(Constant::ADMIN));
     				break;
     			
     			case Constant::MANAGER:
     				$user->roles()->save(Role::find(Constant::MANAGER));
     				break;

     			case Constant::EMPLOYEE:
     				$user->roles()->save(Role::find(Constant::EMPLOYEE));
     				break;

     			default:
     				break;
     		}
     	}
    }
}
