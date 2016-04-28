<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook user');
$I->wantTo('review all users registered for Larabook');

$I->haveAnAccount(['email' => 'k.bui@yahoo.com.vn']);
$I->haveAnAccount(['email' => 'kevinb1989@gmail.com']);

$I->amOnPage('/users');
$I->see('hoanglongbui89@yahoo.com.vn');
$I->see('kevinb1989@gmail.com');
