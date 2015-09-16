<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use kartik\builder\Form;
use backend\models\Provinsi;
use backend\models\Kota;
use yii\helpers\ArrayHelper;
use kartik\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use yii\widgets\pjax;
$this->title = 'My Yii Application';
?>
<div class="site-index">
<?php

//$dataCategory=ArrayHelper::map(\common\models\Provinsi::find()->asArray()->all(), 'province_id', 'province');
$form = ActiveForm::begin(); ?>
   


   <?php ActiveForm::end(); ?>

</div>
