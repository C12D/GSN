<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Progressjob */

$this->title = $model->PROGRESS_ID;
$this->params['breadcrumbs'][] = ['label' => 'Progressjobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="progressjob-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->PROGRESS_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->PROGRESS_ID], [
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
            'PROGRESS_ID',
            'USER_ID',
            'MODUL',
            'JUDUL',
            'KETERANGAN:ntext',
            'STAR_DATE',
            'END_DATE',
            'PROGRESS',
            'STATUS',
            'KETERANGAN_DETAIL:ntext',
        ],
    ]) ?>

</div>
