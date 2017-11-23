<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sf_lapangan_usaha".
 *
 * @property integer $id
 * @property string $kategori
 * @property string $keterangan
 *
 * @property SfFenomena[] $sfFenomenas
 */
class SfLapanganUsaha extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sf_lapangan_usaha';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['kategori'], 'string', 'max' => 7],
            [['keterangan'], 'string', 'max' => 63],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kategori' => 'Kategori',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSfFenomenas()
    {
        return $this->hasMany(SfFenomena::className(), ['lapangan_usaha' => 'id']);
    }
}
