<?php

namespace common\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class Student extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%student}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function rules()
    {
        return [
            [['tenant_id', 'name'], 'required'],
            [['tenant_id', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['phone', 'guardian_phone'], 'string', 'max' => 20],
        ];
    }
}