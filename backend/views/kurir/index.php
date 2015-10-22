<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KurirSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kurirs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kurir-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kurir', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'KURIR',
            'KATEGORI',
            'KURIRKATEGORI',
            'ORIGINPROV',
            // 'DESPROV',
            // 'ORIGINCITY',
            // 'DESCITY',
            // 'POSTALCODEORIGIN',
            // 'POSTALCODEDESC',
            // 'TOTALWEIGHT',
            // 'HARGA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
