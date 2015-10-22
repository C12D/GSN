<?php
//use yii\helpers\Html;
use kartik\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;
use yii\jui\Accordion;
use backend\models\Expired;
use common\components\GenerateComponent;


//use backend\assets\AppAsset;  	/* CLASS ASSET CSS/JS/THEME Author: -ptr.nov-*/
//AppAsset::register($this);		/* INDEPENDENT CSS/JS/THEME FOR PAGE  Author: -ptr.nov-*/


$this->sideCorp = 'PT. Gosend';                   							/* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'gsn_order';                          				/* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Gosend - Order '); 					/* title pada header page */
$this->params['breadcrumbs'][] = $this->title;              			/* belum di gunakan karena sudah ada list sidemenu, on plan next*/
?>
<?php
/*
 $do='Mauris mauris ante, blandit et, ultrices a, suscipit eget...';
echo Accordion::widget([
      'items' => [
          [
              'header' => 'Section 1',
             
              'content' =>$do,
          ],
          [
              'header' => 'Section 2',
              'headerOptions' => ['tag' => 'h3'],
              'content' => 'Sed non urna. Phasellus eu ligula. Vestibulum sit amet purus...',
             'options' => ['tag' => 'div'],
          ],
          [
              'header' => 'Section 3',
             
              'content' =>$do,
          ],
          [
              'header' => 'Section 4',
              'headerOptions' => ['tag' => 'h3'],
              'content' => 'Sed non urna. Phasellus eu ligula. Vestibulum sit amet purus...',
             'options' => ['tag' => 'div'],
          ],
      ],
      'options' => ['tag' => 'div'],
      'itemOptions' => ['tag' => 'div'],
      'headerOptions' => ['tag' => 'h3'],
      'clientOptions' => ['collapsible' => false],
  ]);*/

?>
<div class="ordergenerate-form">

    <?php $form = ActiveForm::begin(); ?>
 
    <?= $form->field($model, 'G_ORDER')->textInput(['maxlength' => true,'value'=>Yii::$app->Gencom->Generate2()]) ?>

    <?= $form->field($model, 'G_RANDOM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'G_PESAN')->textInput(['maxlength' => true,'value'=>Yii::$app->Gencom->Date()]) ?>

    <?= $form->field($model, 'USER_ID')->textInput((['value'=>Yii::$app->user->identity->id])) ?>

    <?= $form->field($model, 'USER_NAME')->textInput((['value'=>Yii::$app->user->identity->username])) ?>

    <?= $form->field($model, 'TGL')->textInput(['maxlength' => true,'value'=>date('Y-d-m')]) ?>

    <?= $form->field($model, 'JAM')->textInput(['maxlength' => true,'value'=>date('H:i:s')]) ?>

    <?php
      
      $Expired=Expired::find()->all();
      $listData=ArrayHelper::map($Expired,'status_id','status');
         echo $form->field($model, 'STATUS')->dropDownList(
                                $listData, 
                                ['prompt'=>'Select...']);

    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
