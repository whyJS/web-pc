<?php


$this->title = Yii::$app->name;
$baseUrl = Yii::$app->getHomeUrl();
?>
<style type="text/css">
    #scrollDiv{width:100%;height:25px; overflow:hidden;}/*这里的高度和超出隐藏是必须的*/
    #scrollDiv li{height:25px;line-height:25px; vertical-align:bottom; zoom:1; border-bottom:#CCC dashed 1px;}
</style>
<!--    轮番图-->
    <div class="top-banner">
        <div class="top-banner banners">
            <ul>
                <?php
                if(is_array($show_param['picList']) && count($show_param['picList'])){
                    foreach($show_param['picList'] as $value){
                        ?>
                        <li><img src="<?=$value['url'];?>" alt=""></li>
                <?php
                    }
                }
                ?>

            </ul>
        </div>
<!--        <a class="top-banner_left"><img src="--><?//=$baseUrl;?><!--images/html/zuojiantou-.png" alt=""></a>-->
<!--        <a class="top-banner_right"><img src="--><?//=$baseUrl;?><!--images/html/youjiantou-.png" alt=""></a>-->
<!--        <div class="top-banner_span">-->
<!--            <p>-->
<!--                <span class="top-banner_span_one"></span>-->
<!--                --><?php
//                    for($i=1;$i<count($show_param['picList']);$i++){
//                    ?>
<!--                        <span></span>-->
<!--                --><?php
//                    }
//                ?>
<!--            </p>-->
<!--        </div>-->

    </div>


    <div class="news-links" style="display:none;">
        <div class="news-news">
            <div class="news-head">新闻</div>
            <div id="newsTitle">
                <div id="scrollDiv">
                    <ul>
                        <?php
                            if(is_array($show_param['articleList']) && count($show_param['articleList'])){
                                foreach($show_param['articleList'] as $data){
                                    ?>
                                    <li><a href="<?= $data['url']; ?>" class="linktit" target="_blank"><?= $data['title'] ?></a></li>
                                    <?php
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>

        </div>

    </div>


    <div class="qrcodes">
        <div class="qrcodes_align">
            <h5>扫描下载用户版</h5>
            <div class="code-room">
                <img src="<?=$baseUrl; ?>images/html/sdj-app-qcode.png" style="width:100%;">
            </div>
            <h5>扫描下载商家版</h5>
            <div class="code-room">
                <img src="<?=$baseUrl; ?>images/html/sdj-sj-qcode.png" style="width:100%;" >
            </div>
            <h5>关注微信公众号</h5>
            <div class="code-room">
                <img src="<?=$baseUrl; ?>images/html/sdj-weixin-qcode.jpg" style="width:100%;">
            </div>
        </div>

    </div>

