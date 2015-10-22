<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Expired]].
 *
 * @see Expired
 */
class ExpiredQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Expired[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Expired|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}