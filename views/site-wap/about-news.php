<?php
$this->title = Yii::$app->name;
$baseUrl = Yii::$app->getHomeUrl();
?>
<div class="about-banner">
    <div class="about-banner banners">
        <ul>
            <li><img src="<?=$baseUrl;?>images/html/aboutbanner03.png" alt="" ></li>
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
    <div class="about-items-lists">
        <h3>Company news</h3>
        <p style="text-align: left;">
            <span>公司新闻:</span>
            我们的用户大多是80、90后的年轻人群,其中包括大学生、白领以及年轻的宝妈们。同时,顺道嘉平台响应国家"大众创新、万众创业"的政策,针对于校园学生群体特别成立了"放飞梦想·大学生创业基金",每年挑选若干通过"顺道嘉"平台创业的优秀毕业生,提供20万的创业扶持金,希望帮助更多有梦想的年轻人实现自己的人生理想。
        </p>
    </div>

    <div class="about-tabcontent" style="display: none;">
        <div id="about-news">
            <!--总部新闻--->
            <div class="about-news-title">
                <span>总部新闻</span>
            </div>
            <div class="about-capital-news-list-head">
                <?php
                if(is_array($show_param['cnewsArticleList']) && count($show_param['cnewsArticleList'])>0){
                    foreach($show_param['cnewsArticleList'] as $v1){
                        ?>
                        <div class="about-capital-news-pic">
                            <img src="<?= $v1['pic'];?>" style="width:100%;">
                            <div class="about-capital-news-comment">
                                <p>&nbsp;&nbsp;&nbsp;<?= $v1['title'];?></p>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="formore">
                <div class="formore-url">
                    <a href=""><p>更多<img src="<?= $baseUrl;?>images/html/toptri.png" ></p></a>
                </div>
            </div>
            <div class="clear"></div>
            <hr style="margin-top:5px;">


            <!--视频部分新闻--->
            <div class="about-news-title">
                <span>视频新闻</span>
            </div>
                <?php
                if(is_array($show_param['newsVideoList']) && count($show_param['newsVideoList'])>0){
                    foreach($show_param['newsVideoList'] as $v3){
                        ?>
                        <div class="about-news-video-list-head">
                            <div class="about-news-video">
                                <video controls>
                                    <source src="<?= $v3['url'];?>" type="video/mp4">
                                </video>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

            <div class="formore">
                <div class="formore-url">
                    <a href=""><p>更多<img src="<?= $baseUrl;?>images/html/toptri.png" ></p></a>
                </div>
            </div>
            <div class="clear"></div>
            <hr style="margin-top:5px;">


            <!--地方新闻--->
            <div class="about-news-title">
                <span>地方新闻</span>
            </div>
            <div class="about-capital-news-list-head">
                <?php
                if(is_array($show_param['lnewsArticleList']) && count($show_param['lnewsArticleList'])>0){
                    foreach($show_param['lnewsArticleList'] as $v2){
                        ?>
                        <div class="about-capital-news-pic">
                            <img src="<?= $v2['pic'];?>" style="width:100%;">
                            <div class="about-capital-news-comment">
                                <p>&nbsp;&nbsp;&nbsp;<?= $v2['title'];?></p>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="formore">
                <div class="formore-url">
                    <a href=""><p>更多<img src="<?= $baseUrl;?>images/html/toptri.png" ></p></a>
                </div>
            </div>
            <div class="clear"></div>
            <hr style="margin-top:5px;">

        </div>
    </div>
</div>
