<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Harga */

$this->title = 'Create Harga';
$this->params['breadcrumbs'][] = ['label' => 'Hargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="harga-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
