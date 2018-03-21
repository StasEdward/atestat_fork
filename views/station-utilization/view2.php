<?php

use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StationUtilizationViewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Station Utilization Views';
$this->params['breadcrumbs'][] = $this->title;


?>

<!-- Tabs Above -->
<div class='tabs-x tabs-above tab-bordered tabs-krajee'>
    <ul id="myTab-5" class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#home-5" role="tab" data-toggle="tab">Home</a></li>
        <li><a href="#profile-5" role="tab-kv" data-toggle="tab">Profile</a></li>
            
    </ul>
    <div id="myTabContent-5" class="tab-content">
        <div class="tab-pane fade in active" id="home-5">



            <section class="col-md-4 connectedSortable ui-sortable">
                <!-- Production history-->
                <div class="box box-success">
                    <div class="box box-solid ">
                        <div class="box-header with-border">
                            <i class="fa fa-microchip"></i>
                            <h4 class="box-title">N7 TRX</h4>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body border-radius-none">
                            <?=
                            Highcharts::widget([
                                'scripts' => [
                                    'highcharts-more',
                                    'modules/exporting',
                                    'themes/grid',
                                ],
                                'options' => [

                                    'credits' => 'false',
                                    'gridLineWidth' => 0,
                                    'chart' => [
                                        'borderWidth' => '0',
                                        'backgroundColor' => '#FFFFFF',
                                        'plotBackgroundColor' => '#FFFFFF',

                                        'marginRight' => 10,
                                        'marginTop' => 5,
                                        'height' => 250,

                                    ],
                                    'plotOptions' => [
                                        'column' => [
                                            'stacking' => 'percent'
                                        ],
                                        'series' => [
                                            'pointWidth' => 40
                                        ],
                                    ],
                                    'title' => [
                                        'text' => null,
                                        'style' => [
                                            'color' => 'black',
                                            'fontWeight' => 'bold'
                                        ]
                                    ],
                                    'xAxis' => [
                                        'categories' => $N7_TRX_util_date,
                                        'labels' => [
                                            'color' => 'white',
                                        ],
                                    ],
                                    'yAxis' => [
                                        'title' => [
                                            'text' => 'Utilization (%)',
                                        ],
                                    ],

                                    'labels' => [
                                        'items' => [
                                            [
                                                'html' => 'Total test results',
                                                'style' => [
                                                    'left' => '50px',
                                                    'top' => '18px',
                                                    'color' => 'white',
                                                ],
                                            ],
                                        ],
                                    ],
                                    'series' => [
                                        [
                                            'type' => 'column',
                                            'name' => 'Downtime(%)',
                                            'data' => $N7_TRX_downtime,
                                            'color' => new JsExpression('Highcharts.getOptions().colors[2]'),
                                        ],
                                        [
                                            'type' => 'column',
                                            'name' => 'Work time(%)',
                                            'data' =>$N7_TRX_utilization,
                                            'color' => new JsExpression('Highcharts.getOptions().colors[1]'),
                                        ],
                                    ],
                                /*    'tooltip' => [
                                                   'enabled' => true,
                                                   'footerFormat' => true,
                                                   'formatter' => "js:function() {
                                                        return 'my special information';
                                                    }"
                                                ], */
                                ]
                            ]);  ?>
                        </div>
                    </div>
                </div>
                <!-- Production history-->

                <div class="row">
                    <h4 class="box-body">"N7 TRX" Throughput</h4>
                    <div class="col-sm-3"   align="right">
                        <h5 class="box-title"><b>Input</b></h5>
                        <h5 class="box-body"><?php echo $N7_TRX_totall_utiliz_uuts[0]["total_uuts"]; ?></h5>
                    </div>
                    <div class="col-sm-6 box-body">
                        <img src="/images/right1600.png" style="width:100%">
                    </div>
                    <div class="col-sm-3">
                        <h5 class="box-title"   align="left"><b>Output</b></h5>
                        <h5 class="box-body"><?php echo $N7_TRX_totall_utiliz_uuts[0]["total_pass_uuts"]; ?></h5>
                    </div>
                </div>

            </section>

            <section class="col-md-4 connectedSortable ui-sortable">
                <!-- Production history-->
                <div class="box box-success">
                    <div class="box box-solid ">
                        <div class="box-header with-border">
                            <i class="fa fa-microchip"></i>
                            <h4 class="box-title">N8 MB</h4>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body border-radius-none">
                            <?=
                            Highcharts::widget([
                                'scripts' => [
                                    'highcharts-more',
                                    'modules/exporting',
                                    'themes/grid',
                                ],
                                'options' => [

                                    'credits' => 'false',
                                    'gridLineWidth' => 0,
                                    'chart' => [
                                        'borderWidth' => '0',
                                        'backgroundColor' => '#FFFFFF',
                                        'plotBackgroundColor' => '#FFFFFF',

                                        'marginRight' => 10,
                                        'marginTop' => 5,
                                        'height' => 250,

                                    ],
                                    'plotOptions' => [
                                        'column' => [
                                            'stacking' => 'percent'
                                        ],
                                        'series' => [
                                            'pointWidth' => 40
                                        ],
                                    ],
                                    'title' => [
                                        'text' => null,
                                        'style' => [
                                            'color' => 'black',
                                            'fontWeight' => 'bold'
                                        ]
                                    ],
                                    'xAxis' => [
                                        'categories' => $N8_MB_util_date,
                                        'labels' => [
                                            'color' => 'white',
                                        ],
                                    ],
                                    'yAxis' => [
                                        'title' => [
                                            'text' => 'Utilization (%)',
                                        ],
                                    ],

                                    'labels' => [
                                        'items' => [
                                            [
                                                'html' => 'Total test results',
                                                'style' => [
                                                    'left' => '50px',
                                                    'top' => '18px',
                                                    'color' => 'white',
                                                ],
                                            ],
                                        ],
                                    ],
                                    'series' => [
                                        [
                                            'type' => 'column',
                                            'name' => 'Downtime(%)',
                                            'data' => $N8_MB_downtime,
                                            'color' => new JsExpression('Highcharts.getOptions().colors[2]'),
                                        ],
                                        [
                                            'type' => 'column',
                                            'name' => 'Work time(%)',
                                            'data' =>$N8_MB_utilization,
                                            'color' => new JsExpression('Highcharts.getOptions().colors[1]'),
                                        ],
                                    ],
                                /*    'tooltip' => [
                                                   'enabled' => true,
                                                   'footerFormat' => true,
                                                   'formatter' => "js:function() {
                                                        return 'my special information';
                                                    }"
                                                ], */
                                ]
                            ]);  ?>
                        </div>
                    </div>
                </div>
                <!-- Production history-->


            </section>



        </div>
        <div class="tab-pane fade" id="profile-5"><p>...</p></div>
    </div>
</div>
