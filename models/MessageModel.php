<?php

namespace frontend\models;

use common\models\Message;
use Yii;
use yii\base\Model;
use vendor\helpers\HtmlHelper;

/**
 * ContactForm is the model behind the contact form.
 */
class MessageModel extends Model {
    public function messageList($id,$mid,$messageid){
         $batch= Yii::$app->db->createCommand("SELECT b.*,c.content FROM {{%message_batch}} b LEFT JOIN {{%message_content}} c ON b.id = c.bid WHERE b.id=$id")->queryOne();
        if($mid > 0 && $messageid>0){
            //修改message表
            $arr['status']=1;
            Yii::$app->db->createCommand()->update("{{%message}}", $arr, "mid=$mid AND id=$messageid")->execute();
        }
        return $batch;
    }
}
