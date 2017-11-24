<?php
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use app\models\Fenomena;

$dataProvider = new ActiveDataProvider([
    'query' => Fenomena::find(),
    'pagination' => [
        'pageSize' => 1,
    ],
]);
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_post',
]);