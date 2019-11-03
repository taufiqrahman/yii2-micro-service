<?php

class siteCest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
        global $token;
        $I->amBearerAuthenticated($token);
        $I->sendGET('/index.php');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContains('"status": "success"');
    }
}
