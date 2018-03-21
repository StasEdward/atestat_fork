<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PhguiverStatusSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phguiver-status-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'STATION_ID') ?>

    <?= $form->field($model, 'PHGUI_VERSION') ?>

    <?= $form->field($model, 'STATION_IP') ?>

    <?= $form->field($model, 'FACILITY_NAME') ?>

    <?php // echo $form->field($model, 'PHGUI_PATH') ?>

    <?php // echo $form->field($model, 'LAST_DB_UPDATE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
