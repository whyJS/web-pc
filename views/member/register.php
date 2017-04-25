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
    <title>普通用户注册</title>
    <link rel="stylesheet" type="text/css" href="<?=$baseUrl;?>css/style.css">
    <script src="<?= $baseUrl?>js/jquery.js" type="application/javascript"></script>
    <?php $this->beginPage() ?>
    <?php $this->beginBody() ?>
    <?php $this->endBody() ?>
    <?php $this->endPage() ?>
    <script type="text/javascript">

        var InterValObj; //timer变量，控制时间
        var count = 60; //间隔函数，1秒执行
        var curCount;//当前剩余秒数

        function sendMessage() {
            var  mobile=document.getElementById('mobile').value;
            if(mobile==0){
                alert("请填写信息")
            }else{
                $.post("http://front.moumou001.com/member/curl",{mobile:mobile,rand:Math.random()},
                    function(data){
                        alert("发送成功");
                    });
                curCount = count;
                //设置button效果，开始计时
                $("#btnSendCode").attr("disabled", "true");
                $("#btnSendCode").val(curCount + "秒");
                InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
                //向后台发送处理数据
                $.ajax({
                    type: "POST", //用POST方式传输
                    dataType: "text", //数据格式:JSON
                    url: 'Login.ashx', //目标地址
                    data: "dealType=" + dealType +"&uid=" + uid + "&code=" + code,
                    error: function (XMLHttpRequest, textStatus, errorThrown) { },
                    success: function (msg){ }
                });
            }

        }

        //timer处理函数
        function SetRemainTime() {
            if (curCount == 0) {
                window.clearInterval(InterValObj);//停止计时器
                $("#btnSendCode").removeAttr("disabled");//启用按钮
                $("#btnSendCode").val("重新发送");
            }
            else {
                curCount--;
                $("#btnSendCode").val(curCount + "秒");
            }
        }
    </script>
</head>
<body style="background: #ffdb4c;">
<?php $this->beginBody() ?>
<?= \yii\helpers\Html::beginForm($show_param['actionUrl'], 'POST', array('class'=>
    'pageForm',
    'enctype'=>'multipart/form-data',
    'onsubmit'=>"return iframeCallback(this, dialogAjaxDone);",
    'id' => 'from',

));?>
<div class="index_bannner">
    <img src="<?=$baseUrl;?>images/img/s1.png">
</div>
<div class="index_title">
    <p>注册顺道嘉，您的会员等级为</p>
    <h3><?php echo $show_param['roleName']?>  <?php echo $show_param['salesman']?></h3>
</div>
<input type="hidden" name="parameter" value="<?php echo $show_param['parameter']?>">
<input type="hidden" name="sid" value="<?php echo $show_param['sid']?>">
<div class="index_cont">
    <div class="index_cont_one">
        <div class="index_cont_a">
            <img src="<?=$baseUrl;?>images/img/1.png" style="display: inline-block;">
            <input type="tel" id="mobile" name="member[mobile]" placeholder="请输入手机号">
        </div>
        <div style=" height:1px; border-bottom:1px solid #ccc; overflow:hidden;"></div>
    </div>
    <div class="index_cont_one">
        <div class="index_cont_a">
            <img src="<?=$baseUrl;?>images/img/as.png" style="display: inline-block;">
            <input type="password" placeholder="请输入密码" id="password" name="member[password]">
            <span class="show_pass"><img src="<?=$baseUrl;?>images/img/asa.png""></span>
        </div>
        <div style=" height:1px; border-bottom:1px solid #ccc; overflow:hidden;"></div>
    </div>
    <div class="index_cont_one">
        <div class="index_cont_a">
            <img src="<?=$baseUrl;?>images/img/as.png" style="display: inline-block;">
            <input type="password"  id="pass" placeholder="确认密码">
            <span class="show_pass"><img src="<?=$baseUrl;?>images/img/asa.png" style="display: inline-block;"></span>

        </div>
        <div style=" height:1px; border-bottom:1px solid #ccc; overflow:hidden;"></div>
    </div>

</div>

<div class="index_cont_two">
    <div class="index_cont_two_a">
        <div class="index_cont_two_a_1">
            <img src="<?=$baseUrl;?>images/img/3.png" style="display: inline-block;">
            <input type="text"  id="code" name="member[code]" placeholder="4位验证码">

        </div>
    </div>
    <div class="index_cont_two_b">
        <div class="index_cont_two_b_1">
            <input id="btnSendCode" type="button" value="验证码" onclick="sendMessage()"/>
        </div>
    </div>
</div>

<div class="index_cont_xieyi">
    <a href="xieyi">注册即为同意<label style="color: red;">《用户使用协议》</label></a>
</div>

<div class="index_cont_foot">
    <div class="index_cont_foot_a">
        <input type="submit" value="注册">
    </div>
</div>

<?=  \yii\helpers\Html::endForm();?>
</body>
<script type="text/javascript">

    $(".show_pass").click(function(){
        var type = $(this).prev().prop("type");
        if(type == 'password'){
            type = 'text';
        }else{
            type ='password';
        }
        $(this).prev().prop('type',type);
    })


    document.getElementById("from").onsubmit = function() {
        /**
         * 判断手机号
         */
        var mobile=$("#mobile").val();
        if(mobile.length==0){
            alert("手机号不能为空");
            return false;
        }
        if(!/^(13[0-9]|14[0-9]|15[0-9]|18[0-9]|17[0-9])\d{8}$/i.test(mobile)){
            alert("请输入正确手机号");
            return false;
        }
        /**
         * 判断密码
         */
        var password=document.getElementById('password').value;
        if(password.length==0){
            alert("密码不能为空");
            return false;
        }
        if(password.length>30 || password.length<6){
            alert("密码不能大于30且不能小于6位");
            return false;
        }
        /**
         * 确认密码
         */
        var pass=document.getElementById('pass').value;
        if(pass.length==0){
            alert("确认密码不能为空");
            return false;
        }
        if(pass!=password){
            alert("两次密码不同");
            return false;
        }
        /**
         * 验证码
         */
        var code=document.getElementById('code').value;
        if(code.length==0){
            alert("验证码不能为空");
            return false;
        }

    }
</script>
</html>
