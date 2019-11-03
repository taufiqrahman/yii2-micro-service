<?php
// use Helper\Api;

class LoginCest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->wantToTest('login is fail');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPOST('/index.php?r=user/login', ['username' => 'admin', 'password' => '123']);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContains('"success": "false"');
    }
    public function loginUser(\ApiTester $I)
    {
        global $token;
        $I->wantToTest('login is success');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPOST('/index.php?r=user/login', ['username' => 'admin', 'password' => '123123123']);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContains('"success": "true"');
        $token = $I->grabDataFromResponseByJsonPath('$.data.token')[0];
    }
}
