<?php

namespace micro\controllers;

use Yii;
use yii\rest\Controller;
use yii\web\Response;
use yii\filters\auth\HttpBearerAuth;

class SiteController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        // $behaviors['authenticator'] = [
        //     'class' => HttpBearerAuth::className(),
        // ];
        return $behaviors;
    }
    public function actionIndex()
    {
        return ['status' => 'success','message' => 'Hello World!'];
    }
}
