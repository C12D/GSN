<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "progressjob".
 *
 * @property integer $PROGRESS_ID
 * @property string $USER_ID
 * @property string $MODUL
 * @property string $JUDUL
 * @property string $KETERANGAN
 * @property string $STAR_DATE
 * @property string $END_DATE
 * @property string $PROGRESS
 * @property integer $STATUS
 * @property string $KETERANGAN_DETAIL
 */
class Progressjob extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'progressjob';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KETERANGAN', 'KETERANGAN_DETAIL'], 'string'],
            [['STAR_DATE', 'END_DATE'], 'safe'],
            [['STATUS'], 'integer'],
            [['KETERANGAN_DETAIL'], 'required'],
            [['USER_ID', 'PROGRESS'], 'string', 'max' => 10],
            [['MODUL'], 'string', 'max' => 20],
            [['JUDUL'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PROGRESS_ID' => 'Progress  ID',
            'USER_ID' => 'User  ID',
            'MODUL' => 'Modul',
            'JUDUL' => 'Judul',
            'KETERANGAN' => 'Keterangan',
            'STAR_DATE' => 'Star  Date',
            'END_DATE' => 'End  Date',
            'PROGRESS' => 'Progress',
            'STATUS' => 'Status',
            'KETERANGAN_DETAIL' => 'Keterangan  Detail',
        ];
    }

    /**
     * @inheritdoc
     * @return ProgressjobQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProgressjobQuery(get_called_class());
    }
}
