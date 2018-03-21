<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\GlobalTest;


use kartik\grid\GridView;

use kartik\dynagrid\Module;
/* @var $this yii\web\View */
/* @var $searchModel app\models\GlobalTestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Global Tests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="global-test-index">
    <?php

    if ((Yii::$app->user->identity->username <> 'admin') AND (Yii::$app->user->identity->username <> 'Ceragon'))
        $facility_aray = array(Yii::$app->user->identity->username => Yii::$app->user->identity->username);
    else
        $facility_aray = array('Ceragon' => 'Ceragon', 'Flex' => 'Flex', 'VCL' => 'VCL', 'JBL' => 'JBL', 'Ionics' => 'Ionics');

    $result_value= ['0' => 'Pass', '1' => 'Fail'];
    $gridColumns = [
        [
            'class' => 'yii\grid\SerialColumn'
        ],

        [
            'contentOptions' => ['style'=>'text-align:center'],
            'attribute'=>'FACILITY',
            'label' => 'Facility',
            'vAlign'=>'middle',
            'width'=>'100px',
            'value'=>function ($model, $key, $index, $widget) {
                return $model->FACILITY;
            },
            //    'filterType'=>GridView::FILTER_SELECT2,
            //    'filter'=>ArrayHelper::map(GlobalTest::find()->orderBy(['STATIONID'  => SORT_ASC])->indexBy('STATIONID')->asArray()->all(), 'STATIONID', 'STATIONID'),
            //    'filterWidgetOptions'=>[
            //        'pluginOptions'=>['allowClear'=>true],
            //    ],
            //    'filterInputOptions'=>['placeholder'=>'Any station'],
            'format'=>'raw',
            'filter'=>$facility_aray,

        ],

        [
            'contentOptions' => ['style'=>'text-align:center'],
            'attribute'=>'STATIONID',
            'label' => 'Station ID',
            'vAlign'=>'middle',
            'width'=>'200px',
            'format'=>'raw',
            'value'=>function ($model, $key, $index, $widget) {
                return $model->STATIONID;
            },


        /*    'filterType'=>GridView::FILTER_SELECT2,
                        'filter'=>ArrayHelper::map(GlobalTest::find()->orderBy('STATIONID')->asArray()->all(), 'STATIONID', 'STATIONID'),
                        'filterWidgetOptions'=>[
                            'pluginOptions'=>['allowClear'=>true],
                        ],
                        'filterInputOptions'=>['placeholder'=>'Any station'],
*/
                'filterType'=>GridView::FILTER_SELECT2,

                'filter'=> ArrayHelper::map(GlobalTest::find()->select('STATIONID')->distinct()->orderBy('STATIONID')->asArray()->all(), 'STATIONID', 'STATIONID'),

                //'filter'=>ArrayHelper::map(GlobalTest::find()->orderBy(['STATIONID'  => SORT_ASC])->indexBy('STATIONID')->asArray()->all(), 'STATIONID', 'STATIONID'),
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                //    'presetDropdown' => true,
                ],
                'filterInputOptions'=>['placeholder'=>'Any station'],

        ],

        //  'UUTNAME',
        [
            'attribute'=>'UUTNAME',
            'label' => 'UUT Name',
            'vAlign'=>'middle',
            'contentOptions' => ['style'=>'text-align:center'],
            'width'=>'150px',
            'value'=>function ($model, $key, $index, $widget) {
                return $model->UUTNAME;
            },
        ],



        //  'PARTNUMBER',
        [
            'attribute'=>'PARTNUMBER',
            'label' => 'Part Number',
            'width'=>'150px',
            'vAlign'=>'middle',
            'contentOptions' => ['style'=>'text-align:center'],
            //    'width'=>'150px',
            'value'=>function ($model, $key, $index, $widget) {
                return $model->PARTNUMBER;
            },
        ],

        //  'SERIALNUMBER',
        [
            'attribute'=>'SERIALNUMBER',
            'vAlign'=>'middle',
            'label' => 'S/Number',

            'contentOptions' => ['style'=>'text-align:center'],
            //  'width'=>'100px',
            'value'=>function ($model, $key, $index, $widget) {
                return $model->SERIALNUMBER;
            },
        //    'group'=>true,  // enable grouping
        ],
        // 'techname',
        //'testdate',
        [
            'attribute'=>'TESTDATE',
            'vAlign'=>'middle',
            'label' => 'Test Date',
            'width'=>'120px',
            'format'=>['date', 'dd.MM.Y'],
        //    'format'=>'raw',
                   'width'=>'170px',
    //        'filterType'=>GridView::FILTER_DATE,
    //        'filterWidgetOptions'=>[
    //        'pluginOptions'=>['format'=>'dd.M.YYYY']
    //    ],
            'value'=>function ($model, $key, $index, $widget) {
                return $model->TESTDATE;
            },

            //  'xlFormat'=>"dd\\, mmm\\, \\-yyyy",
            'contentOptions' => ['style'=>'text-align:center'],
        ],

        [
            'attribute'=>'TIMESTART',
            'vAlign'=>'middle',
            'label' => 'Test Start',
            'width'=>'120px',
            'value'=>function ($model, $key, $index, $widget) {
                return $model->TIMESTART;
            },

            'format'=>['date', 'HH:mm:ss'],
            //  'xlFormat'=>"hh:mm",
            'contentOptions' => ['style'=>'text-align:center'],
        ],
    /*    [
            'attribute'=>'TIMESTOP',
            'vAlign'=>'middle',
            'label' => 'Test Start',
            'width'=>'120px',
            'value'=>function ($model, $key, $index, $widget) {
                return $model->TIMESTOP;
            },

            'format'=>['date', 'HH:mm:ss'],
            //  'xlFormat'=>"hh:mm",
            'contentOptions' => ['style'=>'text-align:center'],
        ],
*/
        [
            'attribute'=>'TIMESTOP',
            'vAlign'=>'middle',
            'label' => 'Test Time',
            'width'=>'120px',
            'value'=>function ($model, $key, $index, $widget) {
                $end_date = new DateTime($model->TIMESTART,new DateTimeZone('GMT'));
                $start_date = new DateTime($model->TIMESTOP,new DateTimeZone('GMT'));
                $interval = $end_date->diff($start_date);
                $hours   = $interval->format('%h');
                $minutes = $interval->format('%i');
                $seconds = $interval->format('%s');
                $interval = $hours * 60 + $minutes;
                return (int)($interval).'.'. $seconds  .' min' ;
            },
            'contentOptions' => ['style'=>'text-align:center'],
        ],

        // 'timestart',
        // 'timestop',
        [
            'attribute'=>'UUTPLACE',
            'vAlign'=>'middle',
            'label' => 'Place',
            'width'=>'75px',
            'value'=>function ($model, $key, $index, $widget) {
                return $model->UUTPLACE;
            },
            //  'xlFormat'=>"hh:mm",
            'contentOptions' => ['style'=>'text-align:center'],
        ],


        // 'testmode',
        //'globalresult',
        [
            //  'class' => '\kartik\grid\BooleanColumn',
            //  'trueLabel' => 'Pass',
            //  'falseLabel' => 'Fail',
            'width'=>'100px',
            'label' => 'Result',
            'attribute'=>'GLOBALRESULT',
            'value'=>function ($model, $key, $index, $widget) {
                $pass_or_fail = $model->GLOBALRESULT;
                if($pass_or_fail == 'Fail')
                return "<span class='label label-danger'> " . $model->GLOBALRESULT . '</span>';
                else if ($pass_or_fail == 'Error')
                return "<span class='label label-warning'> " . $model->GLOBALRESULT . '</span>';
                else
                return "<span class='label label-success'> " . $model->GLOBALRESULT . '</span>';
            },
            // 'width'=>'8%',
            //  'value' => $pass_or_fail->,
            //  'filterType'=>GridView::FILTER_SELECT2,
            //  'filter'=>array('Pass' => 'Pass', 'Fail' => 'Fail'),
            //  'filterWidgetOptions'=>[
            //      'pluginOptions'=>['allowClear'=>true],
            //  ],
            //    'filterInputOptions'=>['placeholder'=>'Any result'],
            //    'vAlign'=>'middle',
            'contentOptions' => ['style'=>'text-align:center'],
            'format'=>'raw',
            'filter'=>array('Fail' => 'Fail', 'Pass' => 'Pass', 'Error' => 'Error', 'Pass*' => 'Pass*'),
            //'noWrap'=>$this->noWrapColor
        ],
        [
            'attribute'=>'TESTMODE',
            'label' => 'T/M',
            'vAlign'=>'middle',

            'width'=>'100px',
            'value'=>function ($model, $key, $index, $widget) {
                $testmodeimage = "<img src=".Url::to('@web/images/'.$model->TESTMODE.'.gif')."> $model->TESTMODE";
                return $testmodeimage;
            },
            'contentOptions' => ['style'=>'text-align:center'],
            'format'=>'html',
            'filter'=>array('Test' => 'Test', 'Room' => 'Room', 'Cold' => 'Cold', 'Hot' => 'Hot'),
        ],

        // 'indexrange',
        // 'versions',
        // 'backupflag',
    /*    [
            'class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style'=>'text-align:center'],
            'header'=>'Action',
            'headerOptions' => ['width' => '30'],
            'template' => '{view} {link}',
            'contentOptions' => ['style' => 'white-space: nowrap;'],
        ],*/
    ];

    ?>

    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider'=>$dataProvider,
        'filterModel'=>$searchModel,
        'columns'=>$gridColumns,
        'pager' => [
            'firstPageLabel' => 'First',
            'lastPageLabel' => 'Last',
        ],
        'bootstrap' => 'true',
        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'pjax'=>true, // pjax is set to always true for this demo
        // set your toolbar
        'toolbar'=> [
            [
                'content'=>
                // Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>Yii::t('kvgrid', 'Add Book'), 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>'Reset Grid'])
            ],
            '{export}',
            '{toggleData}',
        ],
        // set export properties
        'export'=>[
            'fontAwesome'=>true
        ],
        // parameters from the demo form
        'bordered'=>false,
        'striped'=>true,
        'condensed'=>true,
        'responsive'=>true,
        'hover'=>true,
        //  'showPageSummary'=>$pageSummary,
        'panel'=>[
            'type'=>GridView::TYPE_PRIMARY,
            //  'heading'=>$heading,
        ],
        'persistResize'=>false,
        // 'exportConfig'=>$exportConfig,
            'rowOptions' => function ($model, $key, $index, $grid) {
                            //return ['id' => $model['id'], 'onclick' => 'location.href="view?id="+(this.id);', 'target' => '_blank', 'onmouseover' => '', 'style' => 'cursor: pointer;'];
                            //$URL = "https://www.linkedin.com/cws/share?mini=true&amp;url=view?id='.$model["id"].'";
                            return ['id' => $model['id'], 'onmouseover' => '', 'style' => 'cursor: pointer;', 'onclick' => 'window.open("/global-test/view2?id='.$model["id"].'", "popup", "height=770,width=1200, menubar=no, resizable=yes,scrollbars=yes,status=1, top=10, left=10");'];
                            // "window.open('/images/foo.jpg', 'PICTURE', 'width=500,height=300');"
                            // http://atestat/global-test/view?id=
                            //http://atestat/global-test/&view?id==2026123
                        //     return ['id' => $model['id'], 'onclick' => 'alert(this.id);'];
                    },

    ]);
    ?>
    <?php  Pjax::end(); ?></div>
