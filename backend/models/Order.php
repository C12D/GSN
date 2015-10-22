<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t0002".
 *
 * @property string $G_ORDER
 * @property string $G_RANDOM
 * @property string $G_PESAN
 * @property string $USER_ID
 * @property string $USER_NAME
 * @property string $NAMA_CUSTOMER
 * @property string $ALAMAT_CUSTOMER
 * @property integer $HANDPHONE
 * @property string $EMAIL_CUSTOMER
 * @property integer $GRANDTOTAL
 * @property string $CREATE_DATED
 * @property string $STATUS
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't0002';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['G_ORDER', 'USER_NAME', 'NAMA_CUSTOMER', 'ALAMAT_CUSTOMER', 'HANDPHONE', 'EMAIL_CUSTOMER', 'GRANDTOTAL'], 'required'],
            [['HANDPHONE', 'GRANDTOTAL'], 'integer'],
            [['CREATE_DATED'], 'safe'],
            [['G_ORDER', 'USER_NAME'], 'string', 'max' => 50],
            [['G_RANDOM', 'USER_ID', 'EMAIL_CUSTOMER'], 'string', 'max' => 40],
            [['G_PESAN', 'NAMA_CUSTOMER', 'ALAMAT_CUSTOMER'], 'string', 'max' => 100],
            [['STATUS'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'G_ORDER' => 'G  Order',
            'G_RANDOM' => 'G  Random',
            'G_PESAN' => 'G  Pesan',
            'USER_ID' => 'User  ID',
            'USER_NAME' => 'User  Name',
            'NAMA_CUSTOMER' => 'Nama  Customer',
            'ALAMAT_CUSTOMER' => 'Alamat  Customer',
            'HANDPHONE' => 'Handphone',
            'EMAIL_CUSTOMER' => 'Email  Customer',
            'GRANDTOTAL' => 'Grandtotal',
            'CREATE_DATED' => 'Create  Dated',
            'STATUS' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderQuery(get_called_class());
    }
}
