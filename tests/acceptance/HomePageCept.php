<?php

$I = new WebGuy($scenario);
$I->wantTo('sign in and see metrics');
$I->lookForwardTo('viewing page views per month');
$I->amOnPage('/');
$I->seeCurrentUrlEquals('/sign-in');
$I->fillField('email','mohan@example.com');
$I->fillField('password','password');
$I->click('Sign In');
$I->seeCurrentUrlEquals('/');
$I->see('Users:', 'h1');
$I->see('Mohan Krishnan', 'ul li');
