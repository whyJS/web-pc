<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\IndexWapAsset;

IndexWapAsset::register($this);
$baseUrl = Yii::$app->getHomeUrl();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
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
<div class="wrap">
    <div class="mainContent">
        <div class="site">
            <?= $content ?>
        </div>
        <div class="header">
            <div class="header-outer">
                <div class="header-logo">
                    <img src="<?= $baseUrl ?>images/html/newlogo.png" alt="<?= $this->title ?>">
                </div>
                <div class="header-navbar">
                    <img onclick="toggleMNav()" src="<?= $baseUrl ?>images/html/mheader-right-nav.png" class="navimg"/>
                </div>
                <ul id="mNav">
                    <div class="nav1">
                        <li <?php if(Yii::$app->controller->action->id=='index'){?>class="current"<?php }?>>
                            <a href="<?= \yii\helpers\Url::toRoute('/site-wap/index')?>">首页</a>
                        </li>
                        <li <?php if(Yii::$app->controller->action->id=='sdj-app'){?>class="current"<?php }?>>
                            <a href="<?= \yii\helpers\Url::toRoute('/site-wap/sdj-app')?>">普通用户版</a>
                        </li>
                    </div>
                    <div class="nav1">
                        <li <?php if(Yii::$app->controller->action->id=='seller-app'){?>class="current"<?php }?>>
                            <a href="<?= \yii\helpers\Url::toRoute('/site-wap/seller-app')?>">商家版</a>
                        </li>
                        <li <?php if(Yii::$app->controller->action->id=='about'){?>class="current"<?php }?>>
                            <a href="<?= \yii\helpers\Url::toRoute('/site-wap/about')?>">关于我们</a>
                        </li>
                    </div>
                    <div class="nav1">
                        <li <?php if(Yii::$app->controller->action->id=='insert'){?>class="current"<?php }?>>
                            <a href="<?= \yii\helpers\Url::toRoute('/site-wap/insert')?>">加入我们</a>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="footer">
    <p>北京同创共享网络科技有限公司</p>
    <p>
        公司地址：北京市通州区榆景东路金融街园中园5号院56号楼<br>
        客服热线：4000-111-228&nbsp;&nbsp;&nbsp;
        京ICP备16041276号-1&nbsp;&nbsp;&nbsp;
    </p>
    <!--<!--    <div style="display:none;"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1260265653'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1260265653' type='text/javascript'%3E%3C/script%3E"));</script></div>-->
</div>
<?php $this->endBody() ?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#scrollDiv").Scroll({line:1,speed:2000,timer:3000,up:"but_down",down:"but_up"});
    });

    function toggleMNav(){
        var nav = $("#mNav");
        if(nav.css('display')=='none'){
            nav.show();
            $(".header-navbar").css('background','#111');
        }else{
            nav.hide();
            $(".header-navbar").css('background','');
        }
    }
</script>
</body>
</html>
<?php $this->endPage() ?>
