<?php
namespace frontend\controllers;

use common\models\Shop;
use frontend\models\OfficialModel;
use vendor\helpers\HtmlHelper;
use yii\base\Exception;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{

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

    public function beforeAction($action)
    {
//        if(HtmlHelper::isMobileDevice()){
//            $this->redirect(Url::toRoute('site-wap/'.$this->action->id));
//        }
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    //////////////////////////////////////////////
    //新版官网开始 2017-01-06
    //////////////////////////////////////////////
    /**
     * 官网首页轮番图
     * Tianbao KANG 2017-01-06
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new OfficialModel();
        $show_param['3d'] = $model->getIndexPicList()['3d'];
        $show_param['nor'] = $model->getIndexPicList()['nor'];

        $meta = $model->getSeoTdk('index');

        \Yii::$app->name = $meta['sys_t'];

        \Yii::$app->view->registerMetaTag(['name'=>'keywords','content'=>$meta['sys_k']]);
        \Yii::$app->view->registerMetaTag(['name'=>'description','content'=>$meta['sys_d']]);
        return $this->render('index',['show_param'=>$show_param]);
    }
    /**
     * 新闻概要
     * User: Tianbao KANG 2017-01-06
     */
    public function actionNewsList(){
        $model = new OfficialModel();
        $show_param['dataList'] = $model->getNewsList();
        $meta = $model->getSeoTdk('news-list');
        \Yii::$app->name = $meta['sys_t'];
        \Yii::$app->view->registerMetaTag(['name'=>'keywords','content'=>$meta['sys_k']]);
        \Yii::$app->view->registerMetaTag(['name'=>'description','content'=>$meta['sys_d']]);
        return $this->render('news-list',['show_param'=>$show_param]);
    }
    /**
     * 新闻详情
     * User: Tianbao KANG 2017-01-06
     */
    public function actionNewsContent(){
        $id = \Yii::$app->request->get('id',0);
        if($id){
            $model = new OfficialModel();
            $show_param = $model->getNewsContent($id);
            \Yii::$app->name = $show_param['seo_t'];
            \Yii::$app->view->registerMetaTag(['name'=>'keywords','content'=>$show_param['seo_k']]);
            \Yii::$app->view->registerMetaTag(['name'=>'description','content'=>$show_param['seo_d']]);
            return $this->render('news-content',['show_param'=>$show_param]);
        }

    }
    /**
     * 最新活动
     * User: Tianbao KANG 2017-01-06
     */
    public function actionActivityList(){
        $model = new OfficialModel();
        $show_param['dataList'] = $model->getActivityList();
        $meta = $model->getSeoTdk('activity-list');
        \Yii::$app->name = $meta['sys_t'];
        \Yii::$app->view->registerMetaTag(['name'=>'keywords','content'=>$meta['sys_k']]);
        \Yii::$app->view->registerMetaTag(['name'=>'description','content'=>$meta['sys_d']]);
        return $this->render('activity-list',['show_param'=>$show_param]);
    }
    /**
     * 最新活动详情
     * User: Tianbao KANG 2017-01-06
     */
    public function actionActivityContent(){
        $id = \Yii::$app->request->get('id',0);
        if($id){
            $model = new OfficialModel();
            $show_param = $model->getActivityContent($id);
            \Yii::$app->name = $show_param['seo_t'];
            \Yii::$app->view->registerMetaTag(['name'=>'keywords','content'=>$show_param['seo_k']]);
            \Yii::$app->view->registerMetaTag(['name'=>'description','content'=>$show_param['seo_d']]);
            return $this->render('news-content',['show_param'=>$show_param]);
        }
    }
    /**
     * 优秀品牌商
     * User: Tianbao KANG 2017-01-06
     */
    public function actionMerchantList(){
        $model = new OfficialModel();
        $show_param['dataList'] = $model->getMerchantList();
        $meta = $model->getSeoTdk('merchant-list');
        \Yii::$app->name = $meta['sys_t'];
        \Yii::$app->view->registerMetaTag(['name'=>'keywords','content'=>$meta['sys_k']]);
        \Yii::$app->view->registerMetaTag(['name'=>'description','content'=>$meta['sys_d']]);
        return $this->render('merchant-list',['show_param'=>$show_param]);
    }
    /**
     * 优秀品牌商详情
     * User: Tianbao KANG 2017-01-12
     */
    public function actionMerchantContent(){
        $id = \Yii::$app->request->get('id',0);
        if($id){
            $model = new OfficialModel();
            $show_param = $model->getMerchantById($id);
            \Yii::$app->name = $show_param['seo_t'];
            \Yii::$app->view->registerMetaTag(['name'=>'keywords','content'=>$show_param['seo_k']]);
            \Yii::$app->view->registerMetaTag(['name'=>'description','content'=>$show_param['seo_d']]);
            return $this->render('merchant-content',['show_param'=>$show_param]);
        }

    }
    /**
     * 招商加盟列表
     * User: Tianbao KANG 2017-01-06
     */
    public function actionJoinusList(){
        $model = new OfficialModel();
        $show_param['dataList'] = $model->getJoinList();
        $meta = $model->getSeoTdk('joinus-list');
        \Yii::$app->name = $meta['sys_t'];
        \Yii::$app->view->registerMetaTag(['name'=>'keywords','content'=>$meta['sys_k']]);
        \Yii::$app->view->registerMetaTag(['name'=>'description','content'=>$meta['sys_d']]);
        return $this->render('joinus-list',['show_param'=>$show_param]);
    }
    /**
     * User: Tianbao KANG
     * 区域代理和加盟代理商详情注册
     */
    public function actionJoinusContent(){
        $id = \Yii::$app->request->get('id');

        if($_POST){
            header('content-type:text/html;charset=utf-8');
            $data = \Yii::$app->request->post();
            $model = new OfficialModel();
            if(!$data['name'] || !$data['mobile'] || !$data['region']){
                echo "<script>alert('请将您的姓名、手机号或所在地区填写完整');window.location='http://www.tongchuanggongxiang.com/site/joinus-content?id=1'</script>"; exit;    //信息填写不完整
            }

            if(!$data['mobile']  || !preg_match('/^1[34578]\d{9}$/',$data['mobile'])){
                echo "<script>alert('请输入正确的手机号码 ');window.location='http://www.tongchuanggongxiang.com/site/joinus-content?id=1'</script>"; exit;    //信息填写不完整
            }
            $has = \Yii::$app->dbFront->createCommand("select * from `mm_official_partner` where mobile='{$data['mobile']}'")->queryOne();
            if($has){
                echo "<script>alert('此手机已经申请成功,请更换手机号');window.location='http://www.tongchuanggongxiang.com/site/joinus-content?id=1'</script>"; exit;    //信息填写不完整
            }

            $res = $model->partnerReg($data);
            if($res){
                echo "<script>alert('我们已经收到您的加入信息,请耐心等待我们的客服人员和您联系~');window.location='http://www.tongchuanggongxiang.com/site/joinus-content?id=1'</script>";
                exit;
            }else{
                echo "<script>alert('数据有误,请重试或者免费拨打我们的官方电话!');window.location='http://www.tongchuanggongxiang.com/site/joinus-content?id=1'</script>";
                exit;
            }
        }


        if($id==1){
            return $this->render('region-content');
        }elseif($id==2){
            return $this->render('partner-content');
        }

    }

    /**
     * User: Tianbao KANG
     * 判断区域代理注册手机号是否存在
     */
    public function actionJoinusContentHas(){
        $mobile = \Yii::$app->request->post('mobile');
        if(!$mobile  || !preg_match('/^1[34578]\d{9}$/',$mobile)){
            return '-1';        //手机号格式错误
        }
        $has = \Yii::$app->dbFront->createCommand("select * from `mm_official_partner` where mobile='$mobile'")->queryOne();
        if($has){
            return '0';
        }else{
            return '1';
        }

    }




    /**
     * 联系我们
     * User: Tianbao KANG 2017-01-06
     */
    public function actionContactUs(){
        $model = new OfficialModel();
        $meta = $model->getSeoTdk('contact-us');
        \Yii::$app->name = $meta['sys_t'];
        \Yii::$app->view->registerMetaTag(['name'=>'keywords','content'=>$meta['sys_k']]);
        \Yii::$app->view->registerMetaTag(['name'=>'description','content'=>$meta['sys_d']]);
        return $this->render('contact-us');
    }
    /**
     * 普通版
     * User: Tianbao KANG 2017-01-06
     */
    public function actionSdjApp(){
        $model = new OfficialModel();
        $meta = $model->getSeoTdk('sdj-app');
        \Yii::$app->name = $meta['sys_t'];
        \Yii::$app->view->registerMetaTag(['name'=>'keywords','content'=>$meta['sys_k']]);
        \Yii::$app->view->registerMetaTag(['name'=>'description','content'=>$meta['sys_d']]);
        return $this->render('sdj-app');
    }
    /**
     * 商家版
     * User: Tianbao KANG 2017-01-06
     */
    public function actionSellerApp(){
        $model = new OfficialModel();
        $meta = $model->getSeoTdk('seller-app');
        \Yii::$app->name = $meta['sys_t'];
        \Yii::$app->view->registerMetaTag(['name'=>'keywords','content'=>$meta['sys_k']]);
        \Yii::$app->view->registerMetaTag(['name'=>'description','content'=>$meta['sys_d']]);
        return $this->render('seller-app');
    }

    //////////////////////////////////////////////
    //新版官网结束 2017-01-06
    //////////////////////////////////////////////
    /**
     *投票列表
     */
    public function actionVoteList(){
        $voteList = Yii::$app->dbFront->createCommand("select id,name,num,pic from mm_official_elect where status=1 order by id desc")->queryAll();
        return $this->render('vote-list',['voteList'=>$voteList]);
    }

    /**
     * 投票详情页
     */
    public function actionVoteInfo(){
        $id = Yii::$app->request->get('id');
        $data = Yii::$app->dbFront->createCommand('select * from mm_official_elect where id='.$id)->queryOne();
        return $this->render('vote-info',['data'=>$data]);
    }
    /**
     * 投票请求接口
     */
    public function actionVote(){
        //投票的文章 id
        $aid = Yii::$app->request->post('aid');

        if ( !$aid ){
            echo '{"errorCode":1,"errorMessage":"参数不正确"}';
            exit;
        }

        $cookie = $_COOKIE['votePid_'.$aid];

        if ( $cookie ){
            //已经存在 cookie
            echo '{"errorCode":2,"errorMessage":"今天已经投过票了"}';
            exit;
        }

        $value = date('YmdHis').mt_rand(100000,900000);
        setcookie('votePid_'.$aid,$value,time()+86400);
        $userHost = Yii::$app->request->userHost;
        $userAgent = Yii::$app->request->userAgent;
        $userIp = Yii::$app->request->userIP;

        //记录投票
        $res = Yii::$app->dbFront->createCommand("insert into mm_official_person(cookid,voteTime,aid,host,ip,useragent) values('".trim($value)."','".date('Y-m-d H:i:s')."',{$aid},'".$userHost."','".$userIp."','".$userAgent."')")->execute();

        if ( $res ){
            //记录成功，文章投票数+1
            Yii::$app->dbFront->createCommand("update mm_official_elect set num=num+1 where id={$aid} limit 1")->execute();
            echo '{"errorCode":0,"errorMessage":"投票成功，感谢参与！"}';
            exit;
        }
    }

    /**
     * 年夜饭活动内容
     *  2017-01-21
     */
    public function actionSelectContent(){

        return $this->render('select-content');
    }

    /**
     * 年夜饭活动结果
     * User: Tianbao KANG 2017-01-21
     */
    public function actionSelectResult(){
        \Yii::$app->view->registerMetaTag(['name'=>'title','content'=>'顺道嘉年会评选结果 顺道嘉年夜饭活动评选结果']);
        \Yii::$app->view->registerMetaTag(['name'=>'keywords','content'=>'顺道嘉年会、年夜饭,顺道嘉年会、年夜饭活动评选结果']);
        \Yii::$app->view->registerMetaTag(['name'=>'description','content'=>'2016年顺道嘉年会活动有奖投票评选活动以及2017年春节年夜饭有奖投票评选活动的投票评选结果']);
        return $this->render('select-result');
    }



    ////////////////////////////////////////////////////////////
    //宝贝去哪活动
    ////////////////////////////////////////////////////////////
    /**
     * 宝贝报名页面
     * User: Tianbao KANG
     * 2017-02-23
     */
    public function actionBabyReg(){
        if($_POST){
            $data = \Yii::$app->request->post();
            $data['sex'] = $data['sex']=='1'?'男':'女';
            if(!$data['age'] || !$data['name'] || !$data['mobile'] || !$data['address']){
                return '0';         //数据不完整
            }

            $data = \Yii::$app->request->post();
            if(!$data['mobile']  || !preg_match('/^1[34578]\d{9}$/',$data['mobile'])){
                return '-1';        //手机号格式错误
            }
            //2017-03-03 田东要求姓名和手机号不能同时重复
            $has = (new Query())->select('id')->from('mmfront.mm_official_baby_user')->Where(['name'=>$data['name'],'mobile'=>$data['mobile']])->all();
            if($has){
                return '-2';    //手机号和姓名同时重复
            }
            $model = new OfficialModel();
            $res = $model->babyReg($data);
            if($res==1){
                return '1'; //报名成功
            }else{
                return '-3';    //数据错误,重试
            }
        }
        return $this->render('baby-reg');
    }









    ///////////////////////////////////////////////////////////
    //关于我们 2017-03-02
    ///////////////////////////////////////////////////////////

    public function actionAboutUs(){

        $model = new OfficialModel();
        $meta = $model->getSeoTdk('about-us');
        \Yii::$app->name = $meta['sys_t'];
        \Yii::$app->view->registerMetaTag(['name'=>'keywords','content'=>$meta['sys_k']]);
        \Yii::$app->view->registerMetaTag(['name'=>'description','content'=>$meta['sys_d']]);
        return $this->render('about-us');
    }
    
    
    ///////////////////////////////////////////////////////////
    //关于我们---公司简介 2017-03-02
    ///////////////////////////////////////////////////////////

    public function actionAboutUsCompany(){

        $model = new OfficialModel();
        $meta = $model->getSeoTdk('about-us-company');
        \Yii::$app->name = $meta['sys_t'];
        \Yii::$app->view->registerMetaTag(['name'=>'keywords','content'=>$meta['sys_k']]);
        \Yii::$app->view->registerMetaTag(['name'=>'description','content'=>$meta['sys_d']]);
        return $this->render('about-us-company');
    }



    /**
     * 关于我们项目
     */
    public function actionAboutUsProject(){
 		$model = new OfficialModel();
        $meta = $model->getSeoTdk('about-us-project');
        \Yii::$app->name = $meta['sys_t'];
        \Yii::$app->view->registerMetaTag(['name'=>'keywords','content'=>$meta['sys_k']]);
        \Yii::$app->view->registerMetaTag(['name'=>'description','content'=>$meta['sys_d']]);
        return $this->render('about-us-project');
    }

    /**
     * 关于我们-五大体系
     */
    public function actionAboutUsSystem(){
		$model = new OfficialModel();
        $meta = $model->getSeoTdk('about-us-system');
        \Yii::$app->name = $meta['sys_t'];
        \Yii::$app->view->registerMetaTag(['name'=>'keywords','content'=>$meta['sys_k']]);
        \Yii::$app->view->registerMetaTag(['name'=>'description','content'=>$meta['sys_d']]);
        return $this->render('about-us-system');
    }



    /**
     * 关于我们-分润模式
     */
    public function actionAboutUsShare(){
		$model = new OfficialModel();
        $meta = $model->getSeoTdk('about-us-share');
        \Yii::$app->name = $meta['sys_t'];
        \Yii::$app->view->registerMetaTag(['name'=>'keywords','content'=>$meta['sys_k']]);
        \Yii::$app->view->registerMetaTag(['name'=>'description','content'=>$meta['sys_d']]);
        return $this->render('about-us-share');
    }


    ///////////////////////////////////////////////
    //店铺地图展示部分
    ///////////////////////////////////////////////

    /**
     * Tianbao KANG 2017-03-20
     * 获取店铺坐标及创建时间,用于大屏幕展示
     */
    public function actionGetShopMap(){
        $num = \Yii::$app->request->post('num',0);   //获取查询的第几次
//        $num = 1;
        $time = 5 * 60; //设置播放时间为5分钟
        $interval = 10;    //设置查询的时间间隔
        $end = strtotime('2017-03-15 00:00:00');     //设置结束时间为 2017-03-15 00:00:00
        $start = strtotime('2016-06-02 00:00:00');         //直接查出最开始创建店铺的时间,写死
//        $start = \Yii::$app->db->createCommand("select createTime from mm_shop order by createTime asc limit 1")->queryOne()['createTime'];  //开始时间
        $ratio =  ($end - $start) / $time;  //计算时间比例尺

        $s_start = date('Y-m-d H:i:s',$interval * $num * $ratio + $start);    //查询开始时间
        $s_end = date('Y-m-d H:i:s',$interval * ($num + 1 ) * $ratio + $start);    //查询结束时间



        $res = \Yii::$app->db->createCommand("select id,createTime,latitude,lontitude from mm_shop where createTime>= '{$s_start}' and createTime<'{$s_end}' and lontitude!='' and latitude!='' order by createTime asc")->queryAll();

        if(strtotime($s_end)<=$end){         //如果查询时间还没到指定的最后时间,继续查询
            if(is_array($res) && count($res)){
            foreach($res as $k=>$v){
                $res[$k]['createTime'] = ((strtotime($res[$k+1]['createTime']) - strtotime($res[$k]['createTime'])) / $ratio) * 1000;
            }
            echo HtmlHelper::getApiJsonSimple('HAS_DATA',$res);exit;
        }else{
                $res = array();
                echo HtmlHelper::getApiJsonSimple("HAS_DATA",$res);exit;
            }
        }else{
            $res = array('createTime'=>'-100000000');
            echo HtmlHelper::getApiJsonSimple("HAS_DATA",$res);exit;
        }

    }

    /*
     * 所有店铺地图打点
     */
    public function actionGetAllShop(){
        if ( $_POST['type'] == 1 ){
            $data = \Yii::$app->db->createCommand("select headPic,latitude,lontitude,name,tel,locaddress from mm_shop where latitude != '' and lontitude != ''")->queryAll();
        }else{
            $data = \Yii::$app->db->createCommand("select latitude,lontitude from mm_shop where latitude != '' and lontitude != ''")->queryAll();
        }
        echo json_encode($data);
        exit;
    }

    public function actionAllShop(){
        $this->layout = false;
        return $this->render('all-map');
    }

    public function actionAllShopAndName(){
        $this->layout = false;
        return $this->render('all-shop-and-name');
    }

    public function actionMap(){
        $this->layout = false;
        return $this->render('map');
    }

    /**
     * 所有店铺点击时展示店铺名称和店铺的图片
     */
    public function actionMapInfo(){
        $this->layout = false;
        return $this->render('map-info');
    }

    public function actionGetMapInfoShop(){
        $num = \Yii::$app->request->post('num',0);   //获取查询的第几次
        $time = 5 * 60; //设置播放时间为5分钟
        $interval = 10;    //设置查询的时间间隔
        $end = strtotime('2017-03-15 00:00:00');     //设置结束时间为 2017-03-15 00:00:00
        $start = strtotime('2016-06-02 00:00:00');         //直接查出最开始创建店铺的时间,写死
        $ratio =  ($end - $start) / $time;  //计算时间比例尺

        $s_start = date('Y-m-d H:i:s',$interval * $num * $ratio + $start);    //查询开始时间
        $s_end = date('Y-m-d H:i:s',$interval * ($num + 1 ) * $ratio + $start);    //查询结束时间

        $res = \Yii::$app->db->createCommand("select id,createTime,latitude,lontitude,headPic,locaddress,name from mm_shop where createTime>= '{$s_start}' and createTime<'{$s_end}' and lontitude!='' and latitude!='' order by createTime asc")->queryAll();

        if(strtotime($s_end)<=$end){         //如果查询时间还没到指定的最后时间,继续查询
            if(is_array($res) && count($res)){
                foreach($res as $k=>$v){
                    $res[$k]['createTime'] = ((strtotime($res[$k+1]['createTime']) - strtotime($res[$k]['createTime'])) / $ratio) * 1000;
                    $res[$k]['name'] = str_replace(PHP_EOL,'',$v['name']);
                    $res[$k]['locaddress'] = str_replace(PHP_EOL,'',$v['locaddress']);
                }
                echo HtmlHelper::getApiJsonSimple('HAS_DATA',$res);exit;
            }else{
                $res = array();
                echo HtmlHelper::getApiJsonSimple("HAS_DATA",$res);exit;
            }
        }else{
            $res = array('createTime'=>'-100000000');
            echo HtmlHelper::getApiJsonSimple("HAS_DATA",$res);exit;
        }
    }

    public function actionGetMapInfo(){
        exit();
        $id = \Yii::$app->request->post('id',0);
//        $id = 8;
        if($id>0){
            $res = \Yii::$app->db->createCommand("select name,headPic from mm_shop where id=$id")->queryOne();
            if($res){
                echo HtmlHelper::getApiJsonSimple("HAS_DATA",$res);exit;
            }else{
                echo HtmlHelper::getApiJsonSimple("PARAM_ERROR");exit;
            }

        }else{
            echo HtmlHelper::getApiJsonSimple("PARAM_ERROR");exit;
        }
    }

    public function actionRegion(){
        $this->layout = false;
        //省直辖市
        $data = \Yii::$app->db->createCommand("select * from mm_area where parentid=0")->queryAll();
        return $this->render('region',['data'=>$data]);
    }


    public function actionGetCity(){
        $code = \Yii::$app->request->post('code');

        $data = \Yii::$app->db->createCommand("select * from mm_area where parentid=(select id from mm_area where adcode='{$code}')")->queryAll();

        echo json_encode($data);
    }
}
