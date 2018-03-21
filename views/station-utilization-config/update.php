<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StationUtilizationConfig */

$this->title = 'Update Station Utilization Config: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Station Utilization Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="station-utilization-config-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
