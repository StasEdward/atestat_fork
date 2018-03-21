<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IpponRfuPartNumbers */

$this->title = 'Update Ippon Rfu Part Numbers: ' . $model->indexr;
$this->params['breadcrumbs'][] = ['label' => 'Ippon Rfu Part Numbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->indexr, 'url' => ['view', 'id' => $model->indexr]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ippon-rfu-part-numbers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
