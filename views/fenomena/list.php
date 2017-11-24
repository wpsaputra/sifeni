<?php
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use app\models\Fenomena;

$dataProvider = new ActiveDataProvider([
    'query' => Fenomena::find(),
    'pagination' => [
        'pageSize' => 4,
    ],
]);
?>

<div class="post">
    <div class="row">
        <?php
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'summary'=>'', 
            'itemView' => '_post',
            'pager' => [
                // Customzing options for pager container tag
                'options' => [
                    'tag' => 'div',
                    'class' => 'pagination col-md-12',
                    // 'style' => 'position:absolute;bottom:0;',
                    'id' => 'pager-container',
                ],
                
            ],



        ]);
        ?>
    </div>
</div>


