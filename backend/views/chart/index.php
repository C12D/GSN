<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ChartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Charts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chart-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Chart', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CHART_ID',
            'USER_ID',
            'USERNAME',
            'NOFAKTUR',
            'KURIR',
            // 'PROVORIGIN',
            // 'PROVDES',
            // 'ORIGIN_CITY',
            // 'DES_CITY',
            // 'KODE_POS_ORIGIN',
            // 'KODE_POS_DES',
            // 'KATEGORI_KIRIM',
            // 'TOTAL_BERAT',
            // 'HARGA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
