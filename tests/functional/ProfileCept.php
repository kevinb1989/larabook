<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('view my profile');

$I->signIn();
$I->postAStatus('My new status.');

$I->click('Your profile');
$I->seeCurrentUrlEquals('/hoanglongbui89@yahoo.com.vn');
