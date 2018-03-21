<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PhguiverStatus */

$this->title = 'Create Phguiver Status';
$this->params['breadcrumbs'][] = ['label' => 'Phguiver Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phguiver-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
