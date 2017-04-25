<?php
use frontend\assets\IndexAsset;
IndexAsset::register($this);
$baseUrl = Yii::$app->getHomeUrl();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no"/>
    <meta content="telephone=no" name="format-detection" />
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    
    <?php if(!empty($error)){ ?>
        <title>注册失败</title>
    <?php }else{ ?>
        <title>注册成功</title>
    <?php } ?>
    <link rel="stylesheet" type="text/css" href="<?=$baseUrl;?>css/style.css">
    <?php $this->beginPage() ?>
    <?php $this->beginBody() ?>
    <?php $this->endBody() ?>
    <?php $this->endPage() ?>
</head>
<body style="background: #219bd9;">
<?php if(!empty($error)){ ?>
        <div class="error" style="margin-top:70%; text-align: center;" >
            <h3  style="color: red;"><?php echo $error; ?></h3>
        </div>
<?php }else{ ?>
    <div class="merchant_down_title">
        <p class="m">注册成功~!</p>
        <p class="n">请下载 "顺道嘉商家版" APP</p>
    </div>
    <div class="merchant_down_logo">
        <img src="<?= $baseUrl; ?>images/img/log1.png">
    </div>
    <div class="merchant_down_download">
        <a href="http://www.moumou001.com/download/downseller.php"><img class="pic1" src="<?= $baseUrl; ?>images/img/an_download.png"></a>
        <a href="http://www.moumou001.com/download/downseller.php"><img class="pic2" src="<?= $baseUrl; ?>images/img/ios_download.png"></a>
    </div>
<?php } ?>
</body>
</html>
