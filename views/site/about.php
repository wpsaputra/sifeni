<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('@web/js/dropzone.js' , ['position' => 1]);
$this->registerCssFile('@web/css/dropzone.css' , ['position' => 1]);

// $this->registerJs(
//     '$("div#myId").dropzone({ url: "http://localhost/sifeni/web/index.php?r=site/upload", paramName: "UploadForm[imageFile]" });',
//     \yii\web\View::POS_READY,
//     'my-button-handler'
// );

// $this->registerJs(
//     '
//     Dropzone.options.myAwesomeDropzone = {
//         paramName: "UploadForm[imageFile]", // The name that will be used to transfer the file
//         maxFilesize: 1, // MB
        
//       };
    
//     ',
//     \yii\web\View::POS_HEAD,
//     'my-button-handler'
// );
?>
<script>
    Dropzone.options.myAwesomeDropzone = {
        paramName: "UploadForm[imageFile]", // The name that will be used to transfer the file
        maxFilesize: 1, // MB
        addRemoveLinks: true,
        removedfile: function(file) {
            var name = file.name;        
            // $.ajax({
            //     type: 'POST',
            //     url: 'delete.php',
            //     data: "id="+name,
            //     dataType: 'html'
            // });
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;        
        }



        
    };


</script>

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>


    <!-- <form action="http://localhost/sifeni/web/index.php?r=site/upload"
      class="dropzone"
      type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>"
      id="my-awesome-dropzone"></form> -->

      <form action="<?php echo Url::to(['site/upload']);?>"
      class="dropzone"
      id="my-awesome-dropzone"></form>

    <?php
        use yii\widgets\ActiveForm;
    ?>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

        <?= $form->field($model, 'imageFile')->fileInput() ?>

        <button>Submit</button>

    <?php ActiveForm::end() ?>

    <div id="myId"></div>


</div>
