<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Kota]].
 *
 * @see Kota
 */
class KotaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Kota[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Kota|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}