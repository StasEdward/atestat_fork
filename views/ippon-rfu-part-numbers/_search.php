<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IpponRfuPartNumbersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ippon-rfu-part-numbers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'indexr') ?>

    <?= $form->field($model, 'part_number') ?>

    <?= $form->field($model, 'tx_start_freq') ?>

    <?= $form->field($model, 'tx_stop_freq') ?>

    <?= $form->field($model, 'rx_start_freq') ?>

    <?php // echo $form->field($model, 'rx_stop_freq') ?>

    <?php // echo $form->field($model, 'tx_high') ?>

    <?php // echo $form->field($model, 'with_diplexer') ?>

    <?php // echo $form->field($model, 'master_part_number') ?>

    <?php // echo $form->field($model, 'tx_start_freq_2') ?>

    <?php // echo $form->field($model, 'tx_stop_freq_2') ?>

    <?php // echo $form->field($model, 'rx_start_freq_2') ?>

    <?php // echo $form->field($model, 'rx_stop_freq_2') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
