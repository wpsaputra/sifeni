<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FenomenaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fenomenas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fenomena-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Fenomena', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tanggal_fenomena',
            'sumber_id',
            'kecamatan_id',
            'isi_fenomena:ntext',
            // 'lapangan_usaha',
            // 'pengaruh_id',
            // 'tanggal_entri',
            // 'upload_foto_dokumen:ntext',
            // 'isVerified',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
