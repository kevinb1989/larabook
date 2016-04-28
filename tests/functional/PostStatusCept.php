<?php 
$I = new FunctionalTester($scenario);
$I->am('A Larabook member');
$I->wantTo('post statuses to my profile');

$I->signIn();
$I->amOnPage('statuses');
$I->postAStatus();

$I->seeCurrentUrlEquals('/statuses');
$I->see('My first post!');
