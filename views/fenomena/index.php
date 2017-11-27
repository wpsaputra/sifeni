<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\SfSumber;
use app\models\SfKecamatan;
use app\models\SfLapanganUsaha;
use app\models\SfPengaruh;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FenomenaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Fenomena';
$this->params['breadcrumbs'][] = $this->title;

$request = Yii::$app->request;
$perpage = $request->get('per-page', 0);
?>

<script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementsByClassName(table)[0]
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>



<div class="fenomena-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <form name="pageselect">
        <div class="row">
            <div class="col-xs-3">
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
        <input type="button" onclick="tableToExcel('table', 'W3C Example Table')" value="Download Excel" class="btn btn-primary pull-right">
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
