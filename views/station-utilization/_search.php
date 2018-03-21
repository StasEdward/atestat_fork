<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StationUtilizationViewSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="station-utilization-view-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'FACILITY') ?>

    <?= $form->field($model, 'SHORT_STATION_NAME') ?>

    <?= $form->field($model, 'STATION_MASK') ?>

    <?= $form->field($model, 'STATION_COUNT') ?>

    <?php // echo $form->field($model, 'WORK_MINUTES') ?>

    <?php // echo $form->field($model, 'TEST_DATE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
