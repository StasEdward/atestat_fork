<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[StationUtilizationConfig]].
 *
 * @see PhostestglobaltestQuery
 */
class PhostestglobaltestQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return StationUtilizationConfig[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return StationUtilizationConfig|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}