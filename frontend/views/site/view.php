<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\builder\Form;
use backend\models\Provinsi;
use backend\models\Kota;
use backend\models\Kurir;
use yii\helpers\ArrayHelper;
use kartik\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use kartik\select2\select2;
use yii\widgets\pjax;
use common\components\GenerateComponent;
use miloschuman\highcharts\Highcharts;
$this->title = 'My Yii Application';
?>
<div class="site-index">

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-8" style="background-color:lavenderblush;"><img src="<?php echo Yii::$app->urlManager->baseUrl.'/images/mobil.jpg'; ?>" class="img-thumbnail" alt="" width="100%"/>
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

     <table class="table">
      <tr>
        <td>KURIR BARANG</td>
        <td>KATEGORI PENGIRIMAN</td>
        <td>HARGA</td>
     
      </td>
      <?php
            for ($i=0; $i < count($data['rajaongkir']['results']); $i++) 
          {
            for ($j=0; $j < count($data['rajaongkir']['results'][$i]['costs']); $j++) 
             {
              ?>
      <tr class="success">
        <td><?php echo $nama_kurir=$data['rajaongkir']['results'][$i]['name'];?></td>
        <td><?php echo $data['rajaongkir']['results'][$i]['costs'][$j]['service']?></td>
        <td><?php echo  number_format($data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['value']);?></td>
      </tr>
     <?php }} ?>
  </table>
    <div class="row">
      
      <?php $form = ActiveForm::begin([
        'method' => 'post',
        'action' => ['site/act'],
      ]);?>

      <div class="col-md-7" style="background-color:#f6f6f6;">
        <table class="table row"style="margin-bottom:0px;">
          <tbody>
            <tr>
              <td>
                  <?= $form->field($model2, 'KURIR')->widget(select2::classname(),[
                      'data'=>ArrayHelper::map(Kurir::find()->all(),'ID','KURIRKATEGORI'),
                      'language'=>'en',
                      'options'=>['placeholder'=>'--Pilih Kurir--','id'=>'KURIR'],
                      'pluginOptions'=>[
                      'allowClear'=>true],
                    ]); 
                  ?>
                 <?= $form->field($model2, 'HARGA')->textInput(['maxlength' => true])->label('Values Checking'); ?>

              </td> 
            </tr>


          <tr>
            <td>
               <b>Details :</b>
            </td>
          </tr>

          </tbody>
        </table>
     


<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6">
    <b>From :</b><br/>
      <?= $form->field($model2, 'ORIGINCITY')->textInput(['maxlength' => true])->label(false); ?>
  </div>

  <div class="col-xs-12 col-sm-6 col-md-6">
    <b>To :</b><br/>
      <?= $form->field($model2, 'DESCITY')->textInput(['maxlength' => true])->label(false); ?>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6">
    <b>Kode Pos :</b><br/>
    <b><?php echo $data['rajaongkir']['origin_details']['city_name'];?></b><br/>
      <?= $form->field($model2, 'POSTALCODEORIGIN')->textInput(['maxlength' => true])->label(false); ?>
  </div>

  <div class="col-xs-12 col-sm-6 col-md-6"><br/>
    <b><?php echo $data['rajaongkir']['destination_details']['city_name'];?></b><br/>
      <?= $form->field($model2, 'POSTALCODEDESC')->textInput(['maxlength' => true])->label(false); ?>
  </div>

  <div class="col-xs-12 col-sm-12">
   
      <br/>
      <?= $form->field($model2, 'KURIRKATEGORI')->textInput(['maxlength' => true])->label('KATEGORI'); ?>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6">
      <?= $form->field($model2, 'TOTALWEIGHT')->textInput(['maxlength' => true])->label('Gram'); ?>
       
        <input type="hidden" name="generate" value="<?php  echo Yii::$app->GenCom->Generate2();?>">
       <input type="hidden" name="id" value="<?php echo Yii::$app->user->identity->id;?>">
       <input type="hidden" name="username" value="<?php echo Yii::$app->user->identity->username;?>">
       <?= $form->field($model2, 'KURIR')->hiddenInput(['maxlength' => true])->label(false); ?>
      <?= $form->field($model2, 'KATEGORI_DETAIL')->hiddenInput(['maxlength' => true])->label(false); ?>
      <?= $form->field($model2, 'KATEGORI')->hiddenInput(['maxlength' => true])->label(false); ?>
      <?= $form->field($model2, 'ORIGINPROV')->hiddenInput(['maxlength' => true])->label(false); ?>
      <?= $form->field($model2, 'DESPROV')->hiddenInput(['maxlength' => true])->label(false); ?>
      
  </div>
</div>

     
       <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-plus fa-sm"></i> Next Step' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      <?php ActiveForm::end(); ?>
        <?php
      /*   use scotthuangzl\googlechart\GoogleChart;
          echo GoogleChart::widget( array('visualization' => 'Map',
          'packages'=>'map',//default is corechart
          'loadVersion'=>1,//default is 1.  As for Calendar, you need change to 1.1
          'data' => array(
          
          ['Indonesia', 'Indonesia: 247,424,598'],
          ['Brazil', 'Brazil: 201,032,714'],
          ['Pakistan', 'Pakistan: 186,134,000'],
          ['Nigeria', 'Nigeria: 173,615,000'],
          ['Bangladesh', 'Bangladesh: 152,518,015'],
          ['Russia', 'Russia: 146,019,512'],
          ['Japan', 'Japan: 127,120,000']
          ),
          'options' => array('title' => 'My Daily Activity',
          'showTip'=>true,
           )));
           */
        ?>
       
      </div>

      <div class="col-md-5">
      </div>
    </div>

    </div>






    <div class="col-sm-4" style="background-color:lavender;">
    <table>
        <tbody>
          <tr>
            <td><br/><img src="<?php echo Yii::$app->urlManager->baseUrl.'/images/user.jpg'; ?>" class="img-circle" alt="User Image" width="100"/></td><td></td>
            <td>&nbsp&nbsp<b>Soni Firdaus</b></td>
          </tr>
          <tr><td align="center"><font color="blue"><b>Edit Profil</b></td></tr>

        </tbody>
      </table>
   <div class="harga-form">

    <?php $form = ActiveForm::begin([
    'method' => 'post',
    'action' => ['site/price'],
    ]);?>
  

     <?php echo "<h2><b>Origin</b></h2>";?>

    <?php
  
     echo $form->field($model,'ORIGIN_PROVINCE')->dropDownList(ArrayHelper::map(Provinsi::find()->asArray()->all(), 'PROVINCE_ID', 'PROVINCE'),['id'=>'cat-id'] );
        
 
   
       echo $form->field($model, 'ORIGIN_CITY')->widget(\kartik\depdrop\DepDrop::classname(), [
      'options'=>['id'=>'subcat-id'],
      'pluginOptions'=>[
        'depends'=>['cat-id'],
        'placeholder'=>'Select...',
        'url'=>Url::to(['/site/get-kota'])
    ]
]);
    ?>
     <?php echo "<h2><b>Destination</b></h2>";?>

    <?php
      $Expired=Provinsi::find()->all();
        
      $listData=ArrayHelper::map($Expired,'PROVINCE_ID', 'PROVINCE');
    

     echo $form->field($model, 'DES_PROVINCE')->dropDownList($listData, 
             ['prompt'=>'-Choose a provinsi-',
              'onchange'=>'
                $.post( "index.php?r=site/lists&id='.'"+$(this).val(), function( data ) {
                  $( "select#harga-des_city" ).html( data );
                });
            '
           
            ])->label('Des Province'); 
     ?>
    <?php
    $dataPost=ArrayHelper::map(Kota::find()->all(), 'CITY_ID', 'CITY_NAME');
    echo $form->field($model, 'DES_CITY')
        ->dropDownList(
            $dataPost
        );
        ?>


    
    <?= $form->field($model, 'HARGA')->textInput() ?>
    <?php echo $form->field($model, 'KATEGORI')->dropDownList(['DOKUMENT' => 'DOKUMENT', 'FILE' => 'FILE', 'BARANG' => 'BARANG'],['prompt'=>'-Pilih Kategori-'],['label'=>'soni']); ?>
  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    
  </div>
</div>

</div>

<?php
$script= <<< JS
//here your right all your javascript stuff
$('#KURIR').change(function(){
var ZID=$(this).val();
$.get('index.php?r=site/harga',{ ID : ZID },function(data){
var data=$.parseJSON(data);
$('#kurir-harga').attr('value',data.HARGA);
$('#kurir-origincity').attr('value',data.ORIGINCITY);
$('#kurir-descity').attr('value',data.DESCITY);
$('#kurir-postalcodeorigin').attr('value',data.POSTALCODEORIGIN);
$('#kurir-postalcodedesc').attr('value',data.POSTALCODEDESC);
$('#kurir-kurirkategori').attr('value',data.KURIRKATEGORI);
$('#kurir-totalweight').attr('value',data.TOTALWEIGHT);
$('#kurir-originprov').attr('value',data.ORIGINPROV);
$('#kurir-desprov').attr('value',data.DESPROV);
$('#kurir-kurir').attr('value',data.KURIR);
$('#kurir-kategori_detail').attr('value',data.KATEGORI_DETAIL);
$('#kurir-kategori').attr('value',data.KATEGORI);
  });
});
JS;
$this->registerJs($script);
?>