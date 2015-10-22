<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "e0001".
 *
 * @property integer $STATUS_ID
 * @property string $STATUS
 * @property string $DURASI_WAKTU
 * @property string $CANCEL_TIME
 */
class Expired extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'e0001';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STATUS'], 'string', 'max' => 20],
            [['DURASI_WAKTU', 'CANCEL_TIME'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'STATUS_ID' => 'Status  ID',
            'STATUS' => 'Status',
            'DURASI_WAKTU' => 'Durasi  Waktu',
            'CANCEL_TIME' => 'Cancel  Time',
        ];
    }

    /**
     * @inheritdoc
     * @return E0001Query the active query used by this AR class.
     */
    public static function find()
    {
        return new ExpiredQuery(get_called_class());
    }
}
