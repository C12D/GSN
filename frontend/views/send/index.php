<?php
//use yii\helpers\Html;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\provinsi;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use backend\models\Kota;


//use backend\assets\AppAsset;  	/* CLASS ASSET CSS/JS/THEME Author: -ptr.nov-*/
//AppAsset::register($this);		/* INDEPENDENT CSS/JS/THEME FOR PAGE  Author: -ptr.nov-*/


$this->sideCorp = 'PT. Gosend';                   							/* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'gsn_send';                          				/* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Gosend - SEND'); 					/* title pada header page */
$this->params['breadcrumbs'][] = $this->title;              			/* belum di gunakan karena sudah ada list sidemenu, on plan next*/
?>
<?php $form = ActiveForm::begin(); ?>
<?php echo "<h2><b>Origin</b></h2>";?>

    <?php
 
    echo $form->field($provinsi,'PROVINCE')->dropDownList(ArrayHelper::map(Provinsi::find()->asArray()->all(), 'PROVINCE_ID', 'PROVINCE'),['id'=>'cat-id']	);
        
 
   
	     echo $form->field($kota, 'CITY_NAME')->widget(\kartik\depdrop\DepDrop::classname(), [
	    'options'=>['id'=>'subcat-id'],
	    'pluginOptions'=>[
        'depends'=>['cat-id'],
        'placeholder'=>'Select...',
        'url'=>Url::to(['/send/get-kota'])
    ]
]);
    ?>
    <?php echo "<h2><b>Destination</b></h2>";?>

    <?php
      $Expired=Provinsi::find()->all();
        
      $listData=ArrayHelper::map($Expired,'PROVINCE_ID', 'PROVINCE');
    //  echo $form->field($model, 'province')->dropDownList($listData, ['id'=>'id-province']);
   //  echo $form->field($model, 'provinsi')->dropDownList($listData);  

     echo $form->field($provinsi, 'PROVINCE')->dropDownList($listData, 
             ['prompt'=>'-Choose a provinsi-',
              'onchange'=>'
                $.post( "index.php?r=send/lists&id='.'"+$(this).val(), function( data ) {
                  $( "select#kota-city_name" ).html( data );
                });
            '
           
            ]); 
     ?>
    <?php
    $dataPost=ArrayHelper::map(Kota::find()->all(), 'CITY_ID', 'CITY_NAME');
    echo $form->field($kota, 'CITY_NAME')
        ->dropDownList(
            $dataPost
        );
        ?>
    <?php ActiveForm::end(); ?>