<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tmp_transaction_media_dk_view".
 *
 * @property integer $id
 * @property string $ISDN
 * @property string $action
 * @property string $STA_DATETIME
 * @property string $INFO_5
 * @property integer $package_price
 */
class TmpTransactionMediaDkView extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tmp_transaction_media_dk_view';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ISDN', 'action', 'STA_DATETIME', 'INFO_5', 'package_price'], 'required'],
            [['STA_DATETIME'], 'safe'],
            [['package_price'], 'integer'],
            [['ISDN', 'action', 'INFO_5'], 'string', 'max' => 255]
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
