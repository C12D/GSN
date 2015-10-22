<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Chart */

$this->title = 'Update Chart: ' . ' ' . $model->CHART_ID;
$this->params['breadcrumbs'][] = ['label' => 'Charts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CHART_ID, 'url' => ['view', 'id' => $model->CHART_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="chart-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
