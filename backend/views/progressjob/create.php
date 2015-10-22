<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Progressjob */

$this->title = 'Create Progressjob';
$this->params['breadcrumbs'][] = ['label' => 'Progressjobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="progressjob-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
