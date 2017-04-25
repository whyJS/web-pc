<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%vote_answer}}".
 *
 * @property integer $id
 * @property integer $vid
 * @property integer $vtid
 * @property integer $answer
 * @property integer $uid
 */
class VoteAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%vote_answer}}';
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
            [['vid', 'vtid', 'uid'], 'required'],
            [['vid', 'vtid', 'answer', 'uid'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vid' => '投票 id',
            'vtid' => '题目 id',
            'answer' => 'Answer',
            'uid' => '投票人 id',
        ];
    }
}
