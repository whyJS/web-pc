<?php
/**
 * Created by PhpStorm.
 * User: Tianbao KANG
 * Date: 2017/1/6
 * Time: 11:23
 */

$this->title = Yii::$app->name;
$baseUrl = Yii::$app->getHomeUrl();
?>
<!--最新活动详情css-->
<link rel="stylesheet" href="<?= $baseUrl; ?>css/activity-content.css?2017030701" />


<div class="news-content-list">

    <p class="body_p1"><?= $show_param['title'] ?></p>
    <p class="body_p2">
            	<span class="body_p2_s1">
            		<?= $show_param['ctime'] ?>
            	</span>
        <span style="display: inline-block;width:100%;"></span>
    </p>
    <p>
    <?= stripslashes($show_param['content']); ?>
    </p>
</div>


