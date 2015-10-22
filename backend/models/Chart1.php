<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t0001".
 *
 * @property integer $CHART_ID
 * @property integer $USER_ID
 * @property string $USERNAME
 * @property string $FAKTUR
 * @property string $NOFAKTUR
 * @property string $KURIR
 * @property string $PROVORIGIN
 * @property string $PROVDES
 * @property string $ORIGIN_CITY
 * @property string $DES_CITY
 * @property integer $KODE_POS_ORIGIN
 * @property integer $KODE_POS_DES
 * @property string $KATEGORI_KIRIM
 * @property string $KATEGORI_DETAIL
 * @property integer $TOTAL_BERAT
 * @property integer $HARGA
 */
class Chart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't0001';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'KODE_POS_ORIGIN', 'KODE_POS_DES', 'TOTAL_BERAT', 'HARGA'], 'integer'],
            [['FAKTUR', 'KATEGORI_DETAIL'], 'required'],
            [['USERNAME', 'NOFAKTUR', 'KATEGORI_KIRIM'], 'string', 'max' => 50],
            [['FAKTUR', 'KURIR', 'PROVORIGIN', 'PROVDES', 'ORIGIN_CITY', 'DES_CITY', 'KATEGORI_DETAIL'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CHART_ID' => 'Chart  ID',
            'USER_ID' => 'User  ID',
            'USERNAME' => 'Username',
            'FAKTUR' => 'Faktur',
            'NOFAKTUR' => 'Nofaktur',
            'KURIR' => 'Kurir',
            'PROVORIGIN' => 'Provorigin',
            'PROVDES' => 'Provdes',
            'ORIGIN_CITY' => 'Origin  City',
            'DES_CITY' => 'Des  City',
            'KODE_POS_ORIGIN' => 'Kode  Pos  Origin',
            'KODE_POS_DES' => 'Kode  Pos  Des',
            'KATEGORI_KIRIM' => 'Kategori  Kirim',
            'KATEGORI_DETAIL' => 'Kategori  Detail',
            'TOTAL_BERAT' => 'Total  Berat',
            'HARGA' => 'Harga',
        ];
    }

    /**
     * @inheritdoc
     * @return ChartQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ChartQuery(get_called_class());
    }
}
