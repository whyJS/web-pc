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


<div class="news-content-list">
    <p class="body_p1">
        <?= $data['name'] ?>
    </p>
    <p class="body_p2">
        <span class="body_p2_s1">
        <?= $data['updateTime'] ?>
        </span>
        <span style="display: inline-block;width:100%;">
        </span>
        <span class="body_p2_s2">
        来自：
        </span>
        <span class="body_p2_s3">
        <?= $data['origin'] ?>
        </span>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <span class="btn btn-default btn-success vote">
            投票 (<span id="vtnum1" style="color: white"><?= $data['num']?></span>)
        </span>
    </p>
    <?= stripslashes($data['intro']); ?>
    <center>
        <span class="btn btn-default btn-success vote">
            投票 (<span id="vtnum2" style="color: white"><?= $data['num']?></span>)
    </span>
    </center>
    <p class="body_p5_p">
        【责任编辑：<?= $data['editor'] ?>】
    </p>
</div>


<script>
    $(".vote").click(
        function () {
            $.ajax({
                url:"/site/vote",
                data:{aid:<?=$data['id']?>},
                type:"post",
                dataType:"json",
                success:function (d) {
                    if (d.errorCode){
                        alert(d.errorMessage);
                        return false;
                    }else{
                        var vt = $("#vtnum1").text();
                        var vtnum = parseInt(vt) + 1;
                        $("#vtnum1").text(vtnum);$("#vtnum2").text(vtnum);
                    }
                }
            });
        }
    );
</script>


