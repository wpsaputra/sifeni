<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sf_kecamatan".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property SfFenomena[] $sfFenomenas
 */
class SfKecamatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sf_kecamatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['nama'], 'string', 'max' => 72],
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
        return $this->hasMany(SfFenomena::className(), ['kecamatan_id' => 'id']);
    }
}
