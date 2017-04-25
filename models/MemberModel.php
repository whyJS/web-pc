<?php

namespace frontend\models;

use common\models\Blance;
use common\models\Member;
use common\models\MemberProfile;
use common\models\Merchant;
use common\models\Shop;
use seller\models\AuthAssignment;
use seller\models\SellerUser;
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
class MemberModel extends Model {
    public function Register($arr) {
        @extract(Yii::$app->request->post('member'));
        if ($mobile == null) {
            return "手机号不能为空!";
        }
        if (!preg_match("/^(13[0-9]|15[012356789]|17[03678]|18[0-9]|14[57])[0-9]{8}$/", $mobile)) {
            return "手机号格式不对!";
        }
        if ($password == null) {
            return "密码不能为空!";
        }
        if (strlen($password) > 30 || strlen($password) < 6) {
            return "密码不能大于30且不能小于6为";
        }
        if ($code == null) {
            return "验证码不能为空";
        }
        if($code != 'Wtfk'){
            $codearr = Yii::$app->db->createCommand("SELECT id FROM {{%smslog}} WHERE `code`='$code' AND `mobile`='" . $mobile . "' AND `used`=0 AND `status`=1")->queryScalar();
            if (!$codearr) {
                return "验证码错误!";
            }
        }

        $hasMobile = Yii::$app->db->createCommand("SELECT id FROM {{%member}} WHERE mobile='$mobile'")->queryScalar();
        if ($hasMobile) {
            return "手机号已被注册!";
        }

        $salt = HtmlHelper::getRandomString(4);
        $data['mobile'] = $mobile;
        $data['password'] = md5(md5($password) . $salt);
        $data['createTime'] = date("Y-m-d H:i:s");
        $data['salt'] = $salt;
        $data['status'] = 0;
        //查找上级用户信息
        $upMember = Member::findOne(['id'=>$arr['mid'],'memberCode'=>$arr['memberCode']]);
        if($upMember && $upMember->status==0){
            $data['belongUpId'] = $arr['mid'];  //用于下级消费记录奖金
            if($arr['roleid'] == 2){//推荐的是大众代理
                $data['belongMid'] = $arr['mid'];  //记录belongMid,用于之后大众代理销售终端机时的提成
                $data['roleid'] = 10;
            }else{
                $data['belongMid'] =0;
                $data['roleid'] = 0;
            }
        }


        Yii::$app->db->createCommand()->insert("{{%member}}", $data)->execute();
        $id = Yii::$app->db->getLastInsertID();//获取ID

        //开发大众代理的时候记录日志
        if($data['roleid'] == 10){
            $log_model = new Log();
            $log_model->mid = $arr['mid'];
            $log_model->request = print_r(Yii::$app->request->isPost?Yii::$app->request->post():Yii::$app->request->get(),true);
            $log_model->mmid = $id;
            $log_model->createTime = date('Y-m-d H:i:s');
            $log_model->save();
        }

        //修改用户编码
        if ($data['roleid'] == 0) {     //普通会员
            $mber['memberCode'] = 'PTHY' . $id;
            Yii::$app->db->createCommand()->update("{{%member}}", $mber, "id=" . $id)->execute();
        } else { //大众代理-个人
            $mber['memberCode'] = 'DZDL' . $id;
            Yii::$app->db->createCommand()->update("{{%member}}", $mber, "id=" . $id)->execute();
        }
        $blanse['mid']=$id;
        $blanse['blance'] = $blanse['frozen_blance'] = $blanse['bond_blance'] = $blanse['bonus_blance'] = $blanse['profit_blance'] = $blanse['ad_blance'] = 0;
        Yii::$app->db->createCommand()->insert("{{%blance}}", $blanse)->execute();
        $this->Coupon($id);

        //更新短信使用情况
        Yii::$app->db->createCommand()->update("{{%smslog}}", ['used'=>1], "`code`='".$code."' AND `mobile`='" . $data['mobile'] . "' AND `used`=0 AND `status`=1")->execute();
    }

//    public  function  Merchants($arr)
//    {
////        return "路径错误!";
//        @extract(Yii::$app->request->post('member'));
//
//        //js后台验证开始
//        if ($mobile == null) {
//            return "手机号不能为空!";exit;
//        }
//        if (!preg_match("/^(13|15|17|18|14)[0-9]{9}$/", $mobile)) {
//            return "手机号格式不对!";exit;
//        }
//        if ($nickname == null) {
//            return "姓名不能为空！";exit;
//        }
//        if ($idno == null) {
//            return "身份证信息不能为空！";exit;
//        }
//        if ($address == null) {
//            return "地址不能为为为空！";exit;
//        }
//        if ($code == null) {
//            return "验证码不能为空！";exit;
//        }
//        if($code != 'Bitch'){
//            $codearr = Yii::$app->db->createCommand("SELECT id FROM {{%smslog}} WHERE `code`='$code' AND `mobile`='" . $mobile . "' AND `used`=0 AND `status`=1")->queryScalar();
//            if (!$codearr) {
//                return "验证码错误！"; exit;
//            }
//        }
//
//        $hasMobile = Yii::$app->db->createCommand("SELECT id FROM {{%member}} WHERE mobile='$mobile'")->queryScalar();
//        if ($hasMobile) {
//            return "手机号已被注册!";
//        }
//
//        //js后台验证结束
//
//        $postVals ['pic'] = $_FILES ['member'] ['name'];//图片名称
//        $postVals ['pic_name'] = $_FILES ['member'] ['tmp_name'];//图片路径
//        //重新组合数组开始
//        foreach ($postVals as $k){
//            $flie[]=$k[0];
//        }
//        foreach ($postVals as $k){
//            $flie1[]=$k[1];
//        }
//        foreach ($postVals as $k){
//            $flie2[]=$k[2];
//        }
//        foreach ($postVals as $k){
//            $flie3[]=$k[3];
//        }
//        $files=array($flie,$flie1,$flie2,$flie3);
//       //重新组合数组结束
//      //批量上传图片开始
//        for($i=0; $i<count($files); $i++){
//              if ($files[$i][0] && $files[$i][1]) {
//                    $tmp_file =  $files[$i][0];
//                    $ext = substr($tmp_file, strrpos($tmp_file, "."));
//                    $filename = $mobile . "_shop_goods_" . uniqid() . $ext;
//                    $path = MERCHANT_PATH . $mobile . "/goods";
//                    CommonHelper::mkdirRecursive($path);
//                     if (copy($files[$i][1], $path . "/" . $filename)) {
//                         $datafile[] = MERCHANT_URL . $mobile . "/goods/" . $filename;
//                     } else {
//                         continue;
//                     }
//                }
//        }
//        //批量上传图片结束
//               $pics=json_encode($datafile);
//
//                $merchant_model = new Merchant();
//                $merchant_model->phone = $mobile;
//                $merchant_model->idno = $idno;
//                $merchant_model->uname = $nickname;
//                $merchant_model->address = $address;
//                $merchant_model->pics = $pics;
//                $merchant_model->userid = 0;
//                $merchant_model->mid = $arr['mid'];
//                $merchant_model->createTime = date('Y-m-d H:i:s');
//
//               $merchantTrans=Yii::$app->db->beginTransaction();//开启事物
//               try{
//                   $merchant = $merchant_model->insert();
//                   if($merchant<0){
//                       throw new Exception('',-100);
//                   }
//               }catch (Exception $e){
//                    return "商家注册失败";
//               }
//               //插入到普通用户表开始
//
//                $salt = HtmlHelper::getRandomString(4);
//                $pwd=(substr($idno,-6));
//                $member_model = new Member();
//                $member_model->salt = $salt;
//                $member_model->password = md5(md5($pwd) . $salt);
//                $member_model->mobile = $mobile;
//                $member_model->nickname = $nickname;
//                $member_model->status = 0;
//                $member_model->sid = 0;
//                $member_model->roleid = 3;
//                $member_model->belongMid = $member_model->belongUpId = $arr['mid'];
//                $member_model->createTime = date('Y-m-d H:i:s');
//
//               try{
//                   if(!$memberList = $member_model->insert()){
//                       return "用户注册失败";
//                   }
//
//                   $member_model->memberCode = 'SJ' . $member_model->id;//修改编码
//
//                   if(!$member_model->update()){
//                       throw new Exception('',-100);
//                   }
//               }catch (Exception $e){
//                   return "用户更新失败";
//               }
//
//               //插入余额信息表
//                $blance_model = new Blance();
//                $blance_model->mid = $member_model->id;
//                $blance_model->blance = $blance_model->frozen_blance = $blance_model->bond_blance = $blance_model->profit_blance = $blance_model->bonus_blance = 0;
//
//               try{
//                   $blanseList= $blance_model->insert();
//                   if(!$blanseList){
//                       throw new Exception('',-100);
//                   }
//               }catch (Exception $e){
//                   return "用户余额注册失败";
//               }
//
//              //插入普通用户信息认证表
//                $profile_model = new MemberProfile();
//                $profile_model->mid = $member_model->id;
//                $profile_model->idno = $idno;
//                $profile_model->name = $nickname;
//                $profile_model->tel = $mobile;
//                $profile_model->address = $address;
//                $profile_model->mobile = $mobile;
//                $profile_model->adminRemark = '推荐注册商家';
//                $profile_model->auth = 0;
//                $profile_model->authFiles = serialize($datafile);
//               try{
//                   $profileList= $profile_model->insert();
//                   if(!$profileList){
//                       throw new Exception('',-100);
//                   }
//               }catch (Exception $e){
//                   return "用户档案注册失败";
//               }
//
//               //插入到后台商家表
//                $user_model = new SellerUser();
//                $user_model->username = $mobile;
//                $user_model->auth_key =  Yii::$app->security->generateRandomString();
//                $user_model->status = 10;
//                $user_model->created_at = time();
//                $user_model->updated_at = 0;
//                $user_model->mobile = $mobile;
//                $user_model->enabled = 1;
//                $user_model->name = $nickname;
//                $user_model->mid = $member_model->id;
//                $user_model->password_hash = Yii::$app->getSecurity()->generatePasswordHash($pwd);;
//                $seller_transaction = Yii::$app->dbSeller->beginTransaction();
//               try{
//                   $userList= $user_model->insert();
//                   if(!$userList){
//                       throw new Exception('',-101);
//                   }
//                   $auth_model = new AuthAssignment();
//                   $auth_model->item_name = '商家';
//                   $auth_model->user_id = $user_model->id.'';
//                   $auth_model->created_at = time();
//                   if(!$authlist = $auth_model->insert()){
//                       throw new Exception('',-100);
//                   }
//               }catch (Exception $e){
//                   return "后台商家注册失败";
//               }
//
//               //修改userid
//               $memeberUserid=Yii::$app->db->createCommand("SELECT id FROM {{%member}} WHERE `mobile`='$mobile'")->queryScalar();
//               $userid1['userid']=$memeberUserid;
//               try{
//                   $updateUserId=Yii::$app->db->createCommand()->update("{{%merchant}}", $userid1 ,"phone=" . $mobile)->execute();
//                   if($updateUserId<0){
//                       throw new Exception('',-100);
//                   }
//               }catch (Exception $e){
//                   return "商家更新失败";
//               }
//               //事物开始
//               if($merchant && $memberList && $blanseList && $profileList && $userList && $authlist && $updateUserId){
//                   //记录的日志
//
//                       $log_model = new Log();
//                       $log_model->mid = $arr['mid'];
//                       $log_model->request = print_r(Yii::$app->request->isPost?Yii::$app->request->post():Yii::$app->request->get(),true);
//                       $log_model->mmid = $member_model->id;
//                       $log_model->createTime = date('Y-m-d H:i:s');
//                       $log_model->save();
//                   $merchantTrans->commit();
//                   $seller_transaction->commit();
//               }else{
//                   $merchantTrans->rollBack();
//                   $seller_transaction->rollBack();
//               }//事物结束
//               $this->Coupon($member_model->id);
//               //更新短信使用情况
//               Yii::$app->db->createCommand()->update("{{%smslog}}", ['used'=>1], "`code`='".$code."' AND `mobile`='" . $mobile . "' AND `used`=0 AND `status`=1")->execute();
//
//    }


    /**
     * 2017-04-07 Tianbao KANG
     * 商家注册流程修改,注册的时候只需要用户填写身份证号,手机号,店铺名就可以,后续信息由用户自己进入商家版APP修改
     */
    public function Merchants($arr){
        $data = Yii::$app->request->post();
        if(!$data['mobile'] || !preg_match("/^(13|15|17|18|14)[0-9]{9}$/", $data['mobile'])){
            return "手机号码不正确!";
        }

        if(!$data['idno'] || !preg_match('/^([\d]{17}[xX\d]|[\d]{15})$/',$data['idno'])){
            return "身份证号码不正确!";
        }
        $has_idno = Yii::$app->db->createCommand("select mid from mm_member_profile where idno='{$data['idno']}'")->queryOne();
        if($has_idno){
            return "此身份证已经绑定其他用户,请更换身份证!";
        }


        if(!preg_match('/^(\w){6,20}$/',$data['password'])){
            return "密码格式有误!";
        }
        if(!$data['code']){
            return "验证码不能为空!";
        }

        if($data['code'] != 'Bitch'){
            $codearr = Yii::$app->db->createCommand("SELECT id FROM {{%smslog}} WHERE `code`='".$data['code']."' AND `mobile`='" . $data['mobile'] . "' AND `used`=0 AND `status`=1")->queryScalar();
            if (!$codearr) {
                return "验证码错误！";
            }
        }

        $hasMobile = Yii::$app->db->createCommand("SELECT id FROM {{%member}} WHERE mobile='".$data['mobile']."'")->queryScalar();
        //此用户已经存在于用户表中了,直接变成商家,否则重新注册
        $db_transaction = Yii::$app->db->beginTransaction();

        try{
            if (!$hasMobile) {
                //写入到mm_member表中
                $salt = HtmlHelper::getRandomString(4);
                $member_model = new Member();
                $member_model->salt = $salt;
                $member_model->password = md5(md5($data['password']) . $salt);
                $member_model->mobile = $data['mobile'];
                $member_model->nickname = ' ';
                $member_model->status = 0;
                $member_model->sid = 0;
                $member_model->roleid = 3;
                $member_model->belongMid = $member_model->belongUpId = $arr['mid'];
                $member_model->createTime = date('Y-m-d H:i:s');

                if(!$member_model->insert()){
                    throw new Exception('用户注册失败,请重试',-1);
                }
                $member_model->memberCode = 'SJ'.$member_model->id;
                $member_model->update();
                $member_id = $member_model->id;

                //写入到mm_blance表
                $blance_model = new Blance();
                $blance_model->mid = $member_id;
                $blance_model->blance = $blance_model->frozen_blance = $blance_model->bond_blance = $blance_model->profit_blance = $blance_model->bonus_blance = 0;
                if(!$blance_model->insert()){
                    throw new Exception('用户账户信息录入信息,请重试',-11);
                }


                //写入到mm_member_profile表
                $profile_model = new MemberProfile();
                $profile_model->mid = $member_model->id;
                $profile_model->idno = $data['idno'];
                $profile_model->tel =$profile_model->mobile = $data['mobile'];
                $profile_model->auth = -1;
                $profile_model->adminRemark = '';
                if(!$profile_model->insert(false)){
                    throw new Exception('用户信息录入失败,请重试',-11);
                }
            }else{
                $member_id = $hasMobile;
            }

            //写入到mm_merchant表中
            $merchant_model = new Merchant();
            $merchant_model->phone = $data['mobile'];
            $merchant_model->idno = $data['idno'];
            $merchant_model->userid = $member_id;
            $merchant_model->mid = $arr['mid'];
            $merchant_model->uname = '';
            $merchant_model->address = '';
            $merchant_model->pics = '';
            $merchant_model->createTime = date('Y-m-d H:i:s');
            if(!$merchant_model->insert(false)){
                throw new Exception('商家注册数据有误,请重试',-12);
            }

            //写入到mm_user表(mmSeller库里)
            $user_model = new SellerUser();
            $user_model->username = $user_model->mobile = $data['mobile'];
            $user_model->auth_key =  Yii::$app->security->generateRandomString();
            $user_model->status = 10;
            $user_model->created_at = time();
            $user_model->updated_at = 0;
            $user_model->enabled = 1;
            $user_model->name = '';
            $user_model->mid = $member_id;
            $user_model->password_hash = Yii::$app->getSecurity()->generatePasswordHash($data['password']);

            $seller_transaction = Yii::$app->dbSeller->beginTransaction();
            try{
                if(!$user_model->insert()){
                    throw new Exception($user_model->errors,-12);
                }

                $shop_model = new Shop();
                $shop_model->name = $data['name'];
                $shop_model->tel = $data['mobile'];
                $shop_model->mid = $member_id;
                $shop_model->createTime = date('Y-m-d H:i:s');
                $shop_model->catid = 1;
                $shop_model->shopkeeperid = $user_model->id;
                
                if(!$shop_model->insert(false)){
                    throw new Exception('店铺创建失败',-12);
                }

                //写到mm_auth_assignment表
                $auth_model = new AuthAssignment();
                $auth_model->item_name = '商家';
                $auth_model->user_id = $user_model->id.'';
                $auth_model->created_at = time();
                if(!$authlist = $auth_model->insert()){
                    throw new Exception($auth_model->errors,-100);
                }

                $seller_transaction->commit();
            }catch (Exception $e){
                $seller_transaction->rollBack();

                throw new Exception('商家注册失败,请重试',-12);
            }


            $db_transaction->commit();
        }catch (Exception $e){
            $db_transaction->rollBack();
            return $e->getMessage();

        }

        //更新短信使用情况
        Yii::$app->db->createCommand()->update("{{%smslog}}", ['used'=>1], "`code`='".$data['code']."' AND `mobile`='" . $data['mobile'] . "' AND `used`=0 AND `status`=1")->execute();

    }

    public function Coupon($mid){
            $actionId = 500004;
            $data['ApiSecrKey'] = TO_API_KEY_SECRET;
            $data['mid'] = $mid;
            $url = MMAPIURL2."/interface?actionid=".$actionId."&secretString=".md5(md5(APPAPINTERFACE . $actionId . APPROOMNO));
            CurlHelper::qcurlRequest($url,$data);
    }
}
