<?php
/**
 * 二维码注册新用户
 * Tile:二维码注册新用户
 * Date: 2016/5/4
 * Time: 14:53
 */

namespace frontend\controllers;
use frontend\models\MemberModel;
use yii\web\Controller;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use linslin\yii2\curl;
use common\models\Log;
use common\models\Member;

class MemberController extends Controller
{
    private $_show_param;
    public $enableCsrfValidation = false;
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action) {
        $this->_show_param['columnKey'] = strtoupper ( Yii::$app->controller->id . '_' . $action->id );
        $this->_show_param['actionUrl'] = Yii::$app->homeUrl.Yii::$app->controller->id . '/' . $action->id;
        $this->_show_param['actionId'] =  Yii::$app->controller->id.'_'.$action->id;
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }
    public function actionIndex() {
//        $upMobile = '17706483572';
//        $upMember = Member::findBySql("select id from mm_member where mobile=:mobile and status=0 and roleid in (10,11,12,15,16)",[':mobile'=>$upMobile])->one();
//        var_dump($upMember);exit;
        Yii::$app->end();
    }
    public $layout = false;

    //新用户或者新的大众代理注册  2017-04-02 Tianbao KANG
    public function actionRegister(){

        $parameter=Yii::$app->request->isPost?Yii::$app->request->post('parameter',''):Yii::$app->request->get('parameter','');
        $model = new MemberModel();
        preg_match('/OP(\d+)SD/is',$parameter,$match);
        $arr['mid'] = $match && $match[1]?$match[1]:0;
        preg_match('/AJ(.*)?QT/is',$parameter,$match);
        $arr['memberCode'] = $match && $match[1]?$match[1]:0;
        preg_match('/WS(.*)/',$parameter,$match);
        $arr['roleid'] = $match && $match[1]?$match[1]:0;
        /**
         * 添加业务员角色后,不再需要使用sid了
         * Tianbao KANG 2017-04-01
         */
        if (Yii::$app->request->isPost) {
            $error=$model->Register($arr);
            $stringerror=(string)$error;
            return $this->render('successOne',array('error'=>$stringerror));
        } else {
            $roleName = "普通会员";
            if($arr && $arr['roleid']==1){
                $roleName = '大众代理';
            }
            $this->_show_param['roleName']=$roleName;
            $this->_show_param['parameter']=$parameter;
            return $this->render(Yii::$app->controller->action->id, ['show_param'=>$this->_show_param]);
          }
        }

   //注册成功
   public function actionSuccessOne(){
     return $this->render(Yii::$app->controller->action->id);
   }

    //异步请求
    public function actionCurl(){
        $actionId = 100004;
        $post['mobile'] = $_POST['mobile'];
        $host=MMAPIURL."interface/";
        $url = $host."?actionid=".$actionId."&secretString=".md5(md5( APPAPINTERFACE . $actionId . APPROOMNO ));
        $curl = new curl\Curl();
        $curl->setOption(
            CURLOPT_POSTFIELDS,
            http_build_query($post))
            ->post($url);
    }

    /**
     * 商家注册
     */
//    public function actionMerchants(){
//        $parameter=Yii::$app->request->isPost?Yii::$app->request->post('parameter',''):Yii::$app->request->get('parameter','');
//        $model = new MemberModel();
//        preg_match('/OP(\d+)SD/is',$parameter,$match);
//        $arr['mid'] = $match && $match[1]?$match[1]:0;
//        preg_match('/AJ(.*)?QT/is',$parameter,$match);
//        $arr['memberCode'] = $match && $match[1]?$match[1]:0;
//        preg_match('/WS(.*)/',$parameter,$match);
//        $arr['roleid'] = $match && $match[1]?$match[1]:0;
//
//        if (Yii::$app->request->isPost) {
//            $error= $model->Merchants($arr);
//            $stringerror=(string)$error;
//            if($stringerror!=""){
//                return $this->render('successTwo',array('error'=>$stringerror));
//            }else{
//                return $this->render('successTwo',array('ok'=>'1'));
//            }
//        } else {
//            $roleName = "商家会员";
//            $this->_show_param['roleName'] = $roleName;
//            $this->_show_param['parameter'] = $parameter;
//            return $this->render(Yii::$app->controller->action->id, ['show_param' => $this->_show_param]);
//        }
//    }
    /**
     * 商家版用户注册成功
     */
    public function actionSuccessTwo()
    {
        return $this->render(Yii::$app->controller->action->id);
    }

    /**
     * 用户协议
     */
    public function actionXieyi(){
        return $this->render(Yii::$app->controller->action->id);
    }
    /**
     * 商家协议
     */
    public function actionShangjiaxieyi(){
        return $this->render(Yii::$app->controller->action->id);
    }


    /**
     *  2017-04-07 Tianbao KANG 更新商家版注册,简化流程
     */
    public function actionMerchants(){
        $parameter=Yii::$app->request->isPost?Yii::$app->request->post('parameter',''):Yii::$app->request->get('parameter','');
        $model = new MemberModel();
        preg_match('/OP(\d+)SD/is',$parameter,$match);
        $arr['mid'] = $match && $match[1]?$match[1]:0;
        preg_match('/AJ(.*)?QT/is',$parameter,$match);
        $arr['memberCode'] = $match && $match[1]?$match[1]:0;
        preg_match('/WS(.*)/',$parameter,$match);
        $arr['roleid'] = $match && $match[1]?$match[1]:0;

        if (Yii::$app->request->isPost) {
            $error = $model->Merchants($arr);
            $stringerror=(string)$error;
            if($stringerror!=""){
                return $this->render('successTwo',array('error'=>$stringerror));
            }else{
                return $this->render('successTwo',array('ok'=>'1'));
            }
        } else {
            $roleName = "商家会员";
            $this->_show_param['roleName'] = $roleName;
            $this->_show_param['parameter'] = $parameter;
            return $this->render(Yii::$app->controller->action->id, ['show_param' => $this->_show_param]);
        }
    }


}