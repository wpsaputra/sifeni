<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sf_sumber".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property SfFenomena[] $sfFenomenas
 */
class SfSumber extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sf_sumber';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 120],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSfFenomenas()
    {
        return $this->hasMany(SfFenomena::className(), ['sumber_id' => 'id']);
    }
}
