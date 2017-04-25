<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\EduShare;
use common\models\Member;
use common\models\MemberProfile;
use dosamigos\qrcode\QrCode;


/**
 * Site controller
 */
class ShareController extends Controller
{
    /**
     * @inheritdoc
     */

    public function behaviors()
    {
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

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionEdu(){
        $this->layout = false;
        $get = Yii::$app->request->get();

        $shareid = $get['id'];
        if ( !$shareid ){
            return $this->redirect(['site/index']);
        }

        $share = EduShare::findOne($shareid);

        if (!$share){
            return $this->redirect(['site/index']);
        }

        $mid = $get['mid'];

        if ($mid){
            $qrcode = $this->getMemCode($mid);
            $code = $qrcode['qrcode0'];
        }else{
            $code = 'http://www.bjtcgx.com/images/html/qrcode.png';
        }



        return $this->render('edushare',['code'=>$code,'share'=>$share]);
    }


    private function getMemCode($mid){
        $member = Member::findOne($mid);
        return $this->createQrcode([0],$mid,$member);
    }

    private function createQrcode($roleids,$mid,$member){
        $arr = array();
        $path = MEMBER_HEAD_PATH.$mid;//保存二维码路径
        $url = MEMBER_HEAD_URL.$mid;
        if(is_array($roleids) && count($roleids)>0){
            foreach($roleids as $val) {
                $md5 = md5(md5($mid).$member->salt.rand(0,1000000));
                $string1 = substr($md5,0,8);
                $string2 = substr($md5,8,20);
                $string3 = substr($md5,20);
                $name="qrcode_".$val;
                $parameter = $string1."OP".$member->id."SD".$string2."AJ".$member->memberCode."QT".$string3."WS".$val;
                if($val==3){
                    $value = MMCLIENT."member/merchants?parameter=$parameter";
                }else{
                    $value = MMCLIENT."member/register?parameter=$parameter";
                }
                $filename=$path."/$name.jpg";
                $urlname=$url."/$name.jpg";
                @unlink($filename);
                @QRcode::png($value,$filename);
                $arr['qrcode'.$val]=$urlname;
            }
        }
        return $arr;
    }
}
