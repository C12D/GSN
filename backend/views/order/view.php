<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */

$this->title = $model->G_ORDER;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->G_ORDER], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->G_ORDER], [
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
            'G_ORDER',
            'G_RANDOM',
            'G_PESAN',
            'USER_ID',
            'USER_NAME',
            'NAMA_CUSTOMER',
            'ALAMAT_CUSTOMER',
            'HANDPHONE',
            'EMAIL_CUSTOMER:email',
            'GRANDTOTAL',
            'CREATE_DATED',
            'STATUS',
        ],
    ]) ?>

</div>
