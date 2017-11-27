<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fenomena */

$this->title = 'Update Fenomena: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Fenomena', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fenomena-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form_update', [
        'model' => $model,
    ]) ?>

</div>
