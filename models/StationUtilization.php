<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "station_utilization_view".
 *
 * @property integer $id
 * @property string $FACILITY
 * @property string $SHORT_STATION_NAME
 * @property string $STATION_MASK
 * @property integer $STATION_COUNT
 * @property integer $WORK_MINUTES
 * @property string $TEST_DATE
 */
class StationUtilization extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'station_utilization_view';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FACILITY', 'SHORT_STATION_NAME', 'STATION_MASK', 'TEST_DATE'], 'required'],
            [['STATION_COUNT', 'WORK_MINUTES'], 'integer'],
            [['TEST_DATE'], 'safe'],
            [['FACILITY', 'SHORT_STATION_NAME', 'STATION_MASK'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'FACILITY' => 'Facility',
            'SHORT_STATION_NAME' => 'Short  Station  Name',
            'STATION_MASK' => 'Station  Mask',
            'STATION_COUNT' => 'Station  Count',
            'WORK_MINUTES' => 'Work  Minutes',
            'TEST_DATE' => 'Test  Date',
        ];
    }

    /**
     * @inheritdoc
     * @return StationUtilizationViewQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StationUtilizationQuery(get_called_class());
    }

    public function getStationTimes($stationMask, $FacilityName, $date_interval=8)
    {
        $sql_req = 'SELECT * FROM station_utilization_view WHERE STATION_MASK LIKE "'.$stationMask.'%" AND TEST_DATE BETWEEN DATE_SUB(NOW(), INTERVAL '.$date_interval.' DAY) and DATE_SUB(NOW(), INTERVAL 1 DAY) AND FACILITY="'.$FacilityName.'"  ORDER BY TEST_DATE ASC LIMIT 0 , 7';
        //echo $sql_req;
        //echo "<br>";
        //echo $sql_req;
        $res1 = Yii::$app->db->createCommand($sql_req)->queryAll();
        return $res1;
    }

    public function getStationTotalls($stationMask, $FacilityName, $date_interval=8)
    {
        $sql_totall = 'select sum(X.TOTALL_UUT) as total_uuts, sum(X.TOTALL_PASS_UUT) as total_pass_uuts  from
        (SELECT * FROM station_utilization_view WHERE STATION_MASK LIKE "'.$stationMask.'%" AND TEST_DATE BETWEEN DATE_SUB(NOW(), INTERVAL '.$date_interval.' DAY) and DATE_SUB(NOW(), INTERVAL 1 DAY) AND FACILITY="'.$FacilityName.'" ORDER BY TEST_DATE ASC LIMIT 0 , 7)
        as X';
//echo $sql_totall;

        $res2 = Yii::$app->db->createCommand($sql_totall)->queryAll();
        return $res2;
    }

}
