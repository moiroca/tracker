<?php

use Illuminate\Database\Seeder;
use App\Models\Branch;
use App\Models\User;

class SeedBranchEmployee extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branch_employees')->truncate();

        $users = User::all();
        $firstBranch = Branch::first();

        foreach ($users as $key => $user) {
        	$user->employerBranch()->save($firstBranch, [ 'created_at' => date_create()->format('Y-m-d H:i:s') ]);
        }
    }
}
