<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Progressjob */

$this->title = 'Update Progressjob: ' . ' ' . $model->PROGRESS_ID;
$this->params['breadcrumbs'][] = ['label' => 'Progressjobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PROGRESS_ID, 'url' => ['view', 'id' => $model->PROGRESS_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="progressjob-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
