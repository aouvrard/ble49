<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('ProduitsTableSeeder');
		$this->call('EtatsTableSeeder');
		$this->call('CommandesTableSeeder');
		$this->call('UsersTableSeeder');
	}

}