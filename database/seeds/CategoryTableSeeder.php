<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$london = new Category();
		$london->name = 'London';
		$london->slug = 'london';
		$london->save();
	}
}
