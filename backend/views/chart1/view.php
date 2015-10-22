<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Chart */

$this->title = $model->CHART_ID;
$this->params['breadcrumbs'][] = ['label' => 'Charts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chart-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->CHART_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->CHART_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'CHART_ID',
            'USER_ID',
            'USERNAME',
            'FAKTUR',
            'NOFAKTUR',
            'KURIR',
            'PROVORIGIN',
            'PROVDES',
            'ORIGIN_CITY',
            'DES_CITY',
            'KODE_POS_ORIGIN',
            'KODE_POS_DES',
            'KATEGORI_KIRIM',
            'KATEGORI_DETAIL',
            'TOTAL_BERAT',
            'HARGA',
        ],
    ]) ?>

</div>
