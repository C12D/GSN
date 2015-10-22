<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Expired */

$this->title = $model->STATUS_ID;
$this->params['breadcrumbs'][] = ['label' => 'Expireds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expired-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->STATUS_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->STATUS_ID], [
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
            'STATUS_ID',
            'STATUS',
            'DURASI_WAKTU',
            'CANCEL_TIME',
        ],
    ]) ?>

</div>
