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
<link rel="stylesheet" href="<?= $baseUrl; ?>css/about-us.css?2017030701" />

<div class="gy-d1" style="">
	<div class="gy-d2">
		<p style="">
			<span style="">关于我们</span>
		</p>
		<div class="div_body">
			<a href="<?= \yii\helpers\Url::toRoute('/site/about-us-project')?>"><span class="s1"><img src="<?= $baseUrl ?>images/new/gy-2.png" alt="" /></span></a>
			<a href="<?= \yii\helpers\Url::toRoute('/site/about-us-company')?>"><span class="s2"><img src="<?= $baseUrl ?>images/new/gy-1.png" alt="" /></span></a>
			<a href="<?= \yii\helpers\Url::toRoute('/site/about-us-share')?>"><span class="s3"><img src="<?= $baseUrl ?>images/new/gy-4.png" alt="" /></span></a>
			<a href="<?= \yii\helpers\Url::toRoute('/site/about-us-system')?>"><span class="s4"><img src="<?= $baseUrl ?>images/new/gy-3.png" alt="" /></span></a>
		</div>
	</div>
</div>