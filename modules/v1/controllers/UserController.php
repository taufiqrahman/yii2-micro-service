<?php

/**
 * User: Taufiq Rahman (Rahman.taufiq@gmail.com)
 * Date: 11/08/19
 * Time: 09.35
 */

namespace micro\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use micro\modules\v1\models\LoginForm;
use micro\modules\v1\models\SignupForm;

class UserController extends Controller
{
    protected function verbs()
    {
        return [
            'login' => ['HEAD','POST'],
            'signup' => ['HEAD','POST']
        ];
    }

    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->login()) {
            return  [
            'success' => 'true',
            'message' => 'you logged',
            'data' => [
                'id' => $model->user->id,
                'username' => $model->user->username,
                'token' => $model->user->access_token,
            ]
            ];
        } else {
            return [
            'success' => 'false',
            'message' => 'invalid user name or password',
            'data' => '',
            ];
        }
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        $model->load(Yii::$app->request->post(), '');
        if (!$model->validate()) {
            $response = [
                'status' => 'error',
                'message' => $model->errors
            ];
        } else {
            $user = $model->signup();
            $response = [
                'status' => 'success',
                'message' => 'Registration Success, Welcome ' . $user->username
            ];
        }
        return $response;
    }
}
