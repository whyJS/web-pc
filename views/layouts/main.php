<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\IndexAsset;
IndexAsset::register($this);
$baseUrl = Yii::$app->getHomeUrl();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="baidu-site-verification" content="M3sS8ppaNF" />
    <meta name="renderer" content="webkit">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="<?= $baseUrl ?>js/jquery.js?2017030701"></script>
    <?php $this->head() ?>
    <meta name="baidu-site-verification" content="FGoQKWIXej" />
</head>
<body>
<?php $this->beginBody() ?>
<div id="ieless8" style="display:none;width:100%;padding:10px;background:yellow;color:red;">您的浏览器版本过低，请使用IE8以上版本</div>
<script type="text/javascript">
    var DEFAULT_VERSION = "8.0";
    var ua = navigator.userAgent.toLowerCase();
    var isIE = ua.indexOf("msie")>-1;
    var safariVersion;
    if(isIE){
        safariVersion =  ua.match(/msie ([\d.]+)/)[1];
    }
    if(safariVersion <= DEFAULT_VERSION ){
        // 进行你所要的操作
        document.getElementById('ieless8').style.display = '';
    }
</script>

<header class="head">
    <div class="head_nav">
        <div class="head_nav_logo" style="background: #00325a;">
            <a href="<?=$baseUrl?>" style="background: #00325a;">
                <img src="<?= $baseUrl ?>images/new/logo1.png?2017021802" width="84px" height="20px" alt="社区超市 手机O2O">
                <span style="">北京同创共享网络科技有限公司</span>
            </a>
        </div>
        <ul>
            <li>
                <a  <?php if(\Yii::$app->controller->action->id=='index'){?>class="current"<?php }?>  href="<?= \yii\helpers\Url::toRoute('/site/index')?>">首页</a>
            </li>
            <li>
                <a  <?php if(\Yii::$app->controller->action->id=='about-us'){?>class="current"<?php }?>   href="<?= \yii\helpers\Url::toRoute('/site/about-us')?>">关于我们</a>
            </li>
            <li>
                <a  <?php if(\Yii::$app->controller->action->id=='news-list'){?>class="current"<?php }?>   href="<?= \yii\helpers\Url::toRoute('/site/news-list')?>">新闻概要</a>
            </li>
            <li id="app">
                <a  <?php if(\Yii::$app->controller->action->id=='seller-app' || \Yii::$app->controller->action->id=='sdj-app'){?>class="current"<?php }?> >
                    APP
                </a>
                <div>
                    <a <?php if(\Yii::$app->controller->action->id=='sdj-app'){?>class="current"<?php }?>  href="<?= \yii\helpers\Url::toRoute('/site/sdj-app')?>">
                        <p>用户版</p>
                    </a>
                    <a  <?php if(\Yii::$app->controller->action->id=='seller-app'){?>class="current"<?php }?>  href="<?= \yii\helpers\Url::toRoute('/site/seller-app')?>">
                        <p>商家版</p>
                    </a>
                </div>

            </li>
            <li>
                <a  <?php if(\Yii::$app->controller->action->id=='activity-list'){?>class="current"<?php }?>   href="<?= \yii\helpers\Url::toRoute('/site/activity-list')?>">最新活动</a>
            </li>
            <li>
                <a  <?php if(\Yii::$app->controller->action->id=='merchant-list'){?>class="current"<?php }?>   href="<?= \yii\helpers\Url::toRoute('/site/merchant-list')?>">优秀品牌商</a>
            </li>
            <li>
                <a  <?php if(\Yii::$app->controller->action->id=='joinus-list'){?>class="current"<?php }?>   href="<?= \yii\helpers\Url::toRoute('/site/joinus-list')?>">招商加盟</a>
            </li>
            <!--<li>
                <a  <?php if(\Yii::$app->controller->action->id=='contact-us'){?>class="current"<?php }?>   href="<?= \yii\helpers\Url::toRoute('/site/contact-us')?>">联系我们</a>
            </li>-->
<!--            <li>-->
<!--                <a  --><?php //if( in_array(\Yii::$app->controller->action->id,['vote-list','vote-info']) ){?><!--class="current"--><?php //}?><!--   href="--><?//= \yii\helpers\Url::toRoute('/site/vote-list')?><!--">年会投票</a>-->
<!--            </li>-->
        </ul>
    </div>
</header>


<div class="head_dv">
    <ul>
        <li><img src="<?= $baseUrl ?>images/new/logo1.png" width="84px" height="20px" alt="手机超市 社区O2O"></li>
        <li><span class="head_dv_span">导航</span></li>
    </ul>
</div>
<div id="head_dv2">
    <div class="head_dv2">
        <ul>
            <li <?php if(\Yii::$app->controller->action->id=='index'){?>class="current"<?php }?> >
                <a  href="<?= \yii\helpers\Url::toRoute('/site/index')?>">首页</a>
            </li>
            <li <?php if(\Yii::$app->controller->action->id=='about-us'){?>class="current"<?php }?>   >
                <a href="<?= \yii\helpers\Url::toRoute('/site/about-us')?>">关于我们</a>
            </li>
            <li <?php if(\Yii::$app->controller->action->id=='news-list'){?>class="current"<?php }?> >
                <a   href="<?= \yii\helpers\Url::toRoute('/site/news-list')?>">新闻概要</a>
            </li>
            <li <?php if(\Yii::$app->controller->action->id=='seller-app'){?>class="current"<?php }?>   id="nav_app">
                <a href="<?= \yii\helpers\Url::toRoute('/site/seller-app')?>">商家版</a>
            </li>
            <li  <?php if(\Yii::$app->controller->action->id=='sdj-app'){?>class="current"<?php }?>  id="nav_app">
                <a  href="<?= \yii\helpers\Url::toRoute('/site/sdj-app')?>">用户版</a>
            </li>
            <li <?php if(\Yii::$app->controller->action->id=='activity-list'){?>class="current"<?php }?> >
                <a   href="<?= \yii\helpers\Url::toRoute('/site/activity-list')?>">最新活动</a>
            </li>
            <li <?php if(\Yii::$app->controller->action->id=='merchant-list'){?>class="current"<?php }?>  >
                <a  href="<?= \yii\helpers\Url::toRoute('/site/merchant-list')?>">优秀品牌商</a>
            </li>
            <li <?php if(\Yii::$app->controller->action->id=='joinus-list'){?>class="current"<?php }?>  >
                <a  href="<?= \yii\helpers\Url::toRoute('/site/joinus-list')?>">招商加盟</a>
            </li>
            <!--<li <?php if(\Yii::$app->controller->action->id=='contact-us'){?>class="current"<?php }?>   >
                <a href="<?= \yii\helpers\Url::toRoute('/site/contact-us')?>">联系我们</a>
            </li>-->
<!--            <li>-->
<!--                <a  --><?php //if( in_array(\Yii::$app->controller->action->id,['vote-list','vote-info']) ){?><!--class="current"--><?php //}?><!--   href="--><?//= \yii\helpers\Url::toRoute('/site/vote-list')?><!--">年会投票</a>-->
<!--            </li>-->
        </ul>
    </div>
</div>

<?= $content; ?>
<!--- 年夜饭及年会活动入口 --->
<!--<div style="top: 50%;position: fixed;right: 0px;">-->
<!--    <a href="--><?//= \yii\helpers\Url::toRoute('/site/select-content')?><!--" target="_blank"><img id="asimg" src="--><?//= $baseUrl ?><!--images/new/nyf2.png"  /></a>-->
<!--</div>-->

<!--- 宝贝去哪活动入口 --->
<!--<div style="top: 50%;position: fixed;right: 10px;text-align: right;">
    <a href="<?= \yii\helpers\Url::toRoute('/site/baby-reg')?>" target="_blank"><img id="asimg" src="<?= $baseUrl ?>images/new/baby-reg-enter.png" alt="社区O2O"/></a>
</div>-->

<footer id="foot">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="text-align: center;">
                北京同创共享网络科技有限公司
            </div>
            <div class="col-md-12" style="text-align: center;">
                公司地址：北京市通州区榆景东路金融街园中园5号院56号楼
            </div>
            <div class="col-md-12" style="text-align: center;">
                客服热线：4000-111-228&nbsp;&nbsp;&nbsp;
                京ICP备16041276号-1&nbsp;&nbsp;&nbsp;
            </div>
        </div>
    </div>




<!--    <div class="bdsharebuttonbox"><a href=" " class="bds_more" data-cmd="more"></a ><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a ><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a ><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a ><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a ><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a ></div>-->
<!--    <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>-->

</footer>


<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
