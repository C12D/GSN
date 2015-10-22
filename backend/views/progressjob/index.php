<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProgressjobSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Progressjobs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="progressjob-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Progressjob', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    

     <?php

    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],

            'PROGRESS_ID',
            'USER_ID',
            'MODUL',
            'JUDUL',
        ['class' => 'yii\grid\ActionColumn'],
    ];
   echo  GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
         'pjax'=>true,
        'panel' => [
            'heading'=>'<h3 class="panel-title">'. Html::encode($this->title).'</h3>',
            'type'=>'primary',
            'showFooter'=>false,
        ],  
    ]); ?>

</div>
