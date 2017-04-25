<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
zyblog\bjui\assets\BJuiAsset::register($this);
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
$dwzAssetsUrl = $this->getAssetManager()->getPublishedUrl('@vendor/zyblog/yii2-bjui/B-JUI');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>调查系统登录</title>
    <meta name="renderer" content="webkit">
    <script src="<?= $dwzAssetsUrl;?>/B-JUI/js/jquery-1.11.3.min.js"></script>
    <script src="<?= $dwzAssetsUrl;?>/B-JUI/js/jquery.cookie.js"></script>
    <link href="<?= $dwzAssetsUrl;?>/B-JUI/themes/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        html, body { height: 100%; overflow: hidden; }
        body {
            font-family: "Verdana", "Tahoma", "Lucida Grande", "Microsoft YaHei", "Hiragino Sans GB", sans-serif;
            background: url(<?= $dwzAssetsUrl;?>/images/loginbg_01.jpg) no-repeat center center fixed;
            background-size: cover;
        }
        .form-control{height:37px;}
        .main_box{position:absolute; top:45%; left:50%; margin:-200px 0 0 -180px; padding:15px 20px; width:360px; height:400px; min-width:320px; background:#FAFAFA; background:rgba(255,255,255,0.5); box-shadow: 1px 5px 8px #888888; border-radius:6px;}
        .login_msg{height:30px;}
        .input-group >.input-group-addon.code{padding:0;}
        #captcha_img{cursor:pointer;}
        .main_box .logo img{height:35px;}
        @media (min-width: 768px) {
            .main_box {margin-left:-240px; padding:15px 55px; width:480px;}
            .main_box .logo img{height:40px;}
        }
    </style>

</head>
<body>
<div class="container">
    <?= \yii\helpers\Html::beginForm('login','post',['class'=>'pageForm required-validate','enctype'=>'multipart/form-data','onsubmit'=>'return iframeCallback(this, dialogAjaxDone);'])?>
    <div class="main_box">
        <p class="text-center logo"><img src="<?= $dwzAssetsUrl;?>/images/logo.png" height="45"></p>
        <div class="login_msg text-center"></div>
        <div class="form-group <?= $errKey=='username'?'has-error':'';?>">
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon-user"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" class="form-control" id="loginform-username" name="data[name]" value="<?= $model->username; ?>" placeholder="登录账号">
            </div>
        </div>
        <div class="form-group <?= $errKey=='password'?'has-error':'';?>">
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon-password"><span class="glyphicon glyphicon-lock"></span></span>
                <input type="password" class="form-control" id="loginform_password" name="data[pass]" placeholder="登录密码">
            </div>
        </div>
        <div class="text-center">
            <button type="submit" id="login_ok" class="btn btn-primary btn-lg">&nbsp;登&nbsp;录&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="regist" class="btn btn-default btn-lg">注册</a>
        </div>
        <div class="text-center">
            <hr>
            <p>同创共享调查系统</p>
        </div>
    </div>
    <?= \yii\helpers\Html::hiddenInput('id',$show_param['id'])?>
    </form>
    <?= \yii\helpers\Html::endForm()?>
</div>
</body>
</html>

