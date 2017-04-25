<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
?>
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,target-densitydpi=high-dpi,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title></title>
</head>
<style>
    html{ outline: none; border:none;-webkit-tap-highlight-color: rgba(0, 0, 0, 0);}
    body{ margin:0px;  padding:0px;  font-family:微软雅黑;  background:#DDDDDD;  }
    .two{  background:#DDDDDD;  padding-top:20px;  }
    .two .img{  max-width:300px;  max-height:300px;   text-align:center;  padding-top:20px;  margin:0px auto;  width:15%; font-size: 24px;  }
    .two .img img{  width:60%; font-size: 24px; }
    .two p{  display:block;  width:180px;  margin:0px auto; font-size: 15px; font-weight: bold; }

</style>

<body>
<?php if($show_param['parameter']==null){?>
      <div class="two">
           <p style="margin-top: 20px; text-align:center;">暂无消息！</p>
      </div>
<?php }else{?>
    <div class="two">
        <div class="img"><img src="../../images/a.png" /></div>
        <p style="margin-top: 20px; text-align:center;"><?php echo $show_param['parameter']['title']?></p>
    </div>
    <div>
        <p style="font-size: 15px; text-align:center;"><?php echo $show_param['parameter']['releaseTime']?></p>
    </div>
    <div style="margin-top: 20px; word-break:break-all;  width:90%;margin-left: auto;margin-right: auto;">
        <p style="text-indent: 2em;"><?php echo stripcslashes($show_param['parameter']['content'])?></p>
    </div>
<?php } ?>

</body>
</html>