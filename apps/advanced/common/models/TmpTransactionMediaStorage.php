<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tmp_transaction_media_storage".
 *
 * @property integer $id
 * @property string $ISDN
 * @property string $action
 * @property string $STA_DATETIME
 * @property integer $INFO_5
 * @property integer $package_price
 */
class TmpTransactionMediaStorage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tmp_transaction_media_storage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ISDN', 'action', 'STA_DATETIME', 'INFO_5', 'package_price'], 'required'],
            [['id', 'INFO_5', 'package_price'], 'integer'],
            [['STA_DATETIME'], 'safe'],
            [['ISDN', 'action'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ISDN' => 'Isdn',
            'action' => 'Action',
            'STA_DATETIME' => 'Sta  Datetime',
            'INFO_5' => 'Info 5',
            'package_price' => 'Package Price',
        ];
    }
}
