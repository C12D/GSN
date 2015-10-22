<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ZipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Zips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zip-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Zip', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'zip_id',
            'provinsi',
            'kota',
            'postal_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
