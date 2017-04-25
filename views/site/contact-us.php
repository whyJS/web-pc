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

<!--联系我们-->
<link rel="stylesheet" href="<?= $baseUrl?>css/contact-us.css?2017030701" />


<div class="container container_top">
    <div class="row" id="activity_zxhd">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" id="ZX_span">
            <span class="ZX_span_s"></span>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: center;">
            <span id="activity-span">联系我们</span>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <span  class="ZX_span_s" ></span>
        </div>
    </div>
</div>

<!--地图-->
<div class="container contact_map">
    <div class="row">
        <div class="col-md-7 col-sm-12" id="map-border">
            <div id = "myMap" style="width:100%;height:100%;"></div>
        </div>
        <div class="col-md-5 col-sm-12" id="map-border2">
            <img src="<?= $baseUrl; ?>images/new/contact.png" class="img-responsive" alt="互联网平台" style="display: inline-block;"/>
        </div>
    </div>

</div>




<script type="text/javascript" src = "http://api.map.baidu.com/api?v=2.0&ak=13cac89c0ef3790fb8902469a6c94033?2017030701"></script>

<script type="text/javascript" src="<?= $baseUrl ?>js/contact.js?2017030701"></script>
