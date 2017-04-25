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
<link rel="stylesheet" href="<?= $baseUrl?>css/merchant-content.css?2017030701" />


<div style="width: 100%;padding: 0px;margin: 0px;position: relative;overflow:hidden;">
    <img src="<?= $baseUrl ?>images/new/banner2.png" alt="" style="width: 100%;margin-top:-10px;">
</div>

<div class="news-content-list">

    <p class="body_p1"><?= $show_param['name'] ?></p>
    <p class="body_p2">
            	<span class="body_p2_s1">
            		<?= $show_param['updateTime'] ?>
            	</span>
        <span style="display: inline-block;width:100%;"></span>
        <span class="body_p2_s2">
<!--            		来自：-->
            	</span>
        <span class="body_p2_s3">
            	顺道嘉
            	</span>
    </p>
    <p class="" style="text-align: center;">
        <?= $show_param['intro'] ?>

        <?php
        echo $show_param['content'];
        ?>
    </p>


</div>
