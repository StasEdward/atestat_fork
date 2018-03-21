<?php

namespace app\controllers;

use Yii;
use app\models\StationUtilization;
use app\models\StationUtilizationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StationUtilizationController implements the CRUD actions for StationUtilizationView model.
 */
class StationUtilizationController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all StationUtilizationView models.
     * @return mixed
     */
    public function actionIndex($facility = 'VCL', $station_type = 'IP-20C', $use_timer = false, $current_id = 0)
    {

        if (Yii::$app->user->isGuest){
            return $this->render('/site/about', [
            ]);
        }


        $searchModel = new StationUtilizationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //    echo $station_type;



        $IP_20C_Board_Short_Array = array(
            1  => "NEXUS_TRX_",
            2  => "N8_",
            3  => "N3_CAL_",
            4  => "N3_ATP_",
            5  => "N4_",
            6  => "N13_",
        );
        $IP_20C_Board_Full_Array = array(
            1  => "N7 TRX",
            2  => "N8 MB",
            3  => "N3 Cal",
            4  => "N3 ATP",
            5  => "N4 Final",
            6  => "N13 Sealing",
        );


        $RFU_C_Board_Short_Array = array(
            1  => "IP7_",
            2  => "IPPON_P8_",
            3  => "P3_CAL_",
            4  => "P3_ATP_",
            5  => "IPPON_P4_",
            6  => "IPPON_P13_",
        );
        $RFU_C_Board_Full_Array = array(
            1  => "P7 TRX",
            2  => "P8 PSC",
            3  => "P3 Cal",
            4  => "P3 ATP",
            5  => "P4 Final",
            6  => "P13 Sealing",
        );

        $Board_Short_array = array();
        $Board_Full_array = array();
        if($station_type == 'IP-20C'){
            //echo "IP20-C";
            $Board_array = $IP_20C_Board_Short_Array;
            $Board_Full_array = $IP_20C_Board_Full_Array;
        }
        else{
            //echo "RFU-C";
            $Board_array = $RFU_C_Board_Short_Array;
            $Board_Full_array = $RFU_C_Board_Full_Array;
        }


    //    print_r($Board_Full_array);


    //    print_r($Board_array);
    //    echo "</br>";
    //    print_r($Board_Full_array);

        // IP-20C Utilization for VCL
        // Board Level Stations
        $N7_TRX_totall_utiliz = StationUtilization::getStationTimes($Board_array[1], $facility);
        $N7_TRX_totall_utiliz_uuts = StationUtilization::getStationTotalls($Board_array[1], $facility);
        $N7_TRX_utilization = array();
        $N7_TRX_downtime = array();
        $N7_TRX_util_date = array();
        $N7_TRX_stations = array();
        for ($i=0; $i < count($N7_TRX_totall_utiliz); $i++) {
            $N7_TRX_stations[$i] = $N7_TRX_totall_utiliz[$i]['REAL_STATION_COUNT'];
            $N7_TRX_utilization[$i] = round(((($N7_TRX_totall_utiliz[$i]['TOTALL_TIME'])  / $N7_TRX_stations[$i]) / 1440) *100);
            $N7_TRX_downtime[$i] =  100 - $N7_TRX_utilization[$i];
            $N7_TRX_util_date[$i] = date("d.m", strtotime($N7_TRX_totall_utiliz[$i]['TEST_DATE'])).'<br>T:'. $N7_TRX_totall_utiliz[$i]['TOTALL_UUT'].'<br>P:'.$N7_TRX_totall_utiliz[$i]['TOTALL_PASS_UUT'];
        }


        //print_r($N7_TRX_totall_utiliz);


        $N8_MB_totall_utiliz = StationUtilization::getStationTimes($Board_array[2], $facility);
        $N8_MB_totall_utiliz_uuts = StationUtilization::getStationTotalls($Board_array[2], $facility);
        $N8_MB_utilization = array();
        $N8_MB_downtime = array();
        $N8_MB_util_date = array();
        $N8_MB_stations = array();
        for ($i=0; $i < count($N8_MB_totall_utiliz); $i++) {
            $N8_MB_stations[$i] = $N8_MB_totall_utiliz[$i]['REAL_STATION_COUNT'];
            $N8_MB_utilization[$i] = round(((($N8_MB_totall_utiliz[$i]['TOTALL_TIME'])  / $N8_MB_stations[$i]) / 1440) *100);
            $N8_MB_downtime[$i] =  100 - $N8_MB_utilization[$i];
            $N8_MB_util_date[$i] = date("d.m", strtotime($N8_MB_totall_utiliz[$i]['TEST_DATE'])).'<br>T:'. $N8_MB_totall_utiliz[$i]['TOTALL_UUT'].'<br>P:'.$N8_MB_totall_utiliz[$i]['TOTALL_PASS_UUT'];
        }

    //    print_r($N8_MB_totall_utiliz);
        // IP-20C Utilization for VCL
        // System Level Stations

        $N3_CAL_totall_utiliz = StationUtilization::getStationTimes($Board_array[3], $facility);
        $N3_CAL_totall_utiliz_uuts = StationUtilization::getStationTotalls($Board_array[3], $facility);
        $N3_CAL_utilization = array();
        $N3_CAL_downtime = array();
        $N3_CAL_util_date = array();
        $N3_CAL_stations = array();
        for ($i=0; $i < count($N3_CAL_totall_utiliz); $i++) {
            $N3_CAL_stations[$i] = $N3_CAL_totall_utiliz[$i]['REAL_STATION_COUNT'];
            $N3_CAL_utilization[$i] = round(((($N3_CAL_totall_utiliz[$i]['TOTALL_TIME'])  / $N3_CAL_stations[$i]) / 1440) *100);
            $N3_CAL_downtime[$i] =  100 - $N3_CAL_utilization[$i];
            $N3_CAL_util_date[$i] = date("d.m", strtotime($N3_CAL_totall_utiliz[$i]['TEST_DATE'])).'<br>T:'. $N3_CAL_totall_utiliz[$i]['TOTALL_UUT'].'<br>P:'.$N3_CAL_totall_utiliz[$i]['TOTALL_PASS_UUT'];
        }

        $N3_ATP_totall_utiliz = StationUtilization::getStationTimes($Board_array[4], $facility);
    //    $N3_ATP_totall_utiliz_uuts = StationUtilization::getStationTotalls('N3_ATP_', 'VCL');
        $N3_ATP_utilization = array();
        $N3_ATP_downtime = array();
        $N3_ATP_util_date = array();
        $N3_ATP_stations = array();
        for ($i=0; $i < count($N3_ATP_totall_utiliz); $i++) {
            $N3_ATP_stations[$i] = $N3_ATP_totall_utiliz[$i]['REAL_STATION_COUNT'];
            $N3_ATP_utilization[$i] = round(((($N3_ATP_totall_utiliz[$i]['TOTALL_TIME'])  /$N3_ATP_stations[$i]) / 1440) *100);
            $N3_ATP_downtime[$i] =  100 - $N3_ATP_utilization[$i];
            $N3_ATP_util_date[$i] = date("d.m", strtotime($N3_ATP_totall_utiliz[$i]['TEST_DATE'])).'<br>T:'. $N3_ATP_totall_utiliz[$i]['TOTALL_UUT'].'<br>P:'.$N3_ATP_totall_utiliz[$i]['TOTALL_PASS_UUT'];
        }


        $N4_totall_utiliz = StationUtilization::getStationTimes($Board_array[5], $facility);
    //    $N4_totall_utiliz_uuts = StationUtilization::getStationTotalls('N4_', 'VCL');
        $N4_utilization = array();
        $N4_downtime = array();
        $N4_util_date = array();
        $N4_stations = array();
        for ($i=0; $i < count($N4_totall_utiliz); $i++) {
            $N4_stations[$i] = $N4_totall_utiliz[$i]['REAL_STATION_COUNT'];
            $N4_utilization[$i] = round(((($N4_totall_utiliz[$i]['TOTALL_TIME'])  / $N4_stations[$i]) / 1440) *100);
            $N4_downtime[$i] =  100 - $N4_utilization[$i];
            $N4_util_date[$i] = date("d.m", strtotime($N4_totall_utiliz[$i]['TEST_DATE'])).'<br>T:'.$N4_totall_utiliz[$i]['TOTALL_UUT'].'<br>P:'.$N4_totall_utiliz[$i]['TOTALL_PASS_UUT'];
        }

        $N13_totall_utiliz = StationUtilization::getStationTimes($Board_array[6], $facility);
        $N13_totall_utiliz_uuts = StationUtilization::getStationTotalls($Board_array[6], $facility);
        $N13_utilization = array();
        $N13_downtime= array();
        $N13_util_date = array();
        $N13_stations = array();
        for ($i=0; $i < count($N13_totall_utiliz); $i++) {
            $N13_stations[$i] = $N13_totall_utiliz[$i]['REAL_STATION_COUNT'];
            $N13_utilization[$i] = round(((($N13_totall_utiliz[$i]['TOTALL_TIME'])  / $N13_stations[$i]) / 1440) *100);
            $N13_downtime[$i] =  100 - $N13_utilization[$i];
            $N13_util_date[$i] = date("d.m", strtotime($N13_totall_utiliz[$i]['TEST_DATE'])).'<br>T:'. $N13_totall_utiliz[$i]['TOTALL_UUT'].'<br>P:'.$N13_totall_utiliz[$i]['TOTALL_PASS_UUT'];
        }

    //    print_r($N13_totall_utiliz_uuts);












        //print_r($N8_MB_utilization);
        //echo date("m.d", strtotime($N7_TRX_totall_utiliz[$i]['TEST_DATE']));

    //    print_r($totall_utiliz_time);
/*        echo "<br>";

        print_r($N7_TRX_stations);

        echo "<br>Total work time: ";
        print_r($A);
        echo "<br>Total work time in min: ";
        print_r($AA);
        echo "<br>Time for one station(min): ";
        print_r($B);
        echo "<br>Percent of work %:";
        print_r($C);
        echo "<br>";
        print_r($util_date);
        echo "<br>";
*/
    //print_r($N7_TRX_stations);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'use_timer' => $use_timer,
            'current_id' => $current_id,

            'facility' => $facility,
            'Board_array' => $Board_array,
            'Board_Full_array' => $Board_Full_array,
            'station_type' => $station_type,


            'N7_TRX_totall_utiliz_uuts' => $N7_TRX_totall_utiliz_uuts,
            'N7_TRX_utilization' => $N7_TRX_utilization,
            'N7_TRX_downtime' => $N7_TRX_downtime,
            'N7_TRX_util_date' => $N7_TRX_util_date,

            'N8_MB_totall_utiliz_uuts' => $N8_MB_totall_utiliz_uuts,
            'N8_MB_utilization' => $N8_MB_utilization,
            'N8_MB_downtime' => $N8_MB_downtime,
            'N8_MB_util_date' => $N8_MB_util_date,

        //    'N3_CAL_totall_utiliz_uuts' => $N3_CAL_totall_utiliz_uuts,
            'N3_CAL_utilization' => $N3_CAL_utilization,
            'N3_CAL_downtime' => $N3_CAL_downtime,
            'N3_CAL_util_date' => $N3_CAL_util_date,
            'N3_CAL_totall_utiliz_uuts' => $N3_CAL_totall_utiliz_uuts,

        //    'N3_ATP_totall_utiliz_uuts' => $N3_ATP_totall_utiliz_uuts,
            'N3_ATP_utilization' => $N3_ATP_utilization,
            'N3_ATP_downtime' => $N3_ATP_downtime,
            'N3_ATP_util_date' => $N3_ATP_util_date,

        //    'N4_totall_utiliz_uuts' => $N4_totall_utiliz_uuts,
            'N4_utilization' => $N4_utilization,
            'N4_downtime' => $N4_downtime,
            'N4_util_date' => $N4_util_date,

        //    'N13_totall_utiliz_uuts' => $N13_totall_utiliz_uuts,
            'N13_utilization' => $N13_utilization,
            'N13_downtime' => $N13_downtime,
            'N13_util_date' => $N13_util_date,
            'N13_totall_utiliz_uuts' => $N13_totall_utiliz_uuts,


            'N7_TRX_stations' => $N7_TRX_stations,
            'N8_MB_stations' => $N8_MB_stations,
            'N3_CAL_stations' => $N3_CAL_stations,
            'N3_ATP_stations' => $N3_ATP_stations,
            'N4_stations' => $N4_stations,
            'N13_stations' => $N13_stations,


        ]);
    }


    public function actionView2()
    {
        $searchModel = new StationUtilizationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $N7_TRX_totall_utiliz = StationUtilization::getStationTimes('NEXUS_TRX_', 'VCL');
        $N7_TRX_totall_utiliz_uuts = StationUtilization::getStationTotalls('NEXUS_TRX_', 'VCL');

        print_r($N7_TRX_totall_utiliz);

        $N7_TRX_util_date = array();
        //$N7_TRX_stations = array();
        for ($i=0; $i < count($N7_TRX_totall_utiliz); $i++) {
            $N7_TRX_utilization[$i] = round(((($N7_TRX_totall_utiliz[$i]['WORK_MINUTES'] / 100)  / $N7_TRX_totall_utiliz[$i]['STATION_COUNT']) / 1200) *100);
            $N7_TRX_downtime[$i] =  100 - $N7_TRX_utilization[$i];
            $N7_TRX_util_date[$i] = date("m.d", strtotime($N7_TRX_totall_utiliz[$i]['TEST_DATE'])).'<br>'. $N7_TRX_totall_utiliz[$i]['TOTALL_UUT'].'<br>St: '.$N7_TRX_totall_utiliz[$i]['STATION_COUNT'];
        }

        $N8_MB_totall_utiliz = StationUtilization::getStationTimes('N8_', 'VCL');
        $N8_MB_totall_utiliz_uuts = StationUtilization::getStationTotalls('N8_', 'VCL');
        $N8_MB_util_date = array();
        for ($i=0; $i < count($N8_MB_totall_utiliz); $i++) {
            $N8_MB_utilization[$i] = round(((($N8_MB_totall_utiliz[$i]['WORK_MINUTES'] / 100)  / $N8_MB_totall_utiliz[$i]['STATION_COUNT']) / 1200) *100);

            //echo $N8_MB_totall_utiliz[$i]['WORK_MINUTES'];
            //echo "<br>";

            $N8_MB_downtime[$i] =  100 - $N8_MB_utilization[$i];
            $N8_MB_util_date[$i] = date("m.d", strtotime($N8_MB_totall_utiliz[$i]['TEST_DATE'])).'<br>'. $N8_MB_totall_utiliz[$i]['TOTALL_UUT'].'<br>St: '.$N8_MB_totall_utiliz[$i]['STATION_COUNT'];
            $N8_MB_stations = $N8_MB_totall_utiliz[$i]['STATION_COUNT'];
        }


        //echo date("m.d", strtotime($N7_TRX_totall_utiliz[$i]['TEST_DATE']));

    //    print_r($totall_utiliz_time);
    /*        echo "<br>";

        print_r($N7_TRX_stations);

        echo "<br>Total work time: ";
        print_r($A);
        echo "<br>Total work time in min: ";
        print_r($AA);
        echo "<br>Time for one station(min): ";
        print_r($B);
        echo "<br>Percent of work %:";
        print_r($C);
        echo "<br>";
        print_r($util_date);
        echo "<br>";
    */
        return $this->render('view2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'N7_TRX_totall_utiliz_uuts' => $N7_TRX_totall_utiliz_uuts,
            'N7_TRX_utilization' => $N7_TRX_utilization,
            'N7_TRX_downtime' => $N7_TRX_downtime,
            'N7_TRX_util_date' => $N7_TRX_util_date,

            'N8_MB_totall_utiliz_uuts' => $N8_MB_totall_utiliz_uuts,
            'N8_MB_utilization' => $N8_MB_utilization,
            'N8_MB_downtime' => $N8_MB_downtime,
            'N8_MB_util_date' => $N8_MB_util_date,

        ]);
    }


    public function actionConfig()
    {
        $searchModel = new StationUtilizationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('config', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }
    /**
     * Displays a single StationUtilizationView model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new StationUtilizationView model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StationUtilization();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing StationUtilizationView model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing StationUtilizationView model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StationUtilizationView model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StationUtilizationView the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StationUtilization::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
