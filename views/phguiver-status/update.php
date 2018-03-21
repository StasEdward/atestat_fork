<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PhguiverStatus */

$this->title = 'Update Phguiver Status: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Phguiver Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="phguiver-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
