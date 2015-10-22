<?php

use yii\widgets\DetailView;
use yii\data\ArrayDataProvider;
use kartik\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use kartik\grid\GridView;

use common\components\StatusComponent;
/* @var $this yii\web\View */
/* @var $model backend\models\Ordergenerate */


$this->params['breadcrumbs'][] = ['label' => 'Ordergenerates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordergenerate-view">


<?php
    $dataProvider = new ArrayDataProvider([
        'key'=>'G_ORDER',
        'allModels' => $detail,
        'sort' => [
            'attributes' => ['USER_ID', 'G_PESAN', 'STATUS'],
        ],
]); 

    echo GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
          

            [
            'attribute' => 'USERNAME', 
            'value' => 'USER_NAME',
            ],
            [
            "attribute" => "PESAN",
            'value' => 'G_PESAN',
            ],
			[
            "attribute" => "Status",
            'value' => 'STATUS',
            ]

    ]
]);

    ?>
    <?php
        echo "<br/>";
        echo "<b>DETAIL PESAN</b>".'<br/><br/>';
        echo "Tanggal Pesan"." : ".$model->G_PESAN.'<br/>';
        echo "USER ID"."       : ".$model->USER_ID.'<br/>';
        echo "Tanggal Pesan"." : ".$model->USER_NAME;
    ?>
    <?php
        //print_r($model);
    

   // echo Yii::$app->StatusCom->statusTipe('STATUS','label','raw');?>
   

