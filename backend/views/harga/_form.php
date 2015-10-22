<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Kota;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Harga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="harga-form">

    <?php $form = ActiveForm::begin([
    'method' => 'post',
    'action' => ['harga/price'],
    ]);?>
  

    <?php
    $dataPost=ArrayHelper::map(kota::find()->all(), 'CITY_ID', 'CITY_NAME');
    echo $form->field($model, 'ORIGIN_CITY')
        ->dropDownList(
            $dataPost
        );
        ?>
    <?php
    $dataPost=ArrayHelper::map(kota::find()->all(), 'CITY_ID', 'CITY_NAME');
    echo $form->field($model, 'DES_CITY')
        ->dropDownList(
            $dataPost
        );
        ?>
    
    <?= $form->field($model, 'HARGA')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
