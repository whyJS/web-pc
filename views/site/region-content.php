<?php
/**
 * Created by PhpStorm.
 * User: Tianbao KANG
 * Date: 2017/1/6
 * Time: 11:23
 */

$this->title = Yii::$app->name;
$baseUrl = Yii::$app->getHomeUrl();
?>
<!--区域代理引用css文件-->
<link rel="stylesheet" href="<?= $baseUrl?>css/region-content.css?2017030701" />


<div class="region_d1">
	<div><img src="<?= $baseUrl ?>images/new/z1_02.jpg" alt="" class="img-responsive"></div>  
</div>
<div class="region_d2" style="">
	<div><img src="<?= $baseUrl ?>images/new/z1_04.jpg" alt="" class="img-responsive"></div>
    
</div>
<div class="region_d1">
	<div> <img src="<?= $baseUrl ?>images/new/z1_05.png" alt="" class="img-responsive"></div>
   
</div>
<div style="width: 100%;text-align: center;background: #EEEEEE;padding-top: 100px;padding-bottom: 100px;" >
    <div class="container">
    	<form action="<?= $baseUrl ?>site/joinus-content" method="post">

        <div class="row">
        	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 region_input">
            <span>姓名：</span><input required="required" type="text" name="name" value="" id="ip_1" placeholder="请输入姓名"/>
        	</div>
        	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 region_input">
                  <span>联系方式：</span><input type="text" placeholder="请输入手机号" name="mobile" value="" required="required" pattern="^1[34578]\d{9}$" class="ip_2"/>
        	</div>
        	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 region_input">
                  <span>所在城市：</span><input type="text" name="region" required="required" value="" class="ip_3" placeholder="请输入所在地址" />
        	</div>
    		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 region_input2" >
    			<span>留言：</span>
				<textarea placeholder="请留言" name="remark" value="" class="ip_4" required="required"></textarea>
    		</div>
			<input type="hidden" name="type" value="1">
    	</div>
			<div class="row" style="padding-top:30px;">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<input class="sitm" type="submit" name="提交" value="提交">
				</div>
			</div>

    	</form>

    </div>
</div>
<div class="region_d1" id="region-foot">
	<div>  <img src="<?= $baseUrl ?>images/new/yy_02.jpg" alt="" class="img-responsive"></div>
  
</div>

