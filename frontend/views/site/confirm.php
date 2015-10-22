<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use backend\models\Provinsi;
use backend\models\Kota;
use backend\models\Expired;
use backend\models\Kurir;
use yii\helpers\ArrayHelper;
use kartik\widgets\ActiveForm;
use yii\widgets\pjax;
use yii\data\ArrayDataProvider;   
use kartik\grid\GridView;
use common\components\GenerateComponent;
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
    <h3><b>LIST DETAIL</b></h3>
    
     
      <table class="table">
    <thead>
      <tr>
        <th>KOTA ASAL</th>
        <th>KOTA TUJUAN</th>
        <th>KURIR</th>
        <th>KATEGORI</th>
        <th>BERAT</th>
        <th>HARGA</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($sql as $key => $row) {
      ?>
      <tr class="info">
        <td><?php echo $row['ORIGIN_CITY'];?></td>
        <td><?php echo $row['DES_CITY'];?></td>
        <td><?php echo $row['KURIR'];?></td>
        <td><?php echo $row['KATEGORI_KIRIM'];?></td>
        <td><?php echo $row['TOTAL_BERAT'];?></td>
        <td><?php echo $row['HARGA'];?></td>
      </tr> 
      <?php } ?>
      <tr class="success"><td colspan="5" align="right">SubTotal</td><td><?php echo "Rp"." ". number_format($total[0]['total']);?></td></tr>
      <tr class="success"><td colspan="5" align="right">PPN</td><td><?php echo "Rp"." ". number_format($total[0]['total']/100*10);?></td></tr>
       <tr class="success"><td colspan="5" align="right">Total</td><td><?php echo "Rp"." ". number_format($total[0]['total']+$total[0]['total']/100*10);?></td></tr>
    </tbody>
  </table>
   
   
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;

      <div class="col-md-5">
      <h3><b>Silahkan Transfer Ke :</b></h3><br/>
  <p>BCA</p>
  <p>Bank Account : PT. Gosend</p>
  <p>  Bank Account Number : 6040890333 </p>
   <p>Branch : Cikokol</p>
      </div>
    </div>
<center><?= Html::a('<i class="fa fa-print fa-sm"></i> CETAK INVOICE', ['pdf','id'=>$queryorder[0]['G_ORDER']], ['class' => 'btn btn-success btn-md','target'=> '_blank']) ?><center><br/>
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

