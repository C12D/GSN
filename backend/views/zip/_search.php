<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ZipSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zip-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'zip_id') ?>

    <?= $form->field($model, 'provinsi') ?>

    <?= $form->field($model, 'kota') ?>

    <?= $form->field($model, 'postal_code') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
