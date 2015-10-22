<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Progressjob]].
 *
 * @see Progressjob
 */
class ProgressjobQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Progressjob[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Progressjob|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}