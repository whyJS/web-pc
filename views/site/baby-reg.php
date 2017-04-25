<?php
/**
 * Created by PhpStorm.
 * User: Tianbao KANG
 * Date: 2017/1/6
 * Time: 11:53
 */
$this->title = Yii::$app->name;
$baseUrl = Yii::$app->getHomeUrl();
?>

<!--区域代理引用css文件-->
<link rel="stylesheet" href="<?= $baseUrl?>css/baby-reg.css?2017030701" />

<!--<div style="position: fixed;width: 100%;height: 100%;top: 0px;background: rgba(25,25,25,0.9);z-index: 10000;">
	
</div>-->

<div class="baby">
	<div class="baby_d1">
		<img src="<?= $baseUrl ?>images/new/baby.png"/>
	</div>

	<div class="baby_input">
		<div style="width: 100%;height: 100%;" id="baby_ip_ss">
			
		
		<input class="baby-input1" type="text" placeholder="请输入宝贝姓名" />
		<div class="baby-input2">
		<div class="baby-input2-d1">
			<img src="<?= $baseUrl ?>images/new/boy.png"/>
			<p><span></span></p>
		</div>
		<div class="baby-input2-d2">
			<img src="<?= $baseUrl ?>images/new/girl.png"/>
			<p><span></span></p>
		</div>

		</div>
		<input class="baby-input3" type="text" placeholder="请输入宝贝年龄三到七岁" />
		<input class="baby-input4" type="text" placeholder="请输入家长手机号" />
		<textarea class="baby-input5" placeholder="请输入所在小区地址" ></textarea>
		<button class="baby-input6">提交报名</button>
		</div>
	<div class="baby_div" style="display: none;">
		<h1 style="color: #57b949;font-size: 26px;margin-top: 180px;">您已提交报名申请</h1>
		<h1 style="color: #57b949;font-size: 26px;">尽请期待...</h1>
		<a href="<?= $baseUrl ?>site/activity-content?id=8" style="margin-top: 100px; display: inline-block;width: 300px;border-radius: 6px;background: #57B949;color: white;height: 40px;line-height: 40px;font-size: 18px;">返回</a>
	</div>
	</div>
	
</div>

<script type="text/javascript" src="<?= $baseUrl ?>js/baby-reg.js?2017030701"></script>