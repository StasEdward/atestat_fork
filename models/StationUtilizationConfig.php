<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "station_utilization_config".
 *
 * @property integer $id
 * @property string $CM_NAME
 * @property string $STATION_FAMILY
 * @property string $STATION_NAME
 * @property string $REAL_STATION_NAME
 * @property string $STATION_TYPE
 * @property integer $THROUGHPUT_TYPE
 * @property integer $STATUS
 */
class StationUtilizationConfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'station_utilization_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CM_NAME', 'STATION_FAMILY', 'STATION_NAME', 'REAL_STATION_NAME', 'STATION_TYPE'], 'required'],
            [['THROUGHPUT_TYPE', 'STATUS', 'STATION_COUNT'], 'integer'],
            [['CM_NAME', 'STATION_FAMILY', 'STATION_NAME', 'REAL_STATION_NAME', 'STATION_TYPE'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'CM_NAME' => 'Facility',
            'STATION_FAMILY' => 'Station  Family',
            'STATION_NAME' => 'Station  Name',
            'REAL_STATION_NAME' => 'Station Mask',
            'STATION_TYPE' => 'Station  Type',
            'THROUGHPUT_TYPE' => 'Throughput  Type',
            'STATION_COUNT' => 'Station Count',
            'STATUS' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return StationUtilizationConfigQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StationUtilizationConfigQuery(get_called_class());
    }
}
