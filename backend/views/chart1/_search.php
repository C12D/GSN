<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ChartSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chart-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'CHART_ID') ?>

    <?= $form->field($model, 'USER_ID') ?>

    <?= $form->field($model, 'USERNAME') ?>

    <?= $form->field($model, 'FAKTUR') ?>

    <?= $form->field($model, 'NOFAKTUR') ?>

    <?php // echo $form->field($model, 'KURIR') ?>

    <?php // echo $form->field($model, 'PROVORIGIN') ?>

    <?php // echo $form->field($model, 'PROVDES') ?>

    <?php // echo $form->field($model, 'ORIGIN_CITY') ?>

    <?php // echo $form->field($model, 'DES_CITY') ?>

    <?php // echo $form->field($model, 'KODE_POS_ORIGIN') ?>

    <?php // echo $form->field($model, 'KODE_POS_DES') ?>

    <?php // echo $form->field($model, 'KATEGORI_KIRIM') ?>

    <?php // echo $form->field($model, 'KATEGORI_DETAIL') ?>

    <?php // echo $form->field($model, 'TOTAL_BERAT') ?>

    <?php // echo $form->field($model, 'HARGA') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
