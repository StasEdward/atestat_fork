<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
/* @var $this yii\web\View */
/* @var $searchModel app\models\StationUtilizationViewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Station Utilization Views';
//$this->params['breadcrumbs'][] = $this->title;



if ($use_timer){
    //echo "will refresh";


    $fac_name = array(
        1  => "VCL",
        2  => "VCL",
        3  => "Flex",
        4  => "Flex",
    );

    $st_type = array(
        1  => "IP-20C",
        2  => "RFU-C",
        3  => "IP-20C",
        4  => "RFU-C",
    );


    if ($current_id == 4)
    {
        $current_id = 1;
    }
    else {
        $current_id = $current_id +1;
    }

    $btn_type = 'btn-primary';

    if($facility == 'VCL'){
        $btn_type = "btn-primary";
    }
    else{
        $btn_type = "btn-primary";
    }
    header('Refresh: 30; URL=http://atestat/station-utilization/index?facility='.$fac_name[$current_id].'&station_type='.$st_type[$current_id].'&use_timer=true&current_id='.$current_id.'');
}


?>
<div class="station-utilization-view-index">

    <div id="browse_app">
        <a class="btn btn-primary" href="/station-utilization/index?facility=VCL&station_type=IP-20C">VCL - IP-20C</a>
        <a class="btn btn-primary" href="/station-utilization/index?facility=VCL&station_type=RFU-C">VCL - RFU-C</a>
        <a class="btn btn-primary" href="/station-utilization/index?facility=Flex&station_type=IP-20C">Flex - IP-20C</a>
        <a class="btn btn-primary" href="/station-utilization/index?facility=Flex&station_type=RFU-C">Flex - RFU-C</a>
    </div>
    <div class="row">
        <p></p>
    </div>


<div class="row">
<section class="col-md-12">







<div class="box box-primary box-solid">
            <div class="box-header with-border">
                <i class="fa fa-microchip"></i>
              <h3 class="box-title"><b><?php echo $facility; ?>:</b>&emsp; <?php echo $station_type; ?> &emsp;Utilization level:</h3>&emsp; <i>Board</i>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

    <div class="row">
    <section class="col-md-4 connectedSortable ui-sortable">
        <!-- Production history-->
        <div class="box box-primary">
            <div class="box box-solid ">
                <div class="box-header with-border">
                    <i class="fa fa-microchip"></i>
                    <h4 class="box-title"><?php echo $Board_Full_array[1]; echo "&emsp;Stations: "; echo $N7_TRX_stations[0];?></h4>
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
                            'legend' => [
                                'enabled'  => false,
                            ],
                            'credits' => 'false',
                            'gridLineWidth' => 0,
                            'chart' => [
                                'borderWidth' => '0',
                                'backgroundColor' => '#FFFFFF',
                                'plotBackgroundColor' => '#FFFFFF',

                                'marginRight' => 10,
                                'marginTop' => 5,
                                'height' => 220,

                            ],
                            'plotOptions' => [
                                'column' => [
                                    'stacking' => 'percent'
                                ],
                                'series' => [
                                    'pointWidth' => 30
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
            <p class="text-center"><b>"<?php echo $Board_Full_array[1]; ?>" Throughput</b></p>
            <div class="col-sm-3">
                <p class="text-center"><b>Input</b></p>
                <p class="text-center"><b><?php echo $N7_TRX_totall_utiliz_uuts[0]["total_uuts"]; ?></b></p>
            </div>
            <div class="col-sm-6 box-title"  align="center">
                <img src="/images/right1600_2.png" style="width:80%">
            </div>
            <div class="col-sm-3">
                <p class="text-center"><b>Output</b></p>
                <p class="text-center"><b><?php echo $N7_TRX_totall_utiliz_uuts[0]["total_pass_uuts"]; ?></b></p>
            </div>
        </div>


    </section>

    <section class="col-md-4 connectedSortable ui-sortable">
        <!-- Production history-->
        <div class="box box-primary">
            <div class="box box-solid ">
                <div class="box-header with-border">
                    <i class="fa fa-microchip"></i>
                    <h4 class="box-title"><?php echo $Board_Full_array[2];  echo "&emsp;Stations: "; echo $N8_MB_stations[0];?></h4>
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
                            'legend' => [
                                'enabled'  => false,
                            ],

                            'credits' => 'false',
                            'gridLineWidth' => 0,
                            'chart' => [
                                'borderWidth' => '0',
                                'backgroundColor' => '#FFFFFF',
                                'plotBackgroundColor' => '#FFFFFF',

                                'marginRight' => 10,
                                'marginTop' => 5,
                                'height' => 220,

                            ],
                            'plotOptions' => [
                                'column' => [
                                    'stacking' => 'percent'
                                ],
                                'series' => [
                                    'pointWidth' => 30
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
        <div class="row">
            <p class="text-center"><b>"<?php echo $Board_Full_array[2]; ?>" Throughput</b></p>
            <div class="col-sm-3">
                <p class="text-center"><b>Input</b></p>
                <p class="text-center"><b><?php echo $N8_MB_totall_utiliz_uuts[0]["total_uuts"]; ?></b></p>
            </div>
            <div class="col-sm-6 box-title"  align="center">
                <img src="/images/right1600_2.png" style="width:80%">
            </div>
            <div class="col-sm-3">
                <p class="text-center"><b>Output</b></p>
                <p class="text-center"><b><?php echo $N8_MB_totall_utiliz_uuts[0]["total_pass_uuts"]; ?></b></p>
            </div>
        </div>


    </section>
    </div>


</div>
<!-- /.box-body -->
</div>


    <div class="box box-primary box-solid">
                <div class="box-header with-border">
                  <i class="fa fa-object-group"></i>
                  <h3 class="box-title"><b><?php echo $facility; ?>:</b>&emsp;<?php echo $station_type; ?> Utilization:</h3>&emsp; <i>System</i>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">


    <div class="row">

        <section class="col-md-3 connectedSortable ui-sortable">
            <!-- Production history-->
            <div class="box box-primary">
                <div class="box box-solid ">
                    <div class="box-header with-border">
                        <i class="fa fa-object-group"></i>
                        <h4 class="box-title"><?php echo $Board_Full_array[3];   echo "&emsp;Stations: "; echo $N3_CAL_stations[0]; ?></h4>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body border-radius-none">
                        <?=
                        //print_r($yeild_TOTALL_arr);
                        Highcharts::widget([
                            'scripts' => [
                                'highcharts-more',
                                'modules/exporting',
                                'themes/grid',
                            ],
                            'options' => [
                                'legend' => [
                                    'enabled'  => false,
                                ],

                                'credits' => 'false',
                                'gridLineWidth' => 0,
                                'chart' => [
                                    'borderWidth' => '0',
                                    'backgroundColor' => '#FFFFFF',
                                    'plotBackgroundColor' => '#FFFFFF',

                                    'marginRight' => 10,
                                    'marginTop' => 5,
                                    'height' => 220,

                                ],
                                'plotOptions' => [
                                    'column' => [
                                        'stacking' => 'percent'
                                    ],
                                    'series' => [
                                        'pointWidth' => 20
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
                                    'categories' => $N3_CAL_util_date,
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
                                        'data' => $N3_CAL_downtime,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[2]'),
                                    ],
                                    [
                                        'type' => 'column',
                                        'name' => 'Work time(%)',
                                        'data' =>$N3_CAL_utilization,
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
        <section class="col-md-3 connectedSortable ui-sortable">
            <!-- Production history-->
            <div class="box box-primary">
                <div class="box box-solid ">
                    <div class="box-header with-border">
                        <i class="fa fa-object-group"></i>
                        <h4 class="box-title"><?php echo $Board_Full_array[4];    echo "&emsp;Stations: "; echo $N3_ATP_stations[0]; ?></h4>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body border-radius-none">
                        <?=
                        //print_r($yeild_TOTALL_arr);
                        Highcharts::widget([
                            'scripts' => [
                                'highcharts-more',
                                'modules/exporting',
                                'themes/grid',
                            ],
                            'options' => [
                                'legend' => [
                                    'enabled'  => false,
                                ],
                                'credits' => 'false',
                                'gridLineWidth' => 0,
                                'chart' => [
                                    'borderWidth' => '0',
                                    'backgroundColor' => '#FFFFFF',
                                    'plotBackgroundColor' => '#FFFFFF',

                                    'marginRight' => 10,
                                    'marginTop' => 5,
                                    'height' => 220,

                                ],
                                'plotOptions' => [
                                    'column' => [
                                        'stacking' => 'percent'
                                    ],
                                    'series' => [
                                        'pointWidth' => 20
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
                                    'categories' => $N3_ATP_util_date,
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
                                        'data' => $N3_ATP_downtime,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[2]'),
                                    ],
                                    [
                                        'type' => 'column',
                                        'name' => 'Work time(%)',
                                        'data' =>$N3_ATP_utilization,
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
        <section class="col-md-3 connectedSortable ui-sortable">
            <!-- Production history-->
            <div class="box box-primary">
                <div class="box box-solid ">
                    <div class="box-header with-border">
                        <i class="fa fa-object-group"></i>
                        <h4 class="box-title"><?php echo $Board_Full_array[5];     echo "&emsp;Stations: "; echo $N4_stations[0]; ?></h4>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body border-radius-none">
                        <?=
                        //print_r($yeild_TOTALL_arr);
                        Highcharts::widget([
                            'scripts' => [
                                'highcharts-more',
                                'modules/exporting',
                                'themes/grid',
                            ],
                            'options' => [
                                'legend' => [
                                    'enabled'  => false,
                                ],

                                'credits' => 'false',
                                'gridLineWidth' => 0,
                                'chart' => [
                                    'borderWidth' => '0',
                                    'backgroundColor' => '#FFFFFF',
                                    'plotBackgroundColor' => '#FFFFFF',

                                    'marginRight' => 10,
                                    'marginTop' => 5,
                                    'height' => 220,

                                ],
                                'plotOptions' => [
                                    'column' => [
                                        'stacking' => 'percent'
                                    ],
                                    'series' => [
                                        'pointWidth' => 20
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
                                    'categories' => $N4_util_date,
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
                                        'data' => $N4_downtime,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[2]'),
                                    ],
                                    [
                                        'type' => 'column',
                                        'name' => 'Work time(%)',
                                        'data' =>$N4_utilization,
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
        <section class="col-md-3 connectedSortable ui-sortable">
            <!-- Production history-->
            <div class="box box-primary">
                <div class="box box-solid ">
                    <div class="box-header with-border">
                        <i class="fa fa-object-group"></i>
                        <h4 class="box-title"><?php echo $Board_Full_array[6];  echo "&emsp;Stations: "; echo $N13_stations[0];?></h4>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body border-radius-none">
                        <?=
                        //print_r($yeild_TOTALL_arr);
                        Highcharts::widget([
                            'scripts' => [
                                'highcharts-more',
                                'modules/exporting',
                                'themes/grid',
                            ],
                            'options' => [
                                'legend' => [
                                    'enabled'  => false,
                                ],

                                'credits' => 'false',
                                'gridLineWidth' => 0,
                                'chart' => [
                                    'borderWidth' => '0',
                                    'backgroundColor' => '#FFFFFF',
                                    'plotBackgroundColor' => '#FFFFFF',

                                    'marginRight' => 10,
                                    'marginTop' => 5,
                                    'height' => 220,

                                ],
                                'plotOptions' => [
                                    'column' => [
                                        'stacking' => 'percent'
                                    ],
                                    'series' => [
                                        'pointWidth' => 20
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
                                    'categories' => $N13_util_date,
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
                                        'data' => $N13_downtime,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[2]'),
                                    ],
                                    [
                                        'type' => 'column',
                                        'name' => 'Work time(%)',
                                        'data' =>$N13_utilization,
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
    <div class="row">
        <p class="text-center"><b>Throughput: "<?php echo $Board_Full_array[3]; ?> > <?php echo $Board_Full_array[6]; ?>"</b></p>
        <div class="col-sm-3">
            <p class="text-center"><b>Input</b></p>
            <p class="text-center"><b><?php echo $N3_CAL_totall_utiliz_uuts[0]["total_uuts"]; ?></b></p>
        </div>
        <div class="col-sm-6 box-title" align="center">
            <img src="/images/right1600_1.png" style="width:70%" >
        </div>
        <div class="col-sm-3" align="center">
            <p class="text-center"><b>Output</b></p>
            <p class="text-center"><b><?php echo $N13_totall_utiliz_uuts[0]["total_pass_uuts"]; ?></b></p>
        </div>
    </div>

</div>
<!-- /.box-body -->
</div>


</div>

</div>
