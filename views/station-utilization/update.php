<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StationUtilizationView */

$this->title = 'Update Station Utilization View: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Station Utilization Views', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="station-utilization-view-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
