<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PhguiverStatus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phguiver-status-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'STATION_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PHGUI_VERSION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STATION_IP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FACILITY_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PHGUI_PATH')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LAST_DB_UPDATE')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
