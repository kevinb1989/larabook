<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('login to my Larabook account.');

// $I->haveAnAccount([
// 		'name' => 'John Doe',
// 		'email' => 'john.doe@gmail.com',
// 		'password' => '1234567'
// 	]);

$I->signIn();

$I->seeInCurrentUrl('/statuses');
$I->see('Welcome back!');
