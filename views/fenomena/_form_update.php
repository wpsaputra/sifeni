<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\SfSumber;
use yii\helpers\ArrayHelper;
use app\models\SfKecamatan;
use app\models\SfLapanganUsaha;
use app\models\SfPengaruh;
use yii\web\View;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Fenomena */
/* @var $form yii\widgets\ActiveForm */

$this->registerAssetBundle(yii\web\JqueryAsset::className(), View::POS_HEAD);
$this->registerJsFile('@web/js/dropzone.js' , ['position' => View::POS_BEGIN]);
$this->registerCssFile('@web/css/dropzone.css' , ['position' => View::POS_HEAD]);
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

    <div style="display: none">
        <?= $form->field($model, 'upload_foto_dokumen')->textarea(['rows' => 6]) ?>
    </div>
    
    <div class="form-group field-fenomena-upload_foto_dokumen required">
        <label class="control-label" for="fenomena-upload_foto_dokumen">Upload Foto / Dokumen</label>
        <div class="dropzone form-group" id="dropzone">
            <div class="dz-default dz-message"><span>Drop files or click here to upload (jpg, png, pdf)</span></div>
        </div>
        <div class="help-block"></div>
    </div>
    

    <!-- <?= $form->field($model, 'isVerified')->textInput() ?> -->
    <?= (Yii::$app->user->identity->level==1)? $form->field($model, 'isVerified')->dropDownList(
        [0=>'Belum Diverifikasi', 1=>'Sudah Diverifikasi'],
        ['prompt'=>'Pilih Status Fenomena'] 
    ) : ''?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



<script>
    // https://stackoverflow.com/questions/24859005/dropzone-js-how-to-change-file-name-before-uploading-to-folder
    // https://stackoverflow.com/questions/29910240/get-count-of-selected-files-in-dropzone

    Dropzone.autoDiscover = false;
    var fileList = new Array;
    var i = 0;

    $("div#dropzone").dropzone({ 
        url: "<?php echo Url::to(['site/upload']);?>", 
        paramName: "UploadForm[imageFile]", // The name that will be used to transfer the file
        maxFilesize: 1, // MB
        addRemoveLinks: true,
        acceptedFiles: "image/jpeg,image/png,application/pdf",

        init: function() {
            // Hack: Add the dropzone class to the element
            // $(this.element).addClass("dropzone");
            
            // var mockFile = { name: "myimage.jpg", size: 12345, type: 'image/jpeg' };       
            
            // this.options.addedfile.call(this, mockFile);
            // this.options.thumbnail.call(this, mockFile, "http://localhost:1000/sifeni/web/uploads/1.jpg");
            // mockFile.previewElement.classList.add('dz-success');
            // mockFile.previewElement.classList.add('dz-complete');

            // this.emit("addedfile", mockFile);
            // this.emit("thumbnail", mockFile, "http://localhost:1000/sifeni/web/uploads/1511784770image_1.jpg");

            // var img = new Image();
            // img.src =  'http://localhost:1000/sifeni/web/uploads/1511784770image_1.jpg';
            // img.height = 300;
            // img.width = 300;

            // this.createThumbnailFromUrl(mockFile, 'http://localhost:1000/sifeni/web/uploads/1511784770image_1.jpg');

            var fileserver = $("#fenomena-upload_foto_dokumen").text();
            fileserver = fileserver.split(",");

            for(f=0;f<fileserver.length;f++){
                let mockFile = {
                    name: fileserver[f],
                    size: 12345,
                    dataURL: '<?php echo Url::to('@web/uploads/')?>'+fileserver[f],
                };
                console.log("Mock FILE"+mockFile);


                let xdr = this;
                
                this.files.push(mockFile);
                this.emit('addedfile', mockFile);
                this.createThumbnailFromUrl(
                    mockFile,
                    this.options.thumbnailWidth,
                    this.options.thumbnailHeight,
                    this.options.thumbnailMethod,
                    true,
                    function(thumbnail) {
                        xdr.emit('thumbnail', mockFile, thumbnail);
                        xdr.emit('complete', mockFile);
                    }
                );
                // this.emit('success', mockFile);
                // console.log("file"+file);

                fileServer = {"serverFileName" : fileserver[f], "fileName" : fileserver[f],"fileId" : i, "uuid" : i};
                fileList[i] = fileServer;
                i++;

            }

            this.on("success", function(file, serverFileName) {
                fileList[i] = {"serverFileName" : serverFileName, "fileName" : file.name,"fileId" : i, "uuid" : file.upload.uuid};
                console.log(fileList);
                console.log(file);
                console.log(file.upload.uuid);
                i++;

                var result = fileList.map(function(a) {return a.serverFileName;});
                $("#fenomena-upload_foto_dokumen").text(result);

            });

            this.on("removedfile", function(file) {
                var rmvFile = "";
                for(f=0;f<fileList.length;f++){

                    // if(fileList[f].fileName == file.name && fileList[f].uuid == file.upload.uuid)
                    if(fileList[f].fileName == file.name)
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
                var result = fileList.map(function(a) {return a.serverFileName;});
                $("#fenomena-upload_foto_dokumen").text(result);
            });
        },
    
    
    });

</script>