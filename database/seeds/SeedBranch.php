<?php

use Illuminate\Database\Seeder;
use App\Models\Branch;

class SeedBranch extends Seeder
{
	/**
	 * @var Array $branches
	 */
	private $branches = [
		['address' => 'Tacloban City'],
		['address' => 'Ormoc City'],
		['address' => 'Cebu City']
	];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->truncate();

        foreach ($this->branches as $key => $branch) {
        	$branch = Branch::create($branch);
            $branch->save();
        }
    }
}
