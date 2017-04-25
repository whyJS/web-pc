<?php


$this->title = Yii::$app->name;
$baseUrl = Yii::$app->getHomeUrl();
?>
<div class="about-banner">
    <div class="about-banner banners">
        <ul>
            <li><img src="<?=$baseUrl;?>images/html/aboutbanner02.png" alt="" ></li>
        </ul>
    </div>
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
    <div class="about-items-lists ">
        <h3>Company culture</h3>
        <p style="text-align: left;">
            <span>公司文化:</span>
            "顺道嘉",顺道而来,有你则嘉。我们一直本着以消费者和用户为核心的创业理念,抱着走向市场、回馈市场的发展方针,力争走向中国O2O电商行业的最前列。"顺道嘉"利用多媒体多渠道,通过线上下、网内外结合的全方位广告投放模式,以老少皆宜为宗旨,打造以广告、活动、营销、展览、公益为一体的产品线,实现顺道嘉人人用、人人赚的全民创业、多方共赢的战略目标。
        </p>
    </div>

    <div class="about-tabcontent" style="display: none;">
        <div id="about-culture">
            <!--关于我们视频部分 --->
            <h4>视频部分</h4>
            <?php
            if(is_array($show_param['cultureVideoList']) && count($show_param['cultureVideoList'])>0){
                foreach($show_param['cultureVideoList'] as $data){
                    ?>
                    <p><?= $data['title'];?></p>
                    <div class="about-culture-video-list">
                        <video controls>
                            <source src="<?= $data['url'];?>" type="video/mp4">
                        </video>
                    </div>
                    <?php
                }
            }
            ?>
            <!--关于我们图片部分-->
            <h4>图片部分</h4>
            <p>离恨天,大荒山,无羁涯</p>
            <div class="about-culture-pic-list">
                <?php
                if(is_array($show_param['cultureArticleList']) && count($show_param['cultureArticleList'])>0){
                    foreach($show_param['cultureArticleList'] as $value){
                        ?>
                        <div class="about-pic">
                            <img src="<?= $value['pic'];?>" style="width:100%;">
                            <span class="bar"></span>
                            <p><?= $value['title'];?></p>
                            <span class="bar"></span>
                        </div>
                <?php
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>
<script>
    $()
</script>

