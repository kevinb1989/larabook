<?php

$factory('App\User',
	[
		'name' => $faker->name,
		'email' => $faker->email,
		'password' => $faker->password
]);

$factory('App\Status',
	[
		'body' => $faker->paragraph,
		'user_id' => 1
]);