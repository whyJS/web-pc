<?php
/**
 * Created by PhpStorm.
 * User: Tianbao KANG
 * Date: 2016/12/20
 * Time: 17:39
 */

namespace frontend\models;

use erp\models\Advice;


class OfficialModel extends BaseModel
{
    /////////////////////////////////////////////////
    //新官网开始 2017-01-06
    /////////////////////////////////////////////////
    /**
     * 获取 官网首页轮番图片
     * User: Tianbao KANG 2017-01-06
     */
    public function getIndexPicList(){
        $data = [];
        $list1 = \Yii::$app->dbFront->createCommand("select id,pic,alt from {{%official_index}} where status=1 and type=1 order by `order` desc")->queryAll();
        if(is_array($list1) && count($list1)){
            $data['3d'] = $list1;
        }
        $list2 = \Yii::$app->dbFront->createCommand("select id,pic,alt from {{%official_index}} where status=1 and type=2 order by `order` desc")->queryAll();

        if(is_array($list2) && count($list2)){
            $data['nor'] = $list2;
        }

        return $data;
    }
    /**
     * 获取新闻列表
     * User: Tianbao KANG 2017-01-06
     */
    public function getNewsList(){
        $data = [];
        $pub1 = \Yii::$app->dbFront->createCommand("select id,title,pic,alt,intro from {{%official_news}} where status=1 and  type=1")->queryAll();     //新闻公告-焦点新闻
        if(is_array($pub1) && count($pub1)){
            $data['focus'] = $pub1;
        }
        $pub2 = \Yii::$app->dbFront->createCommand("select id,title,pic,alt,intro from {{%official_news}} where status=1 and  type=0")->queryAll();     //新闻公告-普通新闻
        if(is_array($pub2) && count($pub2)){
            $data['nor'] = $pub2;
        }
        return $data;
    }
    /**
     * 获取新闻主体内容
     * User: Tianbao KANG 2017-01-06
     */
    public function getNewsContent($id){
        $info = \Yii::$app->dbFront->createCommand("select title,intro,content,seo_t,seo_d,seo_k from {{%official_news}} where status=1 and id=$id")->queryOne();
        if($info){
            return $info;
        }
        return false;
    }
    /**
     * 获取最新活动列表
     * User: Tianbao KANG 2017-01-06
     */
    public function getActivityList(){
        $info = \Yii::$app->dbFront->createCommand("select id,pic,alt,title,intro from {{%official_activity}} where status=1")->queryAll();
        if(is_array($info) && count($info)){
            return $info;
        }
        return false;
    }
    /**
     * 获取最新活动详情
     * User: Tianbao KANG 2017-01-06
     */
    public function getActivityContent($id){
        $info = \Yii::$app->dbFront->createCommand("select title,intro,content,createTime,updateTime,seo_t,seo_d,seo_k from {{%official_activity}} where status=1 and id=$id")->queryOne();
        if($info){
            $info['ctime'] = $info['updateTime']>$info['createTime']?$info['updateTime']:$info['createTime'];
            return $info;
        }
        return false;
    }
    /**
     * 获取优秀品牌商列表
     * User: Tianbao KANG 2017-01-06
     */
    public function getMerchantList(){
        $info = \Yii::$app->dbFront->createCommand("select id,`name`,pic,alt from {{%official_merchant}}")->queryAll();
        if(is_array($info) && count($info)){
            return $info;
        }
        return false;
    }
    /**
     * 获取品牌商详情
     * User: Tianbao KANG 2017-01-12
     */
    public function getMerchantById($id){
        $info = \Yii::$app->dbFront->createCommand("select `name`,intro,content,seo_t,seo_d,seo_k from {{%official_merchant}} where status=1 and id=$id")->queryOne();
        if($info){
            return $info;
        }
        return false;
    }
    /**
     * 获取招商加盟列表
     * User: Tianbao KANG 2017-01-06
     */
    public function getJoinList(){
        $info = \Yii::$app->dbFront->createCommand("select id,pic,alt from {{%official_joinus}} where status=1")->queryAll();
        if(is_array($info) && count($info)){
            return $info;
        }
        return false;
    }


    /**
     * 获取各个页面的tdk
     * Tianbao KANG 2017-03-08
     */
    public function getSeoTdk($name){
        $info = \Yii::$app->dbFront->createCommand("select sys_t,sys_d,sys_k from {{%official_system}} where name='{$name}'")->queryOne();
        return $info;
    }






    /////////////////////////////////////////////////
    //新官网结束 2017-01-06
    /////////////////////////////////////////////////

}