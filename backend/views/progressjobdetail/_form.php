<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Progressjobdetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="progressjobdetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PROGRESS_ID')->textInput() ?>

    <?= $form->field($model, 'CREATED_DATE')->textInput() ?>

    <?= $form->field($model, 'KETERANGAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PIC')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
