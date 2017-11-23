<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Fenomena */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fenomenas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fenomena-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tanggal_fenomena',
            'sumber_id',
            'kecamatan_id',
            'isi_fenomena:ntext',
            'lapangan_usaha',
            'pengaruh_id',
            'tanggal_entri',
            'upload_foto_dokumen:ntext',
            'isVerified',
        ],
    ]) ?>

</div>
