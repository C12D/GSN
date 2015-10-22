<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'G_ORDER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'G_RANDOM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'G_PESAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'USER_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'USER_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NAMA_CUSTOMER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ALAMAT_CUSTOMER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HANDPHONE')->textInput() ?>

    <?= $form->field($model, 'EMAIL_CUSTOMER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GRANDTOTAL')->textInput() ?>

    <?= $form->field($model, 'CREATE_DATED')->textInput() ?>

    <?= $form->field($model, 'STATUS')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
