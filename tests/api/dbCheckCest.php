<?php

class dbCheckCest
{

    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->seeInDatabase('user', ['username' => 'admin', 'email' => '123@gmail.com']);
    }
}
