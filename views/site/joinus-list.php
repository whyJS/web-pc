<?php
/**
 * Created by PhpStorm.
 * User: Tianbao KANG
 * Date: 2017/1/6
 * Time: 11:34
 */

$this->title = Yii::$app->name;
$baseUrl = Yii::$app->getHomeUrl();
?>

<!--招商加盟引用css文件-->
<link rel="stylesheet" href="<?= $baseUrl?>css/joinus-list.css?2017030701" />

<div class="container container_top">
    <div class="row" id="activity_zxhd">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" id="ZX_span">
            <span class="ZX_span_s" style=""></span>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: center;">
            <span id="activity-span">加入我们</span>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" id="ZX_span">
            <span  class="ZX_span_s" ></span>
        </div>
    </div>
</div>

<!--加入我们-->
		<div class="joinus-by">
			<div class="joinus-top">
				<a href="<?= $baseUrl ?>site/joinus-content?id=1">
					<div class="joinus-top-1">
						<img class="img-responsive joinus-img" src="<?= $baseUrl ?>images/new/bestseller1.jpg" alt="区域代理加盟"/>
					</div>
				</a>

				<div class="joinus-top-2">
					<div id="qydl">
						<img src="<?= $baseUrl ?>images/new/regional-agent2.jpg" class="img-responsive joinus-img" alt="社区服务"/>
					</div>
					<div class="joinus-top-2-a" id="dzdl">
						<img src="<?= $baseUrl ?>images/new/normal-agent3.jpg" class="img-responsive joinus-img" alt="区域代理加盟" />
					</div>
				</div>
			</div>
			<a href="<?= $baseUrl ?>site/joinus-content?id=2">
				<div class="joinus-top2" id="scrz">
					<img src="<?= $baseUrl ?>images/new/merchant-join4.jpg" class="img-responsive joinus-img" alt="互联网平台"/>
				</div>
			</a>

		</div>
		

 <!--引入外部文件-->
 <script type="text/javascript" src="<?= $baseUrl?>js/joinus-list.js?2017030701" ></script>

