<?php
/**
 * Created by PhpStorm.
 * User: Tianbao KANG
 * Date: 2017/1/6
 * Time: 11:29
 */

$this->title = Yii::$app->name;
$baseUrl = Yii::$app->getHomeUrl();
?>
<div class="container" style="padding-top: 50px;">
    <div class="row" style="text-align: center;">
        <div class="col-lg-5 col-md-5 col-sm-12" id="tupian" style="padding: 0px;border: 0px solid black;padding-top: 40px;">
            <img src="<?= $baseUrl ?>images/new/nyf.png" class="img-responsive" style="display: inline-block;"/>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-12">
            <div class="row" id="guanggao">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2 style="color: black;padding-bottom: 20px;">顺道嘉鸡年晒年夜饭开始啦~~</h2>
                    <p style="text-align: left;">
                        任何人都可以上传年夜饭照片参于活动，只要参与就有机会拿“<span style="font-weight: 600;color: red;">云南六天五晚</span>”旅游大奖。本活动将于以公开投票的形式进行。详细内容请关注我们的<span style="font-weight: 600;color: red;"> &nbsp;&nbsp;微信公众号：bjtcgx &nbsp;&nbsp;  </span>进行了解，还有更多的活动等着您。

                    </p>
                    <!--<p style="color: black;">活动时间：2017年01月26至2017年02月7日</p>-->
                    <p style="color: black;">活动时间：2017年01月26至2017年02月7日
                        <br><a href="<?= \yii\helpers\Url::toRoute('/site/select-result') ?>" target="_blank" style="color:#00b7ee;font-size:1.2em;" >查看投票结果</a></p>


                </div>
            </div>
            <div class="row" style="margin-top: 40px;">
                <div class="col-lg-12 col-md-12 col-sm-12" id="index_by_img">
                    <div class="col-md-12" style="text-align: center;">
                        <img src="<?= $baseUrl ?>images/new/qrcode-public.png" class="img-responsive" style="display: inline-block;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #asimg{display:none;}
</style>
