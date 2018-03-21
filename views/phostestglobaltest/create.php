<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Phostestglobaltest */

$this->title = 'Create Phostestglobaltest';
$this->params['breadcrumbs'][] = ['label' => 'Phostestglobaltests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phostestglobaltest-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
