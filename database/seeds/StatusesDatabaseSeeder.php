<?php

use Illuminate\Database\Seeder;
use App\User;

class StatusesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//$users = User::lists('id'); 

        factory('App\Status', 100)->create();
    }
}
