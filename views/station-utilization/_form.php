<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StationUtilizationView */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="station-utilization-view-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'FACILITY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SHORT_STATION_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STATION_MASK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STATION_COUNT')->textInput() ?>

    <?= $form->field($model, 'WORK_MINUTES')->textInput() ?>

    <?= $form->field($model, 'TEST_DATE')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
