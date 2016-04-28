<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook user.');
$I->wantTo('follow other Larabook users.');

//setup
$I->haveAnAccount('App\User', ['email' => 'email1@gmail.com', 'name' => 'Other User']);
$I->signIn();

//actions
$I->click('Browse Users');
$I->click('Other User');

//expectations
$I->seeCurrentUrlEquals('/email1@gmail.com');
$I->click('Follow Other User');
$I->seeCurrentUrlEquals('/email1@gmail.com');

$I->see('Unfollow Other User');
$I->seeCurrentUrlEquals('/email1@gmail.com');
$I->click('Follow Other User');

