<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PHGUILOGIN */

$this->title = 'Create Phguilogin';
$this->params['breadcrumbs'][] = ['label' => 'Phguilogins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phguilogin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
