<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PHGUILOGIN]].
 *
 * @see PHGUILOGIN
 */
class PHGUILOGINQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PHGUILOGIN[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PHGUILOGIN|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
