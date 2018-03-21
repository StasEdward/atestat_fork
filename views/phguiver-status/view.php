<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PhguiverStatus */

$this->title = $model->STATION_ID.' at '.$model->FACILITY_NAME ;
$this->params['breadcrumbs'][] = ['label' => 'Phguiver Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phguiver-status-view">



    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
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
            'ID',
            'STATION_ID',
            'PHGUI_VERSION',
            'STATION_IP',
            'FACILITY_NAME',
            'PHGUI_PATH',
            'LAST_DB_UPDATE',
        ],
    ]) ?>

</div>
