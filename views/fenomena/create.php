<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Fenomena */

$this->title = 'Create Fenomena';
$this->params['breadcrumbs'][] = ['label' => 'Fenomenas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fenomena-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>