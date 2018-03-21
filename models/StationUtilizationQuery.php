<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[StationUtilizationView]].
 *
 * @see StationUtilizationView
 */
class StationUtilizationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return StationUtilizationView[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return StationUtilizationView|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
