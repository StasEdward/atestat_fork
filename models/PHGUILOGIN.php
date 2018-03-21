<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "LOGIN".
 *
 * @property integer $id
 * @property string $username
 * @property string $loginpassword
 * @property string $permission
 * @property string $full_name
 * @property string $enabled
 * @property string $facility
 */
class PHGUILOGIN extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'LOGIN';
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
            [['id', 'full_name'], 'required'],
            [['id'], 'integer'],
            [['username', 'loginpassword', 'permission', 'full_name'], 'string', 'max' => 50],
            [['enabled'], 'string', 'max' => 3],
            [['facility'], 'string', 'max' => 30],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'User Name',
            'loginpassword' => 'Password',
            'permission' => 'Permission',
            'full_name' => 'Full Name',
            'enabled' => 'Enabled',
            'facility' => 'Facility',
        ];
    }

    /**
     * @inheritdoc
     * @return PHGUILOGINQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PHGUILOGINQuery(get_called_class());
    }
}
