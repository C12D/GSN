<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Kurir */

$this->title = 'Create Kurir';
$this->params['breadcrumbs'][] = ['label' => 'Kurirs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kurir-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
