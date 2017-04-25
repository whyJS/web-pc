<?php
$this->title = '区域推广专题页 -- 顺道嘉';
$baseUrl = Yii::$app->getHomeUrl();
?>
<link rel="stylesheet" href="<?=$baseUrl ?>css/tuiguang.css">
<div class="mainContent">
    <img src="<?=$baseUrl ?>images/tuiguang/t1.png" alt="">
    <img src="<?=$baseUrl ?>images/tuiguang/t2.png" alt="">
    <img src="<?=$baseUrl ?>images/tuiguang/t3.png" alt="" class="img3">
    <img src="<?=$baseUrl ?>images/tuiguang/t4.png" alt="" class="img4">
    <img src="<?=$baseUrl ?>images/tuiguang/t5.png" alt="">
    <div class="user-form">
        <div class="form">
            <label for="name" class="colmon">姓名:</label>
            <input type="text" class="input" placeholder="姓名" id="username">
        </div>
        <div class="form">
            <label for="mobile" class="colmon">电话:</label>
            <input type="text" class="input" placeholder="手机号码" id="mobile">
        </div>
            <input type="hidden" value="<?php echo $_GET['refer']; ?>" id="refer">
        <div class="submit">
            <button class="btn btn-default" id="submit">提交</button>
        </div>
    </div>
    <img src="<?=$baseUrl ?>images/tuiguang/t6.png" alt="" class="botimg">
</div>
<script>
    window.onload = function () {
        $.getJSON("http://s11.cnzz.com/stat.php?id=1260265653?callback=?");
        $("#submit").click(function () {
            var name = $("#username").val();
            var mobile = $("#mobile").val();
            var refer = $("#refer").val();
            if (name == "") {
                alert("姓名不能为空");
                return;
            }
            if (mobile){
                if(!(/^1[3|4|5|7|8]\d{9}$/.test(mobile))){
                    alert("手机号码不正确，请重新填写");
                    return false;
                }
            }else{
                alert("手机号码不能为空");
                return;
            }

            $.ajax({
                url: "<?php echo $baseUrl; ?>" + 'wap/save-info',
                type:"post",
                data:{name:name,mobile:mobile,refer:refer},
                dataType:"json",
                success:function (ret) {
                    if (ret.c){
                        alert("提交成功，客服人员会尽快联系您！");
                        return;
                    }else{
                        alert(ret.m);
                        return;
                    }
                }
            });
        });
    };
</script>