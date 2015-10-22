<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Harga */

$this->title = $model->FWD_ID;
$this->params['breadcrumbs'][] = ['label' => 'Hargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="harga-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->FWD_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->FWD_ID], [
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
            'FWD_ID',
            'FWD_NM',
            'FWD_SERVICE',
            'FWD_STS',
            'FWD_DATE_START',
            'FWD_DATE_UPDATE',
            'ORIGIN_PROVINCE',
            'ORIGIN_CITY',
            'DES_PROVINCE',
            'DES_CITY',
            'HARGA',
            'STATUS',
        ],
    ]) ?>

</div>
