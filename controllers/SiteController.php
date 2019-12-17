<?php

namespace micro\controllers;

use Yii;
//use yii\rest\Controller;
use micro\components\Controller;
use yii\web\Response;
use yii\filters\auth\HttpBearerAuth;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return ['status' => 'success','message' => 'Hello Worlds! - Site Controller'];
    }

    public function actionError()
    {
        // return ['status' => 'fail','name'=>'404','message' => 'Your request not faund']
        return $this->responseNotFound('Unknow Request');
    }
}
