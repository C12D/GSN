<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Zip */

$this->title = 'Create Zip';
$this->params['breadcrumbs'][] = ['label' => 'Zips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zip-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
