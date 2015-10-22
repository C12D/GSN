<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Expired */

$this->title = 'Update Expired: ' . ' ' . $model->STATUS_ID;
$this->params['breadcrumbs'][] = ['label' => 'Expireds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->STATUS_ID, 'url' => ['view', 'id' => $model->STATUS_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="expired-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
