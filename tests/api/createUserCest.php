<?php
use ApiTester;

class createUserCest
{
    public function createUser(ApiTester $I)
    {
        $faker = ApiTester::getFaker();
        $I->wantToTest('Create New User');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPOST('/index.php?r=user/signup', ['username' => $faker->userName,'email'=>$faker->email, 'password' =>$faker->password]);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContains('"status": "success"');
    }
}
