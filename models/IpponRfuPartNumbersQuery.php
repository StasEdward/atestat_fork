<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[IpponRfuPartNumbers]].
 *
 * @see IpponRfuPartNumbers
 */
class IpponRfuPartNumbersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return IpponRfuPartNumbers[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IpponRfuPartNumbers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
