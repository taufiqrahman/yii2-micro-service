<?php
/**
 * User: Taufiq Rahman (Rahman.taufiq@gmail.com)
 * Date: 11/08/19
 * Time: 09.35
 */

namespace micro\components;

use Yii;
use yii\filters\auth\HttpBearerAuth;
use yii\web\Response;

class Controller extends \yii\rest\Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        return $behaviors;
    }

    /**
     * response Validate error response
     */
    public function responseNotValidate($errors, $message = false)
    {
        Yii::$app->response->statusCode = 422;
        return [
            'statusCode' => 422,
            'name' => 'ValidateErrorException',
            'message' => $message ? $message : 'Error validation',
            'errors' => $errors
        ];
    }

    /**
     * response Created response
     */
    public function responseCreated($data, $message = false)
    {
        Yii::$app->response->statusCode = 201;
        return [
            'statusCode' => 201,
            'message' => $message ? $message : 'Created successfully',
            'data' => $data
        ];
    }

    /**
     * response Updated response
     */
    public function responseUpdated($data, $message = false)
    {
        Yii::$app->response->statusCode = 202;
        return [
            'statusCode' => 202,
            'message' => $message ? $message : 'Updated successfully',
            'data' => $data
        ];
    }

    /**
     * response Deleted response
     */
    public function responseDeleted($data, $message = false)
    {
        Yii::$app->response->statusCode = 202;
        return [
            'statusCode' => 202,
            'message' => $message ? $message : 'Deleted successfully',
            'data' => $data
        ];
    }

    /**
     * response Item response
     */
    public function responseItem($data, $message = false)
    {
        Yii::$app->response->statusCode = 200;
        return [
            'statusCode' => 200,
            'message' => $message ? $message : 'Data retrieval successfully',
            'data' => $data
        ];
    }

    /**
     * response Collection response
     */
    public function responseList($data, $total = 0, $message = false)
    {
        Yii::$app->response->statusCode = 200;
        return [
            'statusCode' => 200,
            'message' => $message ? $message : 'Data retrieval successfully',
            'data' => $data,
            'total' => 0
        ];
    }

    /**
     * response Success response
     */
    public function responseSuccess($message = false)
    {
        Yii::$app->response->statusCode = 200;
        return [
            'statusCode' => 200,
            'message' => $message ? $message : 'Success',
        ];
    }
}
