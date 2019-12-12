<?php

/**
 * Created by PhpStorm.
 * User: Taufiq Rahman
 * Date: 22/02/18
 * Time: 14.07
 */

namespace micro\controllers;

use yii\rest\Controller;
use yii\web\Response;

class TestController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        return $behaviors;
    }

    public function actionIndex()
    {
        return ['status' => 'success','message' => 'Hello World! - Test Controller'];
    }

    public function actionCoba($key, $lock)
    {
        return ['message' => 'Hello!','data' => $key,'data2' => $lock];
    }

    public function humanSize($Bytes)
    {
        $Type = array("", "kilo", "mega", "giga", "tera", "peta", "exa", "zetta", "yotta");
        $Index = 0;
        while ($Bytes >= 1024) {
            $Bytes /= 1024;
            $Index++;
        }
        return("" . $Bytes . " " . $Type[$Index] . "bytes");
    }

    public function actionHealth()
    {
        $memory = $this->humanSize(memory_get_usage());
        $diskfree = $this->humanSize(disk_free_space("/"));
        $usage = sys_getloadavg();
        $response = [
            'status' => 'success',
            'message' => 'status Active',
            'data' => ['memoryusage' => $memory,
                'diskfree' => $diskfree,
                'Cpu' => $usage
            ]
        ];
        return $response;
    }
}
