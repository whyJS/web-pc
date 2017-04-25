<?php
$this->title = Yii::$app->name;
$baseUrl = Yii::$app->getHomeUrl();
?>
<div class="about-banner">
    <div class="about-banner banners">
        <ul>
            <li><img src="<?=$baseUrl;?>images/html/aboutbanner01.png" alt="" ></li>
        </ul>
    </div>
    <div class="clear"></div>

    <div class="about-items">
        <ul>
            <li <?php if(Yii::$app->controller->action->id=='about'){?> class="active" <?php } ?>>
                <a href="<?= \yii\helpers\Url::toRoute('/site/about')?>">公司简介</a>
            </li>
            <li <?php if(Yii::$app->controller->action->id=='about-culture'){?> class="active" <?php } ?>>
                <a href="<?= \yii\helpers\Url::toRoute('site/about-culture')?>">公司文化</a>
            </li>
            <li <?php if(Yii::$app->controller->action->id=='about-news'){?> class="active"<?php } ?>>
                <a href="<?= \yii\helpers\Url::toRoute('/site/about-news')?>">新闻</a>
            </li>
            <li <?php if(Yii::$app->controller->action->id=='about-feedback'){?> class="active" <?php } ?>>
                <a href="<?= \yii\helpers\Url::toRoute('/site/about-feedback') ?>">意见反馈</a>
            </li>
        </ul>
    </div>
    <div class="clear"></div>
    <div class="about-items-lists">
        <h3>About us</h3>
        <p style="text-align: left;">
            <span>公司简介:</span>
            北京同创共享网络科技有限公司成立于2014年12月,位于北京市通州区榆景东路金融街园中园,其自主研发的新产品是一款针对社区居民、旨在为居民提供高效便捷生活服务的APP。"顺道嘉" APP通过为社区居民提供便捷服务的形式,让社区居民与社会商超实现零距离接触,高效整合用户的碎片化时间,为客户提供全方位的服务。
        </p>
    </div>
</div>
<script>
    $()
</script>

