<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Phostestglobaltest;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PhostestglobaltestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Phostestglobaltests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phostestglobaltest-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Phostestglobaltest', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'FACILITY',
                'filter'=> Phostestglobaltest::getFacility(),
            ],
            [
                'attribute'=>'STATIONID',
                'filter'=> Phostestglobaltest::getStationID(),
            ],
            [
                'attribute'=>'UUTNAME',
                'filter'=> Phostestglobaltest::getUUTName(),
            ],
            [
                'attribute'=>'PARTNUMBER',
                'filter'=> Phostestglobaltest::getPartNumber(),
            ],
            //'SERIALNUMBER',
            //'TECHNAME',
            'TESTDATE',
            'TIMESTART',
            'TIMESTOP',
            'UUTPLACE',
            //'TESTMODE',
            //'GLOBALRESULT',
            //'INDEXRANGE',
            //'VERSIONS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
