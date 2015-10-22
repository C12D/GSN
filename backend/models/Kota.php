<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "a0002".
 *
 * @property string $CITY_ID
 * @property string $PROVINCE_ID
 * @property string $PROVINCE
 * @property string $TYPE
 * @property string $CITY_NAME
 * @property string $POSTAL_CODE
 */
class Kota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'a0002';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CITY_ID'], 'required'],
            [['CITY_ID', 'POSTAL_CODE'], 'integer'],
            [['PROVINCE_ID', 'PROVINCE', 'TYPE', 'CITY_NAME'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CITY_ID' => 'City  ID',
            'PROVINCE_ID' => 'Province  ID',
            'PROVINCE' => 'Province',
            'TYPE' => 'Type',
            'CITY_NAME' => 'City  Name',
            'POSTAL_CODE' => 'Postal  Code',
        ];
    }

    /**
     * @inheritdoc
     * @return KotaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KotaQuery(get_called_class());
    }
}
