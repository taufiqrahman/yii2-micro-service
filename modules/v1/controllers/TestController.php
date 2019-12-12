<?php

/**
 * User: Taufiq Rahman (Rahman.taufiq@gmail.com)
 * Date: 11/08/19
 * Time: 09.35
 */


namespace micro\modules\v1\controllers;

use micro\components\Controller;

class TestController extends Controller
{
    /*
    * http://localdev.taufiq.test/yii2-microservice/web/index.php?r=v1/test
    */
    public function actionIndex()
    {
        // return ['status'=>'success','message'=>'!','version'=>'v1'];
        return $this->responseSuccess('Hello World! - Module v1 - Test Controller');
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
        $data = ['memoryusage' => $memory,
        'diskfree' => $diskfree,
        'Cpu' => $usage
            ];
        return $this->responseItem($data, 'status Active');
    }
}
