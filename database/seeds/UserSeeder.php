<?php

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{	
	/**
	 * @var User Seeder
	 */
	private $users = [
		[
			'first_name' 	=> 'Isaac', 
			'last_name' 	=> 'Tarpley', 
			'contact'   	=> '432-358-5211', 
			'address' 		=> 'Alamito, TX 79843', 
			'username' 		=> 'Ounins'
		],
		[
			'first_name' 	=> 'Jeffrey', 
			'last_name' 	=> 'Chappell', 
			'contact' 		=> '432-358-5211', 
			'address' 		=> 'Anahola, HI 96703', 
			'username' 		=> 'Alsorombicks'
		],
		[
			'first_name'	=> 'Herman', 
			'last_name' 	=> 'Quiroz', 
			'contact' 		=> '432-358-5211', 
			'address' 		=> 'Pahrump, NV 89401', 
			'username' 		=> 'Liled1980' 
		],
		[
			'first_name'	=> 'Herman', 
			'last_name' 	=> 'Quiroz', 
			'contact' 		=> '432-358-5211', 
			'address' 		=> 'Pahrump, NV 89401', 
			'username' 		=> 'shipper' 
		],
		[
			'first_name'	=> 'Herman', 
			'last_name' 	=> 'Quiroz', 
			'contact' 		=> '432-358-5211', 
			'address' 		=> 'Pahrump, NV 89401', 
			'username' 		=> 'consignee' 
		]
	];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->truncate();

     	foreach ($this->users as $key => $user) {
     		 	User::create(array_merge($user, ['password' => bcrypt($user['username']) ]));
     	}	 
    }
}
