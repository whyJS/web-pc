<?php

namespace frontend\models;

use common\models\Member;
use vendor\helpers\CurlHelper;
use Yii;
use yii\base\Model;
use vendor\helpers\HtmlHelper;
use vendor\helpers\CommonHelper;
use yii\base\Exception;
use common\models\Log;
/**
 * ContactForm is the model behind the contact form.
 */
class PersonnelModel extends Model{
     /**
      * 注册
      */
     public function registEdit(){
         @extract ( $_REQUEST['data'] );
         $data['name']=$name;
         $data['pass']=$pass;
         $data['sex']=$sex;
         $data['age']=$age;
         $data['xueli']=$xueli;
         $data['years']=$years;
         $data['depart']=$depart;
         $data['post']=$post;
         $data['cengji']=$cengji;
         $user=\Yii::$app->dbVote->createCommand("select * from  mm_vote_user where name LIKE '%$name%' ")->queryOne();
         if(is_array($user) && count($user)>0) {
             return 1;
         }else{
             $insert= \Yii::$app->dbVote->createCommand()->insert("mm_vote_user",$data)->execute();
             if($insert > 0){
                 return 2;
             }else{
                 return 3;
             }
         }
     }
     /**
      * 登录
      */
     public  function login(){
         @extract ( $_REQUEST['data'] );
         $user=\Yii::$app->dbVote->createCommand("select * from  mm_vote_user where name = '$name'  and pass='$pass' ")->queryOne();
         if(is_array($user) && count($user)>0){
             return $user;
         }else{
             return 2;
         }
     }

     /**
      * 查询标题
      */
     public function votoList(){
         return \Yii::$app->dbVote->createCommand("select * from  mm_vote where status=0 ")->queryAll();
     }
     /**
      * 查询问答题目
      */
     public function wendaList($vid){
         return \Yii::$app->dbVote->createCommand("select * from  mm_vote_content where vid='$vid' and type=2")->queryAll();
     }

     /**
      * 查询填空题目
      */
     public function tiankongList($vid){
         return \Yii::$app->dbVote->createCommand("select * from  mm_vote_content where vid='$vid' and type=1")->queryAll();
     }

     /**
      * 答题
      */
     public function answer(){
         @extract ( $_REQUEST['content'] );
         @extract ( $_REQUEST['data'] );
         $list=\Yii::$app->dbVote->createCommand("select * from  mm_vote_answer where vid='$vid' and uid='$uid'")->queryAll();
         if(is_array($list) && count($list)>0){
             return "你已经答过题！";exit;
         }
         foreach ($_REQUEST['content'] as $k=>$v){
             $data['vtid'] =$k;
             $data['answer']=$v;
             $data['uid']=$uid;
             $data['vid']=$vid;
             \Yii::$app->dbVote->createCommand()->insert("mm_vote_answer",$data)->execute();
         }
         return "答题成功！";exit;
     }
}