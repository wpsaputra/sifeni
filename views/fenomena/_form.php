<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\SfSumber;
use yii\helpers\ArrayHelper;
use app\models\SfKecamatan;
use app\models\SfLapanganUsaha;
use app\models\SfPengaruh;

/* @var $this yii\web\View */
/* @var $model app\models\Fenomena */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fenomena-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'tanggal_fenomena')->textInput() ?> -->
    <?= $form->field($model, 'tanggal_fenomena')->widget(\yii\jui\DatePicker::classname(), [
        //'language' => 'ru',
        // 'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control']
    ]) ?>


    <!-- <?= $form->field($model, 'sumber_id')->textInput() ?> -->
    <?= $form->field($model, 'sumber_id')->dropDownList(
        ArrayHelper::map(SfSumber::find()->all(),'id','nama'),
        ['prompt'=>'Pilih Sumber Fenomena']
    )?> 


    <!-- <?= $form->field($model, 'kecamatan_id')->textInput() ?> -->
    <?= $form->field($model, 'kecamatan_id')->dropDownList(
        ArrayHelper::map(SfKecamatan::find()->all(),'id','nama'),
        ['prompt'=>'Pilih Kecamatan']
    )?> 


    <?= $form->field($model, 'isi_fenomena')->textarea(['rows' => 6]) ?>

    <!-- <?= $form->field($model, 'lapangan_usaha')->textInput() ?> -->
    <?= $form->field($model, 'lapangan_usaha')->dropDownList(
        ArrayHelper::map(SfLapanganUsaha::find()->all(),'id','keterangan'),
        ['prompt'=>'Pilih Lapangan Usaha']
    )?>


    <!-- <?= $form->field($model, 'pengaruh_id')->textInput() ?> -->
    <?= $form->field($model, 'pengaruh_id')->dropDownList(
        ArrayHelper::map(SfPengaruh::find()->all(),'id','nama'),
        ['prompt'=>'Pilih Pengaruh']
    )?>



    <!-- <?= $form->field($model, 'tanggal_entri')->textInput() ?> -->
    <?= $form->field($model, 'tanggal_entri')->widget(\yii\jui\DatePicker::classname(), [
        //'language' => 'ru',
        // 'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control']
    ]) ?>


    <?= $form->field($model, 'upload_foto_dokumen')->textarea(['rows' => 6]) ?>

    <!-- <?= $form->field($model, 'isVerified')->textInput() ?> -->
    <?= $form->field($model, 'isVerified')->dropDownList(
        [0=>'Belum Diverifikasi', 1=>'Sudah Diverifikasi'],
        ['prompt'=>'Pilih Status Fenomena']
    )?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
