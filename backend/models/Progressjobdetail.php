<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "progressjobdetail".
 *
 * @property integer $PROGRESSJOBDETAIL_ID
 * @property integer $PROGRESS_ID
 * @property string $CREATED_DATE
 * @property string $KETERANGAN
 * @property string $PIC
 */
class Progressjobdetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'progressjobdetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PROGRESS_ID'], 'integer'],
            [['CREATED_DATE'], 'safe'],
            [['KETERANGAN'], 'string', 'max' => 200],
            [['PIC'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PROGRESSJOBDETAIL_ID' => 'Progressjobdetail  ID',
            'PROGRESS_ID' => 'Progress  ID',
            'CREATED_DATE' => 'Created  Date',
            'KETERANGAN' => 'Keterangan',
            'PIC' => 'Pic',
        ];
    }

    /**
     * @inheritdoc
     * @return ProgressjobdetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProgressjobdetailQuery(get_called_class());
    }
}
