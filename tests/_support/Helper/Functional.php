<?php
namespace Helper;

use Laracasts\TestDummy\Factory as TestDummy;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Functional extends \Codeception\Module
{
	public function signIn(){

		$email = 'john.doe@gmail.com';
		$password = '1234567';
		$I = $this->getModule('Laravel5');

		$I->amOnPage('/login');
		$I->fillField('email', $email);
		$I->fillField('password', $password);
		$I->click('Sign In');
	}


	public function haveAnAccount($overrides = []){
		return $this->have('App\User', $overrides);
	}

	public function postAStatus($body){
		$I = $this->getModule('Laravel5');
		$I->fillField('status', $body);
		$I->click('Post Status');
	}

	public function have($model, $overrides = []){
		return TestDummy::create($model, $overrides);
	}

}
