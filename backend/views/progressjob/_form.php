<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\Progressjob */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="progressjob-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'USER_ID')->textInput(['value'=>Yii::$app->user->identity->id]) ?>

     <?php echo $form->field($model, 'MODUL')->dropDownList(['GOSEN' => 'GOSEN', 'ESM' => 'ESM', 'SSS' => 'SSS'],['prompt'=>'--Pilih Modul--']); ?>

    <?= $form->field($model, 'JUDUL')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'PROGRESS_ID')->hiddenInput()->label(false); ?>

    <?= $form->field($model, 'KETERANGAN')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'STAR_DATE')->textInput() ?>

    <?= $form->field($model, 'END_DATE')->textInput() ?>

    <?= $form->field($model, 'PROGRESS')->textInput(['maxlength' => true]) ?>

     <?php echo $form->field($model, 'STATUS')->dropDownList(['1' => '1', '2' => '2'],['prompt'=>'--Pilih Status--']); ?>

   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
