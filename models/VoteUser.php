<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%vote_user}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $pass
 * @property integer $age
 * @property integer $sex
 * @property string $post
 * @property integer $years
 * @property string $depart
 */
class VoteUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%vote_user}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbvote');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['age', 'sex', 'years'], 'integer'],
            [['name', 'post', 'depart'], 'string', 'max' => 100],
            [['pass'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名字',
            'pass' => '密码',
            'age' => '年龄',
            'sex' => '0男，1女',
            'post' => '职位',
            'years' => '工龄',
            'depart' => '部门',
        ];
    }
}
