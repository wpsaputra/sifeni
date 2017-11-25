<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\SfPengaruh;
use app\models\SfLapanganUsaha;
use app\models\SfKecamatan;
use app\models\SfSumber;

/* @var $this yii\web\View */
/* @var $model app\models\Fenomena */

$this->title = 'Fenomena '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Fenomena', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fenomena-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?php
        if(Yii::$app->user->identity->level==1){
            echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary', 'style'=> 'margin-right:5px']);
            echo(Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]));  
        }
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
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
            'upload_foto_dokumen:ntext',
            // 'isVerified',
            [
                'attribute' => 'isVerified',
                'value' => function($model){
                    if($model->isVerified == '0'){
                        return 'Belum Diverifikasi';
                    }else{
                        return 'Sudah Diverifikasi';
                    }
                }
            ]

            
        ],

        // [
        //     'attribute' => 'isVerified',
        //     'value' => function($model){
        //         if($model->level == '0'){
        //             return 'Belum Diverifikasi';
        //         }else{
        //             return 'Sudah Diverifikasi';
        //         }
        //     }
        // ],



    ]) ?>

</div>
