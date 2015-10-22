<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Progressjobdetail */

$this->title = $model->PROGRESSJOBDETAIL_ID;
$this->params['breadcrumbs'][] = ['label' => 'Progressjobdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="progressjobdetail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->PROGRESSJOBDETAIL_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->PROGRESSJOBDETAIL_ID], [
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
            'PROGRESSJOBDETAIL_ID',
            'PROGRESS_ID',
            'CREATED_DATE',
            'KETERANGAN',
            'PIC',
        ],
    ]) ?>

</div>
