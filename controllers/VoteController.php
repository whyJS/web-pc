<?php
namespace frontend\controllers;
/**
 * 公司内部投票专用
 */
use Yii;
use yii\web\Controller;





class VoteController extends Controller
{
//    public $layout = 'wap-main.php';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [];
    }

    public function beforeAction($action)
    {
        if(!HtmlHelper::isMobileDevice()){
            $this->redirect(Url::toRoute('site/'.$this->action->id));
        }
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    public function actionLogin(){

    }

    public function actionDoLogin(){

    }

    public function actionRegister(){

    }

    public function actionDoRegister(){

    }
}