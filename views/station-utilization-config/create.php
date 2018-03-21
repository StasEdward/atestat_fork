<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StationUtilizationConfig */

$this->title = 'Create Station Utilization Config';
$this->params['breadcrumbs'][] = ['label' => 'Station Utilization Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="station-utilization-config-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
