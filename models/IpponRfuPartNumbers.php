<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ippon_rfu_part_numbers".
 *
 * @property integer $indexr
 * @property string $part_number
 * @property double $tx_start_freq
 * @property double $tx_stop_freq
 * @property double $rx_start_freq
 * @property double $rx_stop_freq
 * @property integer $tx_high
 * @property integer $with_diplexer
 * @property string $master_part_number
 * @property double $tx_start_freq_2
 * @property double $tx_stop_freq_2
 * @property double $rx_start_freq_2
 * @property double $rx_stop_freq_2
 */
class IpponRfuPartNumbers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ippon_rfu_part_numbers';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_atemain');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['indexr'], 'required'],
            [['indexr', 'tx_high', 'with_diplexer'], 'integer'],
            [['tx_start_freq', 'tx_stop_freq', 'rx_start_freq', 'rx_stop_freq', 'tx_start_freq_2', 'tx_stop_freq_2', 'rx_start_freq_2', 'rx_stop_freq_2'], 'number'],
            [['part_number', 'master_part_number'], 'string', 'max' => 20],
            [['indexr'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'indexr' => 'Indexr',
            'part_number' => 'Part Number',
            'tx_start_freq' => 'Tx Start Freq',
            'tx_stop_freq' => 'Tx Stop Freq',
            'rx_start_freq' => 'Rx Start Freq',
            'rx_stop_freq' => 'Rx Stop Freq',
            'tx_high' => 'Tx High',
            'with_diplexer' => 'With Diplexer',
            'master_part_number' => 'Master Part Number',
            'tx_start_freq_2' => 'Tx Start Freq 2',
            'tx_stop_freq_2' => 'Tx Stop Freq 2',
            'rx_start_freq_2' => 'Rx Start Freq 2',
            'rx_stop_freq_2' => 'Rx Stop Freq 2',
        ];
    }

    /**
     * @inheritdoc
     * @return IpponRfuPartNumbersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IpponRfuPartNumbersQuery(get_called_class());
    }
}
