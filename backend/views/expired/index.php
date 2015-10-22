<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ExpiredSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Expireds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expired-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Expired', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'STATUS_ID',
            'STATUS',
            'DURASI_WAKTU',
            'CANCEL_TIME',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
