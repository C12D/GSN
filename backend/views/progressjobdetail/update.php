<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Progressjobdetail */

$this->title = 'Update Progressjobdetail: ' . ' ' . $model->PROGRESSJOBDETAIL_ID;
$this->params['breadcrumbs'][] = ['label' => 'Progressjobdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PROGRESSJOBDETAIL_ID, 'url' => ['view', 'id' => $model->PROGRESSJOBDETAIL_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="progressjobdetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
