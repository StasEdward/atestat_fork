<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\IpponRfuPartNumbers */

$this->title = $model->indexr;
$this->params['breadcrumbs'][] = ['label' => 'Ippon Rfu Part Numbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ippon-rfu-part-numbers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->indexr], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->indexr], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'indexr',
            'part_number',
            'tx_start_freq',
            'tx_stop_freq',
            'rx_start_freq',
            'rx_stop_freq',
            'tx_high',
            'with_diplexer',
            'master_part_number',
            'tx_start_freq_2',
            'tx_stop_freq_2',
            'rx_start_freq_2',
            'rx_stop_freq_2',
        ],
    ]) ?>

</div>
