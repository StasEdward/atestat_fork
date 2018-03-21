<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
//use app\models\GlobalTest;

/**
 * This is the model class for table "phostestglobaltest".
 *
 * @property int $id
 * @property string $FACILITY
 * @property string $STATIONID
 * @property string $UUTNAME
 * @property string $PARTNUMBER
 * @property string $SERIALNUMBER
 * @property string $TECHNAME
 * @property string $TESTDATE
 * @property string $TIMESTART
 * @property string $TIMESTOP
 * @property int $UUTPLACE
 * @property string $TESTMODE
 * @property string $GLOBALRESULT
 * @property int $INDEXRANGE
 * @property string $VERSIONS
 */
class Phostestglobaltest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'PHOSTESTGLOBALTEST';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FACILITY'], 'required'],
            [['TESTDATE', 'TIMESTART', 'TIMESTOP'], 'safe'],
            [['UUTPLACE', 'INDEXRANGE'], 'integer'],
            [['FACILITY', 'STATIONID'], 'string', 'max' => 20],
            [['UUTNAME'], 'string', 'max' => 50],
            [['PARTNUMBER', 'SERIALNUMBER', 'TECHNAME'], 'string', 'max' => 30],
            [['TESTMODE', 'GLOBALRESULT'], 'string', 'max' => 10],
            [['VERSIONS'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'FACILITY' => 'Facility',
            'STATIONID' => 'Stationid',
            'UUTNAME' => 'Uutname',
            'PARTNUMBER' => 'Partnumber',
            'SERIALNUMBER' => 'Serialnumber',
            'TECHNAME' => 'Techname',
            'TESTDATE' => 'Testdate',
            'TIMESTART' => 'Timestart',
            'TIMESTOP' => 'Timestop',
            'UUTPLACE' => 'Uutplace',
            'TESTMODE' => 'Testmode',
            'GLOBALRESULT' => 'Globalresult',
            'INDEXRANGE' => 'Indexrange',
            'VERSIONS' => 'Versions',
        ];
    }

    public static function getFacility() {
        $facility = Phostestglobaltest::find()
                ->select(['FACILITY'])
                ->distinct(true)
                ->all();
        $facilityArr = ArrayHelper::getColumn($facility, 'FACILITY');
        if (!empty($facilityArr)) {
            foreach ($facilityArr as $val) {
                $facilities[$val] = $val;
            }
            return $facilities;
        }
    }
    public static function getPartNumber() {
        $params = !empty(Yii::$app->request->getQueryParams()) ? Yii::$app->request->getQueryParams() : '';
        $partNumber = Phostestglobaltest::find()
            ->select(['PARTNUMBER'])
            ->andFilterWhere($params['PhostestglobaltestSearch'])
            ->distinct(true)
            ->all();
        $partNumberArr = ArrayHelper::getColumn($partNumber, 'PARTNUMBER');
        if (!empty($partNumberArr)) {
            foreach ($partNumberArr as $val) {
                $partNumbers[$val] = $val;
            }
            return $partNumbers;
        }
    }
    public static function getStationID() {
        $params = !empty(Yii::$app->request->getQueryParams()) ? Yii::$app->request->getQueryParams() : '';
        if(empty($params['PhostestglobaltestSearch'])){
        	$stationID = Phostestglobaltest::find()
            ->select(['STATIONID'])
            ->distinct(true)
            ->all();
        }
		else{
        	$stationID = Phostestglobaltest::find()
            ->select(['STATIONID'])
            ->andFilterWhere($params['PhostestglobaltestSearch'])
            ->distinct(true)
            ->all();
        }
        $stationIDArr = ArrayHelper::getColumn($stationID, 'STATIONID');
        if (!empty($stationIDArr)) {
            foreach ($stationIDArr as $val) {
                $stationIDs[$val] = $val;
            }
            return $stationIDs;
        }
    }

    public static function getUUTName() {
        $params = !empty(Yii::$app->request->getQueryParams()) ? Yii::$app->request->getQueryParams() : '';
        $UUTName = Phostestglobaltest::find()
            ->select(['UUTNAME'])
            ->andFilterWhere($params['PhostestglobaltestSearch'])
            ->distinct(true)
            ->all();
        $UUTNameArr = ArrayHelper::getColumn($UUTName, 'UUTNAME');
        if (!empty($UUTNameArr)) {
            foreach ($UUTNameArr as $val) {
                $UUTNames[$val] = $val;
            }
            return $UUTNames;
        }
    }

    /**
     * {@inheritdoc}
     * @return PhostestglobaltestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PhostestglobaltestQuery(get_called_class());
    }
}