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

<!--页面引用css文件-->
<link rel="stylesheet" href="<?= $baseUrl?>css/news-content.css?2017030701" />

<div class="news-content-list">

    <p class="body_p1"><?= $show_param['title'] ?></p>
    <p class="body_p2">
            	<span class="body_p2_s1">
            		<?= $show_param['updateTime'] ?>
            	</span>
        <span style="display: inline-block;width:100%;"></span>
        <span class="body_p2_s2">
<!--            		来自：-->
            	</span>
        <span class="body_p2_s3">
            	<?= $show_param['origin'] ?>
            	</span>
    </p>
    <?= stripslashes($show_param['content']); ?>
    <p class="body_p5_p">
<!--        【责任编译：--><?//= $show_param['editor'] ?><!--】-->
    </p>
    </p>
</div>




