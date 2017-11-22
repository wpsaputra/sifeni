<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sf_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $level
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sf_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'level'], 'required'],
            [['level'], 'integer'],
            [['username', 'password'], 'string', 'max' => 120],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'level' => 'Level',
        ];
    }

    
}
