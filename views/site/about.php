<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('@web/js/dropzone.js' , ['position' => 1]);
$this->registerCssFile('@web/css/dropzone.css' , ['position' => 1]);
?>
<?= Html::csrfMetaTags() ?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>


    <form action="http://localhost:1000/sifeni/web/index.php?r=site/upload"
      class="dropzone"
      type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>"
      id="my-awesome-dropzone"></form>

</div>
