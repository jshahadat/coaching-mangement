<?php

namespace api\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return [
            'message' => 'API is working!',
            'status' => 'success',
        ];
    }
}