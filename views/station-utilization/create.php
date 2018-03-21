<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StationUtilizationView */

$this->title = 'Create Station Utilization View';
$this->params['breadcrumbs'][] = ['label' => 'Station Utilization Views', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="station-utilization-view-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
