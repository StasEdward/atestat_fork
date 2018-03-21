<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IpponRfuPartNumbers */

$this->title = 'Create Ippon Rfu Part Numbers';
$this->params['breadcrumbs'][] = ['label' => 'Ippon Rfu Part Numbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ippon-rfu-part-numbers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
