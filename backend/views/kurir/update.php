<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kurir */

$this->title = 'Update Kurir: ' . ' ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Kurirs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kurir-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
