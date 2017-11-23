<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FenomenaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fenomena-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tanggal_fenomena') ?>

    <?= $form->field($model, 'sumber_id') ?>

    <?= $form->field($model, 'kecamatan_id') ?>

    <?= $form->field($model, 'isi_fenomena') ?>

    <?php // echo $form->field($model, 'lapangan_usaha') ?>

    <?php // echo $form->field($model, 'pengaruh_id') ?>

    <?php // echo $form->field($model, 'tanggal_entri') ?>

    <?php // echo $form->field($model, 'upload_foto_dokumen') ?>

    <?php // echo $form->field($model, 'isVerified') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
