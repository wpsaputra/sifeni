<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "sf_fenomena".
 *
 * @property integer $id
 * @property string $tanggal_fenomena
 * @property integer $sumber_id
 * @property integer $kecamatan_id
 * @property string $isi_fenomena
 * @property integer $lapangan_usaha
 * @property integer $pengaruh_id
 * @property string $tanggal_entri
 * @property string $upload_foto_dokumen
 * @property integer $isVerified
 *
 * @property SfSumber $sumber
 * @property SfPengaruh $pengaruh
 * @property SfKecamatan $kecamatan
 * @property SfLapanganUsaha $lapanganUsaha
 */
class Fenomena extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sf_fenomena';
    }

    public function behaviors() {
        
        return [
                
            "tanggalFenomenaBeforeSave" => [
                "class" => TimestampBehavior::className(),
                    "attributes" => [
                        ActiveRecord::EVENT_BEFORE_INSERT => "tanggal_fenomena",
                        ActiveRecord::EVENT_BEFORE_UPDATE => "tanggal_fenomena",
                    ],
                    "value" => function() { return Yii::$app->formatter->asDate($this->tanggal_fenomena, "Y-MM-dd"); }
                        
            ],
                
            "tanggalFenomenaAfterFind" => [
                   "class" => TimestampBehavior::className(),
                    "attributes" => [
                        ActiveRecord::EVENT_AFTER_FIND => "tanggal_fenomena",
                    ],
                    // "value" => function() { return Yii::$app->formatter->asDate($this->tanggal_fenomena, "M/dd/Y"); }
                    "value" => function() { return Yii::$app->formatter->asDate($this->tanggal_fenomena, "MMM dd, Y"); }
                        
            ],

            "tanggalEntriBeforeSave" => [
                "class" => TimestampBehavior::className(),
                    "attributes" => [
                        ActiveRecord::EVENT_BEFORE_INSERT => "tanggal_entri",
                        ActiveRecord::EVENT_BEFORE_UPDATE => "tanggal_entri",
                    ],
                    "value" => function() { return Yii::$app->formatter->asDate($this->tanggal_entri, "Y-MM-dd"); }
                        
                ],
                
            "tanggalEntriAfterFind" => [
                   "class" => TimestampBehavior::className(),
                    "attributes" => [
                        ActiveRecord::EVENT_AFTER_FIND => "tanggal_entri",
                    ],
                    // "value" => function() { return Yii::$app->formatter->asDate($this->tanggal_fenomena, "M/dd/Y"); }
                    "value" => function() { return Yii::$app->formatter->asDate($this->tanggal_entri, "MMM dd, Y"); }
                        
            ]
                
        ];
        
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal_fenomena', 'sumber_id', 'kecamatan_id', 'isi_fenomena', 'lapangan_usaha', 'pengaruh_id', 'upload_foto_dokumen', 'isVerified'], 'required'],
            [['tanggal_fenomena', 'tanggal_entri'], 'safe'],
            [['sumber_id', 'kecamatan_id', 'lapangan_usaha', 'pengaruh_id', 'isVerified'], 'integer'],
            [['isi_fenomena', 'upload_foto_dokumen'], 'string'],
            [['sumber_id'], 'exist', 'skipOnError' => true, 'targetClass' => SfSumber::className(), 'targetAttribute' => ['sumber_id' => 'id']],
            [['pengaruh_id'], 'exist', 'skipOnError' => true, 'targetClass' => SfPengaruh::className(), 'targetAttribute' => ['pengaruh_id' => 'id']],
            [['kecamatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => SfKecamatan::className(), 'targetAttribute' => ['kecamatan_id' => 'id']],
            [['lapangan_usaha'], 'exist', 'skipOnError' => true, 'targetClass' => SfLapanganUsaha::className(), 'targetAttribute' => ['lapangan_usaha' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tanggal_fenomena' => 'Tanggal Fenomena',
            'sumber_id' => 'Sumber',
            'kecamatan_id' => 'Tempat',
            'isi_fenomena' => 'Isi Fenomena',
            'lapangan_usaha' => 'Lapangan Usaha',
            'pengaruh_id' => 'Pengaruh',
            'tanggal_entri' => 'Tanggal Entri',
            'upload_foto_dokumen' => 'Upload Foto / Dokumen',
            'isVerified' => 'Verifikasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSumber()
    {
        return $this->hasOne(SfSumber::className(), ['id' => 'sumber_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengaruh()
    {
        return $this->hasOne(SfPengaruh::className(), ['id' => 'pengaruh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatan()
    {
        return $this->hasOne(SfKecamatan::className(), ['id' => 'kecamatan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLapanganUsaha()
    {
        return $this->hasOne(SfLapanganUsaha::className(), ['id' => 'lapangan_usaha']);
    }
}
