<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\builder\Form;
use backend\models\Provinsi;
use backend\models\Kota;
use backend\models\Expired;
use backend\models\Kurir;
use yii\helpers\ArrayHelper;
use kartik\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use kartik\select2\select2;
use yii\widgets\pjax;
use yii\data\ArrayDataProvider;   
use kartik\grid\GridView;
use common\components\GenerateComponent;
use miloschuman\highcharts\Highcharts;
$this->title = 'My Yii Application';
?>
<div class="site-index">

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-8" style="background-color:lavenderblush;"><!--<img src="<?php echo Yii::$app->urlManager->baseUrl.'/images/mobil.jpg'; ?>" class="img-thumbnail" alt="" width="100%"/>-->
      <?php


        /*
        echo Highcharts::widget([


        'options' => [
        'title' => ['text' => 'Fruit Consumption'],
        'xAxis' => [
        'categories' => ['Apples', 'Bananas', 'Oranges']
        ],
        'yAxis' => [
        'title' => ['text' => 'Fruit eaten']
        ],
        'series' => [
        ['name' => 'Jane', 'data' => [1, 0, 4]],
        ['name' => 'John', 'data' => [5, 7, 3]]
        ]
        ]
        ]); */
      ?>

    <br/><br/>

   
    <div class="row">
    <h3><b>LIST ORDER</b></h3>

  <?php
  $resultData =$sql;
  $dataProvider = new ArrayDataProvider([
        
        'allModels' => $resultData,
        'sort' => [
            'attributes' => ['KOTA ASAL', 'KOTA TUJUAN', 'KURIR','KATEGORI','BERAT','HARGA'],
        ],
        'pagination' => [
        'pageSize' => 5,
    ],
]);

echo GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
            'attribute' => 'KOTA ASAL', 
            'value' => 'ORIGIN_CITY',
            ],
            [
            'attribute' => 'KOTA TUJUAN', 
            'value' => 'DES_CITY',
            ],
            [
            'attribute' => 'KURIR', 
            'value' => 'KURIR',
            ],
            [
            'attribute' => 'KATEGORI', 
            'value' => 'KATEGORI_KIRIM',
            ],
            [
            'attribute' => 'BERAT', 
            'value' => 'TOTAL_BERAT',
            ],
            [
            'attribute' => 'HARGA', 
            'value' => 'HARGA',
            ]
            /*
            [
            "attribute" => "email",
            'filter' => '<input class="form-control" name="filteremail" value="da" type="text">',
            'value' => 'email',
            ]
            */

    ]
]);
?>
      
      <div class="col-md-7" style="background-color:#f6f6f6;">
   
<div class="row">


  <div class="col-xs-12 col-sm-8 col-md-4">

   <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">CHECKOUT</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>DATA CUSTOMER</b></h4>
        </div>
        <div class="modal-body"> 
   <?php $form = ActiveForm::begin([
    'method' => 'post',
    'action' => ['site/checkout'],
    ]);?>
    
    <?= $form->field($model, 'G_ORDER')->hiddenInput(['maxlength' => true,'value'=>Yii::$app->GenCom->Generate2()])->label(false) ?>

    <?= $form->field($model, 'G_RANDOM')->hiddenInput(['maxlength' => true,'value'=>Yii::$app->GenCom->Generate2()])->label(false) ?>

    <?= $form->field($model, 'G_PESAN')->hiddenInput(['maxlength' => true,'value'=>date('Y-m-d')])->label(false) ?>

    <?= $form->field($model, 'USER_ID')->hiddenInput(['maxlength' => true,'value'=>Yii::$app->user->identity->id])->label(false) ?>

    <?= $form->field($model, 'USER_NAME')->hiddenInput(['maxlength' => true,'value'=>Yii::$app->user->identity->username])->label(false) ?>

    <?= $form->field($model, 'NAMA_CUSTOMER')->textInput(['maxlength' => true])->label('Nama') ?>

    <?= $form->field($model, 'ALAMAT_CUSTOMER')->textInput(['maxlength' => true])->label('Alamat') ?>

    <?= $form->field($model, 'HANDPHONE')->textInput()->label('Handphone') ?>

    <?= $form->field($model, 'EMAIL_CUSTOMER')->textInput(['maxlength' => true])->label('Email') ?>

    <input type="hidden" name="total" value="<?php echo $total[0]['total']; ?>">
     <?= $form->field($model, 'STATUS')->dropDownList(
        ArrayHelper::map(Expired::find()->all(),'STATUS_ID','STATUS'),
        ['prompt'=>'Select Status'])
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-md' : 'btn btn-primary']) ?>

    </div>

    <?php ActiveForm::end(); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

     <br/>

  </div>


  <?= Html::a('<i class="fa fa-plus fa-sm"></i> CONTINUE ORDER', ['price'], ['class' => 'btn btn-success btn-md']) ?>
</div>

       
      </div>

      <div class="col-md-5">
      
      </div>
    </div>

    </div>






    <div class="col-sm-4" style="background-color:lavender;">
    <table>
        <tbody>
          <tr>
            <td><br/>
            <img src="<?php echo Yii::$app->urlManager->baseUrl.'/images/user.jpg'; ?>" class="img-circle" alt="User Image" width="100"/></td><td></td>
            <td>&nbsp&nbsp<b>Soni Firdaus</b></td>
          </tr>
          <tr><td align="center"><font color="blue"><b>Edit Profil</b></td></tr>

        </tbody>
      </table>
   <div class="harga-form">

   

</div>
    
  </div>
</div>

</div>

