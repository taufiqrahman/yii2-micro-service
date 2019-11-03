<?php

/**
 * User: Taufiq Rahman (Rahman.taufiq@gmail.com)
 * Date: 11/08/19
 * Time: 11.35
 */


namespace micro\modules\v1\controllers;

use Yii;
use micro\components\AuthController;

class AuthTestController extends AuthController
{
    public function actionIndex()
    {
        return $this->responseSuccess('test controller with auth');
    }
}
