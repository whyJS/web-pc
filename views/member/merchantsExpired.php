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
    <title>商家用户注册</title>
    <link rel="stylesheet" type="text/css" href="<?=$baseUrl;?>css/style.css">
    <script src="/js/jquery.js" type="application/javascript"></script>
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
    <script type="text/javascript">
        function cancel(obj) {
            obj.remove();
        }
    </script>
    <script type="text/javascript">
        $(function(){
            $('#imga').change(function(){
                var file = this.files[0];
                var r = new FileReader();
                r.readAsDataURL(file);
                $(r).load(function(){
                    document.getElementById("index_cont_file_two").innerHTML +=" <div class='index_cont_file_two_a' value='1' onclick='cancel(this)'> <img src='"+this.result +"'/></div>";
                    $("#imagea").css('display','none');
                    $("#imageb").css('display','block');
                })
            })
        })
        $(function(){
            $('#imgb').change(function(){
                var file = this.files[0];
                var r = new FileReader();
                r.readAsDataURL(file);
                $(r).load(function(){
                    document.getElementById("index_cont_file_two").innerHTML +=" <div class='index_cont_file_two_a' value='1' onclick='cancel(this)'> <img src='"+this.result +"'/></div>";
                    $("#imageb").css('display','none');
                    $("#imagec").css('display','block');
                })
            })
        })
        $(function(){
            $('#imgc').change(function(){
                var file = this.files[0];
                var r = new FileReader();
                r.readAsDataURL(file);
                $(r).load(function(){
                    document.getElementById("index_cont_file_two").innerHTML +=" <div class='index_cont_file_two_a' value='1' onclick='cancel(this)'> <img src='"+this.result +"'/></div>";
                    $("#imagec").css('display','none');
                    $("#imaged").css('display','block');
                })
            })
        })
        $(function(){
            $('#imgd').change(function(){
                var file = this.files[0];
                var r = new FileReader();
                r.readAsDataURL(file);
                $(r).load(function(){
                    document.getElementById("index_cont_file_two").innerHTML +=" <div class='index_cont_file_two_a' value='1' onclick='cancel(this)'> <img src='"+this.result +"'/></div>";
                })
            })
        })
    </script>
</head>
<body style="background: #219bd9;">
<?php $this->beginBody() ?>
<?= \yii\helpers\Html::beginForm($show_param['actionUrl'], 'POST', array('class'=>
    'pageForm',
    'enctype'=>'multipart/form-data',
    'id' => 'from',

));?>
<div class="index_bannner">
    <img src="<?=$baseUrl;?>images/img/s.png">
</div>
<div class="index_title">
    <p>注册顺道嘉，您的会员等级为</p>
    <h3><?php echo $show_param['roleName']?> <?php echo $show_param['salesman']?></h3>
</div>
<input type="hidden" name="parameter" value="<?php echo $show_param['parameter']?>">
<input type="hidden" name="sid" value="<?php echo $show_param['sid']?>">
<div class="index_cont">
    <div class="index_cont_one">
        <div class="index_cont_a">
            <img src="<?=$baseUrl;?>images/img/1.png" style="display: inline-block;">
            <input type="tel" id="mobile" name="member[mobile]"  placeholder="请输入手机号">
        </div>
        <div style=" height:1px; border-bottom:1px solid #ccc; overflow:hidden;"></div>
    </div>
    <div class="index_cont_one">
        <div class="index_cont_a">
            <img src="<?=$baseUrl;?>images/img/538.png" style="display: inline-block;">
            <input type="text"  id="nickname" name="member[nickname]" placeholder="请输入您的真实姓名">
        </div>
        <div style=" height:1px; border-bottom:1px solid #ccc; overflow:hidden;"></div>
    </div>
    <div class="index_cont_one">
        <div class="index_cont_a">
            <img src="<?=$baseUrl;?>images/img/533.png" style="display: inline-block;">
            <input type="text" id="idno" name="member[idno]" placeholder="请输入身份证号">
            <span><img src="<?=$baseUrl;?>images/img/z.png" style="display: inline-block;"></span>
        </div>
        <div style=" height:1px; border-bottom:1px solid #ccc; overflow:hidden;"></div>
    </div>
    <div class="index_cont_one">
        <div class="index_cont_a">
            <img src="<?=$baseUrl;?>images/img/541.png" style="display: inline-block;">
            <input type="text"  id="address" name="member[address]" placeholder="请输入家庭地址">
        </div>
        <div style=" height:1px; border-bottom:1px solid #ccc; overflow:hidden;"></div>
    </div>
</div>


<div class="index_cont_file">
    <div  class="index_cont_file_one" id="imagea">
        <input id="imga" type="file"  name="member[]" accept="image/*"/>
        <span>上传证件</span>
    </div>
    <div  class="index_cont_file_one" id="imageb" style="display:none;">
        <input id="imgb" type="file"  name="member[]" accept="image/*"/>
        <span>上传证件</span>
    </div>
    <div  class="index_cont_file_one" id="imagec" style="display:none;">
        <input id="imgc" type="file"  name="member[]" accept="image/*"/>
        <span>上传证件</span>
    </div>
    <div  class="index_cont_file_one" id="imaged" style="display:none;">
        <input id="imgd" type="file"  name="member[]" accept="image/*"/>
        <span>上传证件</span>
    </div>
    <div style=" height:1px; border-bottom:1px solid #ccc; overflow:hidden;"></div>
    <div class="index_cont_file_two" id="index_cont_file_two">
    </div>
</div>
<div class="index_cont_file_three">需上传四张照片：手持身份证照片一张；身份证正反面照片两张；营业执照照片一张</div>

<div class="index_cont_two">
    <div class="index_cont_two_a">
        <div class="index_cont_two_a_1">
            <img src="<?=$baseUrl;?>images/img/3.png" style="display: inline-block;">
            <input type="tel"  id="code" name="member[code]" placeholder="4位验证码">
        </div>
    </div>
    <div class="index_cont_two_b">
        <div class="index_cont_two_b_1">
            <input id="btnSendCode" type="button" value="验证码" onclick="sendMessage()"/>
        </div>
    </div>
</div>
<div class="index_cont_xieyi">
    <a href="shangjiaxieyi">注册即为同意<label style="color: red;">《商家入驻协议》</label></a>
</div>

<div class="index_cont_foot">
    <div class="index_cont_foot_a">
        <input type="submit" value="注册">
    </div>
</div>
<?=  \yii\helpers\Html::endForm();?>
</body>
<script type="text/javascript">
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
         * 判断真实姓名
         */
        var nickname=document.getElementById('nickname').value;
        if(nickname.length==0){
            alert("真实姓名不能为空");
            return false;
        }
        /*
         * 判断身份证
         */
        var idno=document.getElementById('idno').value;
        if(idno.length==0){
            alert("身份证不能为空");
            return false;
        }

        /**
         * 判断地址
         */
        var address=document.getElementById('address').value;
        if(address.length==0){
            alert("家庭住址不能为空");
            return false;
        }
        /**
         * 判断图片
         */
   /*     var num= $("#index_cont_file_two div").length;
        if(num < 8 || num >8 ){
            alert("图片信息不全");
            return false;
        }*/
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
