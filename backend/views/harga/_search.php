<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HargaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="harga-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'FWD_ID') ?>

    <?= $form->field($model, 'FWD_NM') ?>

    <?= $form->field($model, 'FWD_SERVICE') ?>

    <?= $form->field($model, 'FWD_STS') ?>

    <?= $form->field($model, 'FWD_DATE_START') ?>

    <?php // echo $form->field($model, 'FWD_DATE_UPDATE') ?>

    <?php // echo $form->field($model, 'ORIGIN_PROVINCE') ?>

    <?php // echo $form->field($model, 'ORIGIN_CITY') ?>

    <?php // echo $form->field($model, 'DES_PROVINCE') ?>

    <?php // echo $form->field($model, 'DES_CITY') ?>

    <?php // echo $form->field($model, 'HARGA') ?>

    <?php // echo $form->field($model, 'STATUS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
