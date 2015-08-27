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
		//order of delete important due to oreign key
		DB::table('posts')->delete();
		DB::table('users')->delete();
		DB::table('comments')->delete();

		$this->call('UsersTableSeeder');
		$this->call('PostsTableSeeder');
		$this->call('CommentsTableSeeder');
	}

}
