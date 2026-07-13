<?php

namespace api\controllers;

use yii\web\Controller;
use yii\filters\Cors;
use common\models\Student;

class SiteController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['corsFilter'] = [
            'class' => Cors::class,
            'cors' => [
                'Origin' => ['http://localhost:3000'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Credentials' => true,
            ],
        ];
        return $behaviors;
    }

    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'message' => 'API is working!',
            'status' => 'success',
        ];
    }

    public function actionTestStudent()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        // একটা টেস্ট student বানাই
        $student = new Student();
        $student->tenant_id = 1;
        $student->name = 'Rahim Uddin';
        $student->phone = '01700000000';
        $student->guardian_phone = '01800000000';
        $student->save();

        // সব student ফেরত দিই
        $allStudents = Student::find()->all();

        return [
            'created_id' => $student->id,
            'all_students' => $allStudents,
        ];
    }
}