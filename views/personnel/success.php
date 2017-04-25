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
    .content{width: 60%; margin: 0 auto;text-indent:2em; }
    .title{width: 60%; margin: 0 auto;}
    .title input{width:30px; border: none;}
    .title p{padding-left: 23px; }
    .tijiao{width:10%; margin: 0 auto;}
    .tijiao input{width: 200px; height: 50px;  margin-top: 30px; background-color: #0a8ddf; color: #FFFFFF; margin-bottom:50px;}
    .wenda{width: 60%; margin: 0 auto;}
</style>
<body>
    <?php if(is_array($show_param['titleList'])&&count($show_param['titleList'])>0){
        foreach($show_param['titleList'] as $data){   ?>
              <h2 style="text-align: center; margin-top: 3%;"><?= $data['title'];?></h2>
              <div class="content"><?= $data['description'];?> </div>
              <div class="content"><?= $data['extra'];?> </div>
    <?php }}?>
    <?= \yii\helpers\Html::beginForm('answer', 'POST', array('class'=>
        'pageForm',
        'enctype'=>'multipart/form-data',
        'onsubmit'=>"return iframeCallback(this, dialogAjaxDone);",
        'id' => 'from1',

    ));?>
       <div>
           <?php if(is_array($show_param['tiankongList'])&&count($show_param['tiankongList'])>0){
           foreach($show_param['tiankongList'] as $content){   ?>
                <div class="title">
                    <label><?= $content['title'];?>(<?php echo \yii\helpers\Html::textInput('content['.$content['id'].']',$show_param['info']['mobile'],['style'=>'width:40px']); ?>)<a style="color: red; font-size: 12px; padding-left: 20px;">请在括号中填写!</a></label><br/>
                    <p><?= $content['content'];?> </p>
                </div>
           <?php }}?>
       </div>

        <?php if(is_array($show_param['wendaList'])&&count($show_param['wendaList'])>0){
        foreach($show_param['wendaList'] as $wenda){   ?>
       <div class="wenda">
            <label><?= $wenda['title'];?> </label><br/>
            <label style="text-indent:2em; "><?= $wenda['content'];?></label>
            <div style="width: 100%;">
                <div style=" width: 5%; float: left;">&nbsp;&nbsp;&nbsp;&nbsp;答:</div>
                <div style="width: 95%; float: left;">
                    <?php
                    echo \yii\helpers\Html::textarea('content['.$wenda['id'].']',$show_param['title']['content'],['style'=>'width:750px;height:150px']);
                    ?>
                </div>
            </div>
        </div>
        <?php }}?>
      <input type="hidden" name="data[vid]" value="<?php echo $show_param['vidList']?>">
      <input type="hidden" name="data[uid]" value="<?php echo $show_param['userList']['id'] ?>">
       <div class="tijiao">
           <input type="submit" value="提交">
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