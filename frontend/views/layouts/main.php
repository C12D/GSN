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
            <!-- tambahan variable untuk template Author: --ptr.nov-- !-->
            <title><?= Html::encode($this->sideMenu) ?></title>
            <title><?= Html::encode($this->sideCorp) ?></title>
			<?php $this->head() ?>
		</head>
	<?php
			//---MENU SIDE--
			 $menuItems=[
									['label' => Icon::show('home').'Home', 'url' => ['/send']],
									['label' => Icon::show('home').'Send', 'url' => ['/order']],
									['label' => Icon::show('home').'Tracking', 'url' => ['/tracking']],
									['label' => Icon::show('home').'Affiliation', 'url' => ['/affiliation']],
									
									['label' => Icon::show('home').'Help', 'items' => [
											['label' => 'FAQ', 'url' => 'faq'],
											['label' => 'Helpdesk', 'url' => 'helpdesk'],
											['label' => 'Contact', 'url' => 'contact'],
										]
									],
									['label' => Icon::show('home').'Login', 'url' => ['/site/login']],
							];
				
	?>


<body class="hold-transition skin-blue">
    <?php $this->beginBody() ?>
		<div style="height:100px; background:yellow">
		</div>
		<header class="main-header ">
				<a  class="logo bg-blue" href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
												 <?php echo Icon::show('home'); ?>
					<!-- LOGO -->
					
				</a>	
				<?php
						NavBar::begin([
							'brandUrl' =>  '<!-- Sidebar toggle button-->
											<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
												<span class="sr-only">Toggle Navigation</span>
											</a>',
							'brandLabel' => '<!-- Sidebar toggle button-->
											<a href="#" class="navbar-toggle sidebar-toggle" data-toggle="offcanvas" role="button">
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
								'options' => ['class' => 'navbar-nav  navbar-left '],
								'items' => $menuItems,
								'activateParents' => true,
								'encodeLabels' => false,
							]);

			
						NavBar::end();
						
				?>				
		</header>
		
		 <aside class="main-sidebar bg-black-active " style="margin-top:150px">
			<section class="sidebar ">
			
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
			<div class="panel panel-default" style="margin-left: 2px; margin-right: 2px ;margin-bottom: 0">
					<?php
						echo $this->sideCorp;
						echo $this->sideMenu;
						echo $content;
					?>
			</div>
	   </div>
	   
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
