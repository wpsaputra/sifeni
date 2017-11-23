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
    // https://stackoverflow.com/questions/24859005/dropzone-js-how-to-change-file-name-before-uploading-to-folder
    // https://stackoverflow.com/questions/29910240/get-count-of-selected-files-in-dropzone

    var fileList = new Array;
    var i = 0;
    Dropzone.options.myAwesomeDropzone = {
        paramName: "UploadForm[imageFile]", // The name that will be used to transfer the file
        maxFilesize: 1, // MB
        addRemoveLinks: true,
        // removedfile: function(file) {
        //     var name = file.name;        
        //     // $.ajax({
        //     //     type: 'POST',
        //     //     url: 'delete.php',
        //     //     data: "id="+name,
        //     //     dataType: 'html'
        //     // });
        //     var _ref;
        //     return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;        
        // },

        acceptedFiles: "image/jpeg,image/png,application/pdf",

        init: function() {

            // Hack: Add the dropzone class to the element
            // $(this.element).addClass("dropzone");

            this.on("success", function(file, serverFileName) {
                fileList[i] = {"serverFileName" : serverFileName, "fileName" : file.name,"fileId" : i, "uuid" : file.upload.uuid};
                console.log(fileList);
                console.log(file);
                console.log(file.upload.uuid);
                i++;

            });
            this.on("removedfile", function(file) {
                var rmvFile = "";
                for(f=0;f<fileList.length;f++){

                    if(fileList[f].fileName == file.name && fileList[f].uuid == file.upload.uuid)
                    // if(fileList[f].uuid == file.upload.uuid)
                    {
                        rmvFile = fileList[f].serverFileName;
                        fileList.splice(f,1);
                        i=i-1;

                    }

                }

                if (rmvFile){
                    $.ajax({
                        // url: "http://localhost/dropzone/sample/delete_temp_files.php",
                        url: "<?php echo Url::to(['site/delete']);?>",
                        type: "POST",
                        data: { "fileList" : rmvFile }
                    });
                }

                console.log(fileList);
            });


        },



        
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
