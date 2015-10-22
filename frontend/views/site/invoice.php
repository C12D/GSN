<div class="row">
<div class="col-sm-12">
<div class="col-sm-4"><img src="<?php echo Yii::$app->urlManager->baseUrl.'/images/TESLOGO.jpg'; ?>" width="200"><br/>
<b>PT.GOSEND</b><br/>
Ruko De Mansion Blok C No.12<br/>
jl. Jalur Sutera, Alam Sutera, Serpong<br/>
Tangerang Selatan<br/>
Tel : 021 – 3044 85 98/99<br/>
Fax : 021 – 3044 85 97
</div>
</div>
</div>
<br/><br/>
<h3><b>INVOICE DETAIL</b></h3>
<div class="row">
    <div class="col-sm-4" style="background-color:lavender;">  
    
     <b>Invoice #<?php echo $sql['G_ORDER'];?></b><br/>
     <b>Invoice Date: <?php echo $sql['G_PESAN'];?></b><br/></div><br/><br/><br/>

     <b>Invoiced To</b><br/>
    <?php echo $sql['NAMA_CUSTOMER'].'<br>';
          echo $sql['ALAMAT_CUSTOMER'].'<br>';

     ?>
  </div><br/><br/><br/>
    <table class="table" border="1">
    <thead>
      <tr>
        <th>NO</th>
        <th>KOTA ASAL</th>
        <th>KOTA TUJUAN</th>
        <th>KURIR</th>
        <th>KATEGORI</th>
        <th>BERAT</th>
        <th>HARGA</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    $no=1;
    foreach ($list as $key => $row) {
        
                    if($no%2==0) {
                    $bgcolor='#0efb89';
                    $color='#003780';
                    }else{
                    $bgcolor='#d9f204';
                    $color='#000000';
                    }
      ?>
      <tr style="background-color:<?php echo $bgcolor;?>;color:<?php echo $color;?>;">
        <td><?php echo $no;?></td>
        <td><?php echo $row['ORIGIN_CITY'];?></td>
        <td><?php echo $row['DES_CITY'];?></td>
        <td><?php echo $row['KURIR'];?></td>
        <td><?php echo $row['KATEGORI_KIRIM'];?></td>
        <td><?php echo $row['TOTAL_BERAT'];?></td>
        <td><?php echo number_format($row['HARGA']);?></td>
      </tr> 
      <?php 
      $no++;
      } ?>
      <tr style="background-color:#04eff2;"><td colspan="6" align="right">SubTotal</td><td><?php echo "Rp"." ". number_format($total[0]['total']);?></td></tr>
      <tr style="background-color:#04eff2;"><td colspan="6" align="right">PPN</td><td><?php echo "Rp"." ". number_format($total[0]['total']/100*10);?></td></tr>
       <tr style="background-color:#04eff2;"><td colspan="6" align="right">Total</td><td><?php echo "Rp"." ". number_format($total[0]['total']+$total[0]['total']/100*10);?></td></tr>
    </tbody>
  </table>
<h3><b>Silahkan Transfer Ke :</b></h3>
  <p>BCA</p>
  <p>Bank Account : PT. Gosend</p>
  <p>  Bank Account Number : 6040890333 </p>
   <p>Branch : Cikokol</p>  