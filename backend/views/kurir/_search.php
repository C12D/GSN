<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KurirSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kurir-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'KURIR') ?>

    <?= $form->field($model, 'KATEGORI') ?>

    <?= $form->field($model, 'KURIRKATEGORI') ?>

    <?= $form->field($model, 'ORIGINPROV') ?>

    <?php // echo $form->field($model, 'DESPROV') ?>

    <?php // echo $form->field($model, 'ORIGINCITY') ?>

    <?php // echo $form->field($model, 'DESCITY') ?>

    <?php // echo $form->field($model, 'POSTALCODEORIGIN') ?>

    <?php // echo $form->field($model, 'POSTALCODEDESC') ?>

    <?php // echo $form->field($model, 'TOTALWEIGHT') ?>

    <?php // echo $form->field($model, 'HARGA') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
