<?php
$this->title = Yii::$app->name;
$baseUrl = Yii::$app->getHomeUrl();
?>


<div style="width: 100%;padding: 0px;margin: 0px;position: relative;overflow:hidden;">
    <img src="<?= $baseUrl?>images/new/newsbanner.png" alt="" style="width: 100%;margin-top:-10px;">
</div>


<div class="container" id="news_list_foot">
    <div class="row">
        <?php
        if(is_array($voteList) && count($voteList)){
            foreach($voteList as $data2){
                ?>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" style="padding-bottom: 20px;">
                    <a href="<?= \yii\helpers\Url::to(['site/vote-info','id'=>$data2['id']]) ?>">
                        <img src="<?= $data2['pic'] ?>" class="img-responsive" />
                        <p style="height: 30px;"><?= $data2['name'] ?></p>
                    </a>
                    <span class="text-center">
                        <span class="btn btn-default btn-success vote" onclick="vote(<?=$data2['id']?>,<?=$data2['num']?>)">
                            投票 (<span id="vtnum<?=$data2['id']?>" style="color: white"><?= $data2['num']?></span>)
                        </span>
                    </span>
                </div>

                <?php
            }
        }
        ?>
    </div>
</div>

<script>
    function vote(id,num) {
        $.ajax({
            url:"/site/vote",
            data:{aid:id},
            type:"post",
            dataType:"json",
            success:function (d) {
                if (d.errorCode){
                    alert(d.errorMessage);
                    return false;
                }else{
                    $("#vtnum"+id).text(parseInt(num)+1);
                }
            }
        });
    }
</script>
