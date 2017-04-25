<?php
use frontend\assets\IndexAsset;
IndexAsset::register($this);
$baseUrl = Yii::$app->getHomeUrl();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="/js/jquery.js" type="application/javascript"></script>
    <?php $this->beginPage() ?>
    <?php $this->beginBody() ?>
    <?php $this->endBody() ?>
    <?php $this->endPage() ?>
</head>
<style>
    .content{width: 20%; margin: 0 auto; }
    .content p{padding-left: 20px; }
    .content p input{width: 200px; height: 30px;}
    .content p input{width: 200px; height: 30px;}
</style>
<body>
    <h2 style="text-align: center; margin-top: 3%;">调查用户登记</h2>
    <?= \yii\helpers\Html::beginForm($show_param['actionUrl']."?id=".$show_param['id'], 'POST', array('class'=>
        'pageForm',
        'enctype'=>'multipart/form-data',
        'onsubmit'=>"return iframeCallback(this, dialogAjaxDone);",
        'id' => 'from1',

    ));?>
    <div  class="content">
        <p>姓名:&nbsp;&nbsp;&nbsp;<input type="text" id="name" name="data[name]"></p>
        <p>密码:&nbsp;&nbsp;&nbsp;<input type="password" name="data[pass]"></p>
        <div   style="padding-left: 20px;">性别:&nbsp;&nbsp;&nbsp;<input type="radio" name="data[sex]" value="1">男&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="data[sex]" value="0">女</div>
        <p>年龄:&nbsp;&nbsp;&nbsp;<input type="text" name="data[age]"></p>
        <p>学历:&nbsp;&nbsp;&nbsp;<input type="text" name="data[xueli]"></p>
        <p>司龄:&nbsp;&nbsp;&nbsp;<input type="text" name="data[years]"></p>
        <p>部门:&nbsp;&nbsp;&nbsp;<input type="text" name="data[depart]"></p>
        <p>职位:&nbsp;&nbsp;&nbsp;<input type="text" name="data[post]"></p>
        <div style="padding-left: 20px; ">层级: &nbsp;&nbsp;&nbsp;<input type="radio" name="data[cengji]" value="1">高层&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"  name="data[cengji]" value="2">中层&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"  name="data[cengji]" value="3">基层</div>
        <br/>
        <div style="padding-left: 20px;"><input type="submit" value="注册" style="width: 250px;font-size: 14px;color:#FFFFFF; height: 33px; background-color: #0a8ddf;"></div>
    </div>
    <?=  \yii\helpers\Html::endForm();?>
</body>
<script type="text/javascript">
    document.getElementById("from1").onsubmit = function() {
        for(var i=0;i<document.getElementById("from1").elements.length-1;i++)
        {
            if(document.getElementById("from1").elements[i].value=="")
            {
                alert("当前表单不能有空项");
                document.getElementById("from1").elements[i].focus();
                return false;
            }
        }
        return true;
    }
</script>
</html>