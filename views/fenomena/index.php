<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\SfSumber;
use app\models\SfKecamatan;
use app\models\SfLapanganUsaha;
use app\models\SfPengaruh;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FenomenaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Fenomena';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fenomena-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Fenomena', ['create'], ['class' => 'btn btn-success pull-right']) ?>
    </p><br/>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'tanggal_fenomena',
            // 'sumber_id',
            [
                'attribute' => 'sumber_id',
                'value' => function($model){
                    return SfSumber::findOne($model->sumber_id)->nama;
                    
                }
            ],

            // 'kecamatan_id',
            [
                'attribute' => 'kecamatan_id',
                'value' => function($model){
                    return SfKecamatan::findOne($model->kecamatan_id)->nama;
                    
                }
            ],


            'isi_fenomena:ntext',
            
            // 'lapangan_usaha',
            [
                'attribute' => 'lapangan_usaha',
                'value' => function($model){
                    return SfLapanganUsaha::findOne($model->lapangan_usaha)->keterangan;
                    
                }
            ],

            // 'pengaruh_id',
            [
                'attribute' => 'pengaruh_id',
                'value' => function($model){
                    return SfPengaruh::findOne($model->pengaruh_id)->nama;
                }
            ],

            'tanggal_entri',
            [
                'attribute' => 'isVerified',
                'value' => function($model){
                    return ($model->isVerified==1)?  'sudah verifikasi' : 'belum verifikasi';
                }
            ],


            // 'upload_foto_dokumen:ntext',
            // 'isVerified',

            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons'=>[
                    'update' => Yii::$app->user->identity->level==1,
                    'delete' => Yii::$app->user->identity->level==1,
                ]
            ],
        ],
        


    ]); ?>
</div>
