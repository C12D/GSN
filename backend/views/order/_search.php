<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'G_ORDER') ?>

    <?= $form->field($model, 'G_RANDOM') ?>

    <?= $form->field($model, 'G_PESAN') ?>

    <?= $form->field($model, 'USER_ID') ?>

    <?= $form->field($model, 'USER_NAME') ?>

    <?php // echo $form->field($model, 'NAMA_CUSTOMER') ?>

    <?php // echo $form->field($model, 'ALAMAT_CUSTOMER') ?>

    <?php // echo $form->field($model, 'HANDPHONE') ?>

    <?php // echo $form->field($model, 'EMAIL_CUSTOMER') ?>

    <?php // echo $form->field($model, 'GRANDTOTAL') ?>

    <?php // echo $form->field($model, 'CREATE_DATED') ?>

    <?php // echo $form->field($model, 'STATUS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
