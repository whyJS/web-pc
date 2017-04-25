<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%vote_content}}".
 *
 * @property integer $id
 * @property string $vid
 * @property string $title
 * @property integer $type
 * @property string $content
 * @property string $extra
 */
class VoteContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%vote_content}}';
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
            [['title'], 'required'],
            [['type'], 'integer'],
            [['content', 'extra'], 'string'],
            [['vid', 'title'], 'string', 'max' => 255],
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
            'title' => '题目',
            'type' => '1单选2多选3填空4问答',
            'content' => '内容',
            'extra' => '扩展',
        ];
    }
}
