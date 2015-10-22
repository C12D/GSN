<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HargaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hargas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="harga-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Harga', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'FWD_ID',
            'FWD_NM',
            'FWD_SERVICE',
            'FWD_STS',
            'FWD_DATE_START',
            // 'FWD_DATE_UPDATE',
            // 'ORIGIN_PROVINCE',
            // 'ORIGIN_CITY',
            // 'DES_PROVINCE',
            // 'DES_CITY',
            // 'HARGA',
            // 'STATUS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
