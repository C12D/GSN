<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "a0004".
 *
 * @property string $FWD_ID
 * @property string $FWD_NM
 * @property integer $FWD_SERVICE
 * @property integer $FWD_STS
 * @property string $FWD_DATE_START
 * @property string $FWD_DATE_UPDATE
 * @property string $ORIGIN_PROVINCE
 * @property string $ORIGIN_CITY
 * @property string $DES_PROVINCE
 * @property string $DES_CITY
 * @property double $HARGA
 * @property string $STATUS
 */
class Harga extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'a0004';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FWD_ID'], 'required'],
            [['FWD_ID', 'FWD_SERVICE', 'FWD_STS', 'ORIGIN_PROVINCE', 'ORIGIN_CITY', 'DES_PROVINCE', 'DES_CITY', 'STATUS'], 'integer'],
            [['FWD_DATE_START', 'FWD_DATE_UPDATE'], 'safe'],
            [['HARGA'], 'number'],
            [['FWD_NM'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'FWD_ID' => 'Fwd  ID',
            'FWD_NM' => 'Fwd  Nm',
            'FWD_SERVICE' => 'Fwd  Service',
            'FWD_STS' => 'Fwd  Sts',
            'FWD_DATE_START' => 'Fwd  Date  Start',
            'FWD_DATE_UPDATE' => 'Fwd  Date  Update',
            'ORIGIN_PROVINCE' => 'Origin  Province',
            'ORIGIN_CITY' => 'Origin  City',
            'DES_PROVINCE' => 'Des  City',
            'DES_CITY' => 'Des  City',
            'HARGA' => 'Wight',
            'STATUS' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return HargaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HargaQuery(get_called_class());
    }
}
