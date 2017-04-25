<?php


$this->title = Yii::$app->name;
$baseUrl = Yii::$app->getHomeUrl();
use yii\helpers\Html;
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
        <h3>Complaints & feedback</h3>
        <p style="text-align: left;">
            <span>意见反馈:</span>
            这是一支勇于冒险拼搏奋进的团队,由一名身经百战的老兵创建,团队之初仅有两人,在经历无数商战磨练后,凭靠着一股坚韧与执着在风起云涌的O2O电商行业中不断发展壮大。作为国内发展迅速的电商团队,我们见证了电商O2O模式的发展历程,积累了电商O2O的运营经验,形成了科学高效的管理体系。团队成员充满朝气,具有创新意识并勇于面对任何挑战。
        </p>
    </div>

    <div class="about-tabcontent">
            <div class="about-list-head">
                <h5>意见反馈</h5>
                <div class="about-feedback-list">
                    <?php
                    echo Html::beginForm(
                        $show_param['actionUrl'],
                        'post',
                        ['name' => 'editFrom', 'id' => 'editFrom', 'enctype' => 'multipart/form-data']
                    );
                    ?>
                    <textarea name="content" required>有了您的鞭策,我们将不断的提高我们的服务</textarea>
                    <input type="text" name="mobile" value="" placeholder="为了更好的为您服务请输入您的手机号" required>
                    <input type="submit" value="提交反馈">
                    <?php
                    echo Html::endForm();
                    ?>
                </div>
            </div>
    </div>
</div>

