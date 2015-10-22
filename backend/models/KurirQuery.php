<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Kurir]].
 *
 * @see Kurir
 */
class KurirQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Kurir[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Kurir|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}