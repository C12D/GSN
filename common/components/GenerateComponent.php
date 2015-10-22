<?php
namespace common\components;
use yii\base\Component;
use Yii;
use backend\models\Order;
use yii\helpers\Html;
date_default_timezone_set('asia/jakarta');
class GenerateComponent extends Component {


    public function Generate()
	{
	    $sql = 'SELECT * FROM t0002 ORDER BY G_ORDER DESC limit 1';
        $model = Order::findBySql($sql)->one();
       if($model=="")
        {	   
		return "ORD".".".date('Y-d-m')." "."000000";
		}
		else
		{
        foreach($model as $dat)
        return  substr($dat,0,-1);
	   }
   }
   public function Generate0()
  {
      $sql = 'SELECT * FROM t0002 ORDER BY G_ORDER DESC limit 1';
        $model = Order::findBySql($sql)->one();
       if($model=="")
        {    
    return "ORD".".".date('Y-d-m')." "."000000";
    }
    else
    {
        foreach($model as $dat)
        return  $dat;
     }
   }
   public function Generate1()
	{
	    $sql = 'SELECT * FROM t0002 ORDER BY G_ORDER DESC limit 1';
        $model = Order::findBySql($sql)->one();
       if($model=="")
        {	   
		return "";
		}
		else
		{
        foreach($model as $dat)
        return  substr($dat,-1);
	   }
   }
   function Generate2()
   {
    $f=$this->Generate1()+1;
    $generate= $this->Generate().$f;
    return $generate;
   }
   function Date()
   {
    $date=date('Y-d-m').".".date('H:i:s');
    return $date;
   }
   function total()
   {
    
   }
   }