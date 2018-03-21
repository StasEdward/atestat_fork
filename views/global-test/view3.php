<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\grid\GridView;
use kartik\dynagrid\Module;
use \yii\helpers\ArrayHelper;
use app\models\TestResultsController;
use yii\helpers\Url;
use yii\web\UrlManager;
/* @var $this yii\web\View */
/* @var $model app\models\GlobalTest */

$this->title = 'Test result for S/N '.$model->SERIALNUMBER;
$this->params['breadcrumbs'][] = ['label' => 'Global Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->SERIALNUMBER;

$this->assetBundles['yii\bootstrap\BootstrapAsset'] = new yii\web\AssetBundle;
?>
<html lang="en-US">
<head>

<link href="/assets/f0367608/css/bootstrap.css" rel="stylesheet">
<link href="/assets/35a94b8e/css/kv-grid.css" rel="stylesheet">
<link href="/assets/629123f7/dist/css/bootstrap-dialog.css" rel="stylesheet">
<link href="/assets/35a94b8e/css/jquery.resizableColumns.css" rel="stylesheet">
<link href="/assets/a4631ff4/css/font-awesome.min.css" rel="stylesheet">
<link href="/assets/cd45ef4b/css/ionicons.min.css" rel="stylesheet">
<link href="/assets/83d292e6/css/AdminLTE.min.css" rel="stylesheet">
<link href="/assets/83d292e6/css/skins/_all-skins.min.css" rel="stylesheet">
<link href="/assets/83d292e6/css/bootstrap-tabs-x.min.css" rel="stylesheet">
<link href="/css/site.css" rel="stylesheet">

<body class="skin-blue sidebar-mini">


<div class="global-test-view">
    <?PHP
    $start_date = new DateTime($model->TIMESTOP,new DateTimeZone('GMT'));
    $end_date = new DateTime($model->TIMESTART,new DateTimeZone('GMT'));
    $interval = $end_date->diff($start_date);
    $hours   = $interval->format('%h');
    $minutes = $interval->format('%i');
    $seconds = $interval->format('%s');
    $interval = $hours * 60 + $minutes;

    //echo (int)($interval).'.'. $seconds  .' min' ;
    ?>
    <?=  DetailView::widget([
        'model' => $model,
        'mode' => 'view',
        'bordered' => false,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'attributes' => [
            [
                'group'=>true,
                'label'=>'Identification Information',
                'rowOptions'=>['class'=>'default']
            ],
            [
                'columns' => [
                    [
                        'attribute'=>'PARTNUMBER',
                        'label'=>'Part Number',
                        'valueColOptions'=>['style'=>'width:25%']
                    ],
                    [
                        'attribute'=>'UUTNAME',
                        'label'=>'UUT Name',
                        'format'=>'raw',
                        'value'=>$model->UUTNAME,
                        'valueColOptions'=>['style'=>'width:25%'],
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute'=>'STATIONID',
                        'label'=>'Station ID',
                        'valueColOptions'=>['style'=>'width:25%'],
                    ],
                    [
                        'attribute'=>'TESTMODE',
                        'label'=>'Test Mode',
                        'format'=>'raw',
                    //    'value'=> $model->TESTMODE === 'Test' ? '<span class="label label-warning">'.$model->TESTMODE.'</span>' : '<span class="label label-danger">'.$model->TESTMODE.'</span>',
                        'value' => '<img src='.Url::to('@web/images/'.$model->TESTMODE.'.gif').'> '.$model->TESTMODE,
                        'valueColOptions'=>['style'=>'width:25%'],
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute'=>'FACILITY',
                        'label'=>'Facility',
                        'valueColOptions'=>['style'=>'width:25%'],
                    ],
                    [
                        'attribute'=>'GLOBALRESULT',
                        'label'=>'Test Result',
                        'format'=>'raw',
                        'value'=> $model->GLOBALRESULT === 'Pass' ? '<span class="label label-success">'.$model->GLOBALRESULT.'</span>' : (($model->GLOBALRESULT === 'Fail' ) ?'<span class="label label-danger">'.$model->GLOBALRESULT.'</span>' : '<span class="label label-warning">'.$model->GLOBALRESULT.'</span>'),
                        'valueColOptions'=>['style'=>'width:25%'],
                    ],
                ],
            ],

            [
                'group'=>true,
                'label'=>'Test Details',
                'rowOptions'=>['class'=>'default'],
            ],
            [
                'columns' => [
                    [
                        'attribute'=>'TESTDATE',
                        'label'=>'Test Date',
                        'format'=>'date',
                        'type'=>DetailView::INPUT_DATE,
                        'valueColOptions'=>['style'=>'width:30%']
                    ],
                    [
                        'attribute'=>'TIMESTART',
                        'label'=>'Test Start',
                        'format'=>'raw',
                        'value'=>$model->TIMESTART ,
                        'type'=>DetailView::INPUT_SWITCH,
                        'valueColOptions'=>['style'=>'width:30%']
                    ],
                ]
            ],
            [
                'columns' => [
                    [
                        'attribute'=>'TECHNAME',
                        'label'=>'Tech Name',
                        'format'=>'raw',
                        'value'=>$model->TECHNAME,
                        'type'=>DetailView::INPUT_SELECT2,

                        'valueColOptions'=>['style'=>'width:30%']
                    ],
                    [
                        'attribute'=>'TIMESTOP',
                        'label'=>'Test Stop',
                        'format'=>'raw',
                        'type'=>DetailView::INPUT_SWITCH,
                        'value'=>$model->TIMESTOP,
                        'valueColOptions'=>['style'=>'width:30%']
                    ],
                ]
            ],
            [
                'columns' => [
                    [
                        'attribute'=>'VERSIONS',
                        'label'=>'Versions',
                        'format'=>'raw',
                        'value'=>'<span class="text-justify"><em>' . $model->VERSIONS . '</em></span>',
                        'options'=>['rows'=>4]
                    ],
                    [
                        'attribute'=>'TIMESTOP',
                        'label'=>'Test Time',
                        'format'=>'raw',
                        'type'=>DetailView::INPUT_SWITCH,
                        'value'=> (int)($interval).'.'. $seconds  .' min',
                        'valueColOptions'=>['style'=>'width:30%']
                    ],

                ],
            ],
        ],


    ]); ?>

    <?=  GridView::widget([
        'dataProvider'=> $dataProvider,
        'bootstrap' => true,
        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'pjax'=>true, // pjax is set to always true for this demo
        'toolbar'=> [
            '{export}',
        ],
        'export'=>[
            'fontAwesome'=>true
        ],
        'bordered'=>false,
        'striped'=>true,
        'condensed'=>true,
        'responsive'=>true,
        'hover'=>true,
        'panel'=>[
            'type'=>GridView::TYPE_PRIMARY,
            'heading'=>  Html::tag('i', Html::encode(' S/N: '.$model->SERIALNUMBER), ['class' => 'glyphicon glyphicon-list']),
        ],
        'persistResize'=>false,
        'responsive'=>true,
        'hover'=>true,
        'rowOptions' => function ($model, $key, $index, $grid) {
                        //return ['id' => $model['id'], 'onclick' => 'location.href="view?id="+(this.id);', 'target' => '_blank', 'onmouseover' => '', 'style' => 'cursor: pointer;'];
                        //$URL = "https://www.linkedin.com/cws/share?mini=true&amp;url=view?id='.$model["id"].'";
                        return ['id' => $model['id'], 'onmouseover' => '', 'style' => 'cursor: pointer;', 'onclick' => 'window.open("/global-test/view3?id='.$model["TESTNAME"].'", "popup", "height=770,width=1200, menubar=no, resizable=yes,scrollbars=yes,status=1, top=10, left=10");'];
                        // "window.open('/images/foo.jpg', 'PICTURE', 'width=500,height=300');"
                        // http://atestat/global-test/view?id=
                        //http://atestat/global-test/&view?id==2026123
                    //     return ['id' => $model['id'], 'onclick' => 'alert(this.id);'];
                },


        'columns' => [
            [
                'attribute'=>'TEST_ID',
                'label' => '#',
                'format'=>'raw',
            ],
            'TESTNAME',
            [
                'attribute'=>'MINRANGE',
                'label' => 'Min',
                'format'=>'raw',
//                'width'=>'100px',
//                'contentOptions' => ['style'=>'text-align:center'],
            ],
            'RESULT',
            [
                'attribute'=>'MAXRANGE',
                'label' => 'Max',
                'format'=>'raw',
//                'width'=>'150px',
            ],
            'UNITS',
            [
                'attribute'=>'TIMEOFTEST',
                'value'=>function ($model, $key, $index, $widget) {
                    //$shortTime = date_create($model->TIMEOFTEST);
                    return date_format(date_create($model->TIMEOFTEST), 'i:s');
                },
//                'contentOptions' => ['style'=>'text-align:center'],
                'label' => 'Test Time',
                'format'=>'raw',
            ],
            [
                'attribute'=>'RESULT',
                'value'=>function ($model, $key, $index, $widget) {
                    $pass_or_fail = $model->TESTSTATUS;
                    if($pass_or_fail == 'Fail')
                    return "<span class='label label-danger'> " . $model->TESTSTATUS . '</span>';
                    else if ($pass_or_fail == 'Error')
                    return "<span class='label label-warning'> " . $model->TESTSTATUS . '</span>';
                    else
                    return "<span class='label label-success'> " . $model->TESTSTATUS . '</span>';
                },
                'filterInputOptions'=>['placeholder'=>'Any result'],
                'vAlign'=>'middle',
                'format'=>'raw',
            ],

            [
                'attribute'=>'Stat',
                'value'=>function ($model, $key, $index, $widget) {
                    $test_type = $model->TEST_TYPE;
                    if(($test_type == 'Max') OR ($test_type == 'MinMax') OR ($test_type == 'Min'))
                        return "<span class='glyphicon glyphicon-stats'></span>";
                    else
                        return "";


                },
//                'filterInputOptions'=>['placeholder'=>'Any result'],
                'vAlign'=>'middle',
                'format'=>'raw',
            ],
            [
            //    'attribute'=>'Graph',
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'contentOptions'=>['style'=>'max-width: 50px;'],
                'buttons' => [
                    'view' => function ($url,$model) {
                        if($model->GRAPH_ID <> '0'){
                            return  \yii\bootstrap\Modal::widget([
                                'id' => 'showModalButton'.$model->GRAPH_ID,
                                'clientOptions' => false,
                                'toggleButton' => [
                                    'label' => null,
                                    'class' => 'glyphicon glyphicon-stats',
                                    'tag' => 'a',
                                    'data-toggle' => 'modal',
                                    'data-target' => '#showModalButton'.$model->GRAPH_ID,
                                    'href' => Url::toRoute(['/traces-list/view?id='.$model->GRAPH_ID]),
                                    //'href' => Url::toRoute(['/traces-list/view?id='.$model->GRAPH_ID.'&mask_name='.$model->Y_AXIS]),
                                ],
                            ]);
                            }
                            //  return Html::a('<span class="showModalButton glyphicon glyphicon-equalizer"></span>', Url::base().'/traces-list/view?id='.$model->GRAPH_ID);
                            else
                            return "";
                        },
                    ],
                ],
            ],
        ]); ?>
    </div>
</body>
</html>
