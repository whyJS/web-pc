<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%user_info}}".
 *
 * @property string $id
 * @property string $name
 * @property string $mobile
 * @property string $refer
 * @property string $createTime
 */
class UserInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mobile'], 'required'],
            [['name', 'refer'], 'string', 'max' => 255],
            [['mobile'], 'string', 'max' => 11],
            [['createTime'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'mobile' => '手机号',
            'refer' => '来源',
            'createTime' => '创建时间',
        ];
    }
}
