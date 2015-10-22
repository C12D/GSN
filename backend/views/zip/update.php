<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Zip */

$this->title = 'Update Zip: ' . ' ' . $model->zip_id;
$this->params['breadcrumbs'][] = ['label' => 'Zips', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->zip_id, 'url' => ['view', 'id' => $model->zip_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zip-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
