<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'SiFENI';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h2 style="margin-bottom: 0px" class="text-center"><?= Html::encode($this->title) ?></h2>
    <hr/>

    <!-- <p>Please fill out the following fields to login:</p> -->

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-md-12\">{input}</div>\n<div class=\"col-md-12\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            // 'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'template' => "<div class=\"col-md-12\">{input} {label}</div>\n<div class=\"col-md-12\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <!-- <div class="col-lg-offset-1 col-lg-11"> -->
            <div class="col-md-12">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary pull-right', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
