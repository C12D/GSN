<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Harga */

$this->title = 'Update Harga: ' . ' ' . $model->FWD_ID;
$this->params['breadcrumbs'][] = ['label' => 'Hargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->FWD_ID, 'url' => ['view', 'id' => $model->FWD_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="harga-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
