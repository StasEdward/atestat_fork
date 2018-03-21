<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "PHGUI_VER_STATUS".
 *
 * @property integer $ID
 * @property string $STATION_ID
 * @property string $PHGUI_VERSION
 * @property string $STATION_IP
 * @property string $FACILITY_NAME
 * @property string $PHGUI_PATH
 * @property string $LAST_DB_UPDATE
 */
class PhguiverStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'PHGUI_VER_STATUS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STATION_ID', 'PHGUI_VERSION', 'STATION_IP', 'FACILITY_NAME', 'PHGUI_PATH', 'LAST_DB_UPDATE'], 'required'],
            [['STATION_ID', 'PHGUI_VERSION'], 'string', 'max' => 25],
            [['STATION_IP', 'PHGUI_PATH'], 'string', 'max' => 255],
            [['FACILITY_NAME'], 'string', 'max' => 50],
            [['LAST_DB_UPDATE'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'STATION_ID' => 'Station  ID',
            'PHGUI_VERSION' => 'Phgui  Version',
            'STATION_IP' => 'Station  Ip',
            'FACILITY_NAME' => 'Facility  Name',
            'PHGUI_PATH' => 'Phgui  Path',
            'LAST_DB_UPDATE' => 'Last  Db  Update',
        ];
    }

    /**
     * @inheritdoc
     * @return PhguiverStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PhguiverStatusQuery(get_called_class());
    }
}
