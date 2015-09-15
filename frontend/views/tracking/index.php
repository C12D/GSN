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


//use backend\assets\AppAsset;  	/* CLASS ASSET CSS/JS/THEME Author: -ptr.nov-*/
//AppAsset::register($this);		/* INDEPENDENT CSS/JS/THEME FOR PAGE  Author: -ptr.nov-*/


$this->sideCorp = 'PT. Gosend';                   							/* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'gsn_tracking';                          				/* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Gosend - Tracking '); 					/* title pada header page */
$this->params['breadcrumbs'][] = $this->title;              			/* belum di gunakan karena sudah ada list sidemenu, on plan next*/
?>