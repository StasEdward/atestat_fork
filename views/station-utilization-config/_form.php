<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StationUtilizationConfig */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="station-utilization-config-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
      <div class="col-md-3"><?= $form->field($model, 'CM_NAME')->textInput(['maxlength' => true]) ?></div>
      <div class="col-md-3"><?= $form->field($model, 'STATION_FAMILY')->textInput(['maxlength' => true]) ?></div>
      <div class="col-md-3"><?= $form->field($model, 'STATION_NAME')->textInput(['maxlength' => true]) ?></div>
      <div class="col-md-3"><?= $form->field($model, 'REAL_STATION_NAME')->textInput(['maxlength' => true]) ?></div>
    </div>
    <div class="row">
        <div class="col-md-3"><?= $form->field($model, 'STATION_TYPE')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-3"><?= $form->field($model, 'THROUGHPUT_TYPE')->textInput() ?></div>
        <div class="col-md-3"><?= $form->field($model, 'STATION_COUNT')->textInput() ?></div>
        <div class="col-md-3"><?= $form->field($model, 'STATUS')->textInput() ?></div>
    </div>
    <div class="row">
        <div class="col-md-8"></div>
        <div class="col-md-4">
<div class="pull-right">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
