<?php 
$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('Sign up for a new larabook account');

$I->amOnPage('/');
$I->click('Sign Up');
$I->seeCurrentUrlEquals('/register');

$I->fillField('Name:', 'Kevin Bui');
$I->fillField('Email:', 'hoanglongbui89@yahoo.com.vn');
$I->fillField('Password:', 'password');
$I->fillField('Password Confirmation:', 'password');
$I->click('Sign Up');

$I->seeCurrentUrlEquals('/register');
//$I->see('Welcome to Larabook!');
