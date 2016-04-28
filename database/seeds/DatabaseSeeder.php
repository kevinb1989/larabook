<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	protected $tables = ['users', 'statuses'];

	protected $seeders = ['UsersTableSeeder', 'StatusesTableSeeder'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
        //$this->call(UsersDatabaseSeeder::class);
        $this->call(StatusesDatabaseSeeder::class);
    }

    private function cleanDatabase(){

    	foreach ($this->tables as $table) {
    		DB::table($table)->truncate();
    	}

    }
}
