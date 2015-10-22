<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Kurir */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kurir-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KURIR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KATEGORI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KURIRKATEGORI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ORIGINPROV')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DESPROV')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ORIGINCITY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DESCITY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'POSTALCODEORIGIN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'POSTALCODEDESC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TOTALWEIGHT')->textInput() ?>

    <?= $form->field($model, 'HARGA')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
