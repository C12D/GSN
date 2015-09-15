<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zip".
 *
 * @property integer $zip_id
 * @property string $provinsi
 * @property string $kota
 * @property string $postal_code
 */
class Zip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zip_id'], 'required'],
            [['zip_id'], 'integer'],
            [['provinsi'], 'string', 'max' => 40],
            [['kota'], 'string', 'max' => 50],
            [['postal_code'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'zip_id' => 'Zip ID',
            'provinsi' => 'Provinsi',
            'kota' => 'Kota',
            'postal_code' => 'Postal Code',
        ];
    }
}
