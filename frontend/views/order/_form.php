<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Ordergenerate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ordergenerate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'G_ORDER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'G_RANDOM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'G_PESAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'USER_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TGL')->textInput() ?>

    <?= $form->field($model, 'JAM')->textInput() ?>

    <?= $form->field($model, 'STATUS')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
