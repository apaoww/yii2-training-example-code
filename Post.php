<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "POST".
 *
 * @property double $POST_ID
 * @property double $USER_ID
 * @property string $TITLE
 * @property string $DESCRIPTION
 * @property double $CREATED_AT
 * @property double $UPDATED_AT
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'POST';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['POST_ID'], 'required'],
            [['POST_ID', 'USER_ID', 'CREATED_AT', 'UPDATED_AT'], 'number'],
            [['TITLE', 'DESCRIPTION'], 'string', 'max' => 4000]
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'CREATED_AT',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'UPDATED_AT',
                ],
                'value' => function () {
                    return date('U');
                },
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'POST_ID' => Yii::t('app', 'Post'),
            'USER_ID' => Yii::t('app', 'User'),
            'TITLE' => Yii::t('app', 'Title'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'CREATED_AT' => Yii::t('app', 'Created  At'),
            'UPDATED_AT' => Yii::t('app', 'Updated  At'),
        ];
    }
}
