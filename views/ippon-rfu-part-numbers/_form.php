<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IpponRfuPartNumbers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ippon-rfu-part-numbers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'indexr')->textInput() ?>

    <?= $form->field($model, 'part_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tx_start_freq')->textInput() ?>

    <?= $form->field($model, 'tx_stop_freq')->textInput() ?>

    <?= $form->field($model, 'rx_start_freq')->textInput() ?>

    <?= $form->field($model, 'rx_stop_freq')->textInput() ?>

    <?= $form->field($model, 'tx_high')->textInput() ?>

    <?= $form->field($model, 'with_diplexer')->textInput() ?>

    <?= $form->field($model, 'master_part_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tx_start_freq_2')->textInput() ?>

    <?= $form->field($model, 'tx_stop_freq_2')->textInput() ?>

    <?= $form->field($model, 'rx_start_freq_2')->textInput() ?>

    <?= $form->field($model, 'rx_stop_freq_2')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
