<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "b0001".
 *
 * @property integer $ID
 * @property string $KURIR
 * @property string $KATEGORI
 * @property string $KURIRKATEGORI
 * @property string $ORIGINPROV
 * @property string $DESPROV
 * @property string $ORIGINCITY
 * @property string $DESCITY
 * @property string $POSTALCODEORIGIN
 * @property string $POSTALCODEDESC
 * @property integer $TOTALWEIGHT
 * @property integer $HARGA
 */
class Kurir extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b0001';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KURIRKATEGORI', 'ORIGINPROV', 'DESPROV', 'ORIGINCITY', 'DESCITY', 'POSTALCODEORIGIN', 'POSTALCODEDESC', 'TOTALWEIGHT'], 'required'],
            [['TOTALWEIGHT', 'HARGA'], 'integer'],
            [['KURIR'], 'string', 'max' => 50],
            [['KATEGORI'], 'string', 'max' => 40],
            [['KURIRKATEGORI', 'ORIGINPROV', 'DESPROV', 'ORIGINCITY', 'DESCITY'], 'string', 'max' => 100],
            [['POSTALCODEORIGIN', 'POSTALCODEDESC'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'KURIR' => 'Kurir',
            'KATEGORI' => 'Kategori',
            'KURIRKATEGORI' => 'Kurirkategori',
            'ORIGINPROV' => 'Originprov',
            'DESPROV' => 'Desprov',
            'ORIGINCITY' => 'Origincity',
            'DESCITY' => 'Descity',
            'POSTALCODEORIGIN' => 'Postalcodeorigin',
            'POSTALCODEDESC' => 'Postalcodedesc',
            'TOTALWEIGHT' => 'Totalweight',
            'HARGA' => 'Harga',
        ];
    }

    /**
     * @inheritdoc
     * @return KurirQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KurirQuery(get_called_class());
    }
}
