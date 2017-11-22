<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="alert alert-info alert-dismissible" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Selamat Datang, Admin
    </div>

    <p>
        <?= Html::a('Tambah Pengguna', ['create'], ['class' => 'btn btn-success pull-right']) ?>
    </p> <br/>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'password',
            // 'level',
            [
                'attribute' => 'level',
                'value' => function($model){
                    if($model->level == '1'){
                        return 'admin';
                    }else{
                        return 'user';
                    }
                }
            ],

            ['class' => 'yii\grid\ActionColumn', 'header' => 'Tindakan'],
        ],
    ]); ?>
</div>
