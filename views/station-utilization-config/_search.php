<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StationUtilizationConfigSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="station-utilization-config-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'CM_NAME') ?>

    <?= $form->field($model, 'STATION_FAMILY') ?>

    <?= $form->field($model, 'STATION_NAME') ?>

    <?= $form->field($model, 'REAL_STATION_NAME') ?>

    <?php // echo $form->field($model, 'STATION_TYPE') ?>

    <?php // echo $form->field($model, 'THROUGHPUT_TYPE') ?>

    <?php // echo $form->field($model, 'STATUS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
