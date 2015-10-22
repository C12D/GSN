<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Chart */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chart-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'USER_ID')->textInput() ?>

    <?= $form->field($model, 'USERNAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FAKTUR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NOFAKTUR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KURIR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROVORIGIN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROVDES')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ORIGIN_CITY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DES_CITY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KODE_POS_ORIGIN')->textInput() ?>

    <?= $form->field($model, 'KODE_POS_DES')->textInput() ?>

    <?= $form->field($model, 'KATEGORI_KIRIM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KATEGORI_DETAIL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TOTAL_BERAT')->textInput() ?>

    <?= $form->field($model, 'HARGA')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
