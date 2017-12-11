<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\SfSumber;
use app\models\SfKecamatan;
use app\models\SfLapanganUsaha;
use app\models\SfPengaruh;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FenomenaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Fenomena';
$this->params['breadcrumbs'][] = $this->title;

$request = Yii::$app->request;
$perpage = $request->get('per-page', 0);

$this->registerAssetBundle(yii\web\JqueryAsset::className(), View::POS_HEAD);
$this->registerJsFile('@web/js/jquery.table2excel.min.js' , ['position' => View::POS_BEGIN]);
?>

<div class="fenomena-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <form name="pageselect">
        <div class="row" style="margin-bottom: 5px;">
            <div class="col-sm-3">
                <select name="menu" class="form-control" onChange="window.document.location.href=this.options[this.selectedIndex].value;" value="GO">
                    <option <?php echo ($perpage==5)? 'selected' : 'value'; ?>="<?php echo Url::to(['fenomena/index', 'per-page' => 5]);?>">Tampilkan 5 Baris</option>
                    <option <?php echo ($perpage==10)? 'selected' : 'value'; ?>="<?php echo Url::to(['fenomena/index', 'per-page' => 10]);?>">Tampilkan 10 Baris</option>
                    <option <?php echo ($perpage==0)? 'selected' : 'value'; ?>="<?php echo Url::to(['fenomena/index']);?>">Tampilkan Semua</option>
                </select>
            </div>
        </div>
    </form>
    <p>
        <?= Html::a('Tambah Fenomena', ['create'], ['class' => 'btn btn-success pull-right', 'style'=>'margin-left:5px;']) ?>
        <!-- <input type="button" onclick="tableToExcel('table', 'W3C Example Table')" value="Download Excel" class="btn btn-primary pull-right"> -->
        <input type="button" id="button" value="Download Excel" class="btn btn-primary pull-right">
    </p><br/>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'tanggal_fenomena',
            // 'sumber_id',
            [
                'attribute' => 'sumber_id',
                'value' => function($model){
                    return SfSumber::findOne($model->sumber_id)->nama;
                    
                }
            ],

            // 'kecamatan_id',
            [
                'attribute' => 'kecamatan_id',
                'value' => function($model){
                    return SfKecamatan::findOne($model->kecamatan_id)->nama;
                    
                }
            ],


            'isi_fenomena:ntext',
            
            // 'lapangan_usaha',
            [
                'attribute' => 'lapangan_usaha',
                'value' => function($model){
                    return SfLapanganUsaha::findOne($model->lapangan_usaha)->keterangan;
                    
                }
            ],

            // 'pengaruh_id',
            [
                'attribute' => 'pengaruh_id',
                'value' => function($model){
                    return SfPengaruh::findOne($model->pengaruh_id)->nama;
                }
            ],

            'tanggal_entri',
            [
                'attribute' => 'isVerified',
                'value' => function($model){
                    return ($model->isVerified==1)?  'sudah verifikasi' : 'belum verifikasi';
                }
            ],


            // 'upload_foto_dokumen:ntext',
            // 'isVerified',

            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons'=>[
                    'update' => Yii::$app->user->identity->level==1,
                    'delete' => Yii::$app->user->identity->level==1,
                ]
            ],
        ],
        


    ]); ?>
</div>

<script type="text/javascript">
    $("#button").click(function(){
        $(".table").table2excel({
            // exclude CSS class
            exclude: ".filters",
            name: "sheet 1",
            filename: "Export Fenomena" //do not include extension
        }); 
    });
</script>