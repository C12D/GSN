<?php
use frontend\widgets\Alert;
use mdm\admin\components\MenuHelper;
use yii\helpers\Html;
use kartik\nav\NavX;
use kartik\sidenav\SideNav;
use yii\bootstrap\NavBar;
use kartik\icons\Icon;
use yii\widgets\Breadcrumbs;
//use frontend\assets\AppAsset;


/* @var $this \yii\web\View */
/* @var $content string */

//AppAsset::register($this);
dmstr\web\AdminLteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
	<?php
			//---MENU SIDE--
			 $menuItems[] = ['label' => Icon::show('home').'Home1', 'url' => ['/site/index1']];
			 $menuItems[] = ['label' => Icon::show('home').'Home2', 'url' => ['/site/index2']];
			 $menuItems[] = ['label' => Icon::show('home').'Home3', 'url' => ['/site/index3']];
			 $menuItems[] = ['label' => Icon::show('home').'Home4', 'url' => ['/site/index4']];
			$menuItems[] = ['label' => Icon::show('home').'Home5', 'url' => ['/site/index4']];
			 $menuItems[] = ['label' => Icon::show('home').'Home6', 'url' => ['/site/index4']];
	?>


<body class="hold-transition">
    <?php $this->beginBody() ?>
	<header class="main-header">
			<a  class="logo bg-red">
				<!-- LOGO -->
				Gosend
			</a>	
			<?php
					NavBar::begin([
					   //'brandLabel' => 'LukisonGroup',
						//'brandUrl' => Yii::$app->homeUrl,
						//-ptr.nov-
						'brandLabel' => '<!-- Sidebar toggle button-->
										<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
											<span class="sr-only">Toggle Navigation</span>
										</a>',
						'options' => [
							//Refrensi:bg-light-blue|bg-green|bg-yellow|bg-red|bg-aqua|bg-purple|bg-blue|bg-navy|bg-teal|bg-maroon|bg-black|bg-gray|bg-olive|bg-lime|bg-orange|bg-fuchsia
							'class' =>'navbar navbar-inverse navbar-cls-top',
							//'class' => 'navbar-inverse navbar-fixed-top',
						   //'class' =>  'navbar navbar-inverse navbar-static-top',
							//'class' => 'navbar-inverse navbar-static-top',
						   // 'class' => 'navbar-inverse navbar',
							// 'class' => 'navbar navbar-fixed-top',
							'role'=>'button','style'=>'margin-bottom: 0'
						],
					]);		
					echo NavX::widget([
							'options' => ['class' => 'navbar-nav  navbar-left'],
							'items' => $menuItems,
							'activateParents' => true,
							'encodeLabels' => false,
						]);

		
					NavBar::end();
					
			?>
	</header>
	
	 <aside class="main-sidebar">
		<section class="sidebar  ">
		
			<div class="user-panel">
				<div class="pull-left image">
					<img src="assets/img/find_user.png" class="user-image img-responsive"/>
				</div>
				<div class="pull-left info">
					<p><?php //echo $MainUserProfile; ?></p>
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>
			
			<?php			
				echo SideNav::widget([
							'items' => $menuItems,
							'encodeLabels' => false,
							//'heading' => $heading,
							//'type' => SideNav::TYPE_WARNING,
							'options' => ['class' => 'sidebar-nav  bg-black'],
						]);			
			?>
			
		</section>
	</aside>

	
   <div class="content-wrapper">
		akaak
   </div>
	<footer class="footer">
		<div class="container">
		<p class="pull-left">&copy; Gosend <?= date('Y') ?></p>
		<p class="pull-right"><?= Yii::powered() .' - Gosend' ?></p>
		</div>
	</footer>
		

	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 

    

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
