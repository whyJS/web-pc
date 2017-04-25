<?php
$this->title = Yii::$app->name;
$baseUrl = Yii::$app->getHomeUrl();
?>

<!--新闻概要-->
<div style="width: 100%;padding: 0px;margin: 0px;position: relative;overflow:hidden;">
    <img src="<?= $baseUrl?>images/new/newsbanner.png" alt="" style="width: 100%;margin-top:-10px;">
</div>
<div class="container" id="news_list_lunbo">
    <div class="row" style="height: 360px;">

        <div class="col-md-7" style="border: 0px solid green;">
            <div class="row" id="news_list_d1">
                <ul style="padding-left: 15px;">
                    <?php
                    if(is_array($show_param['dataList']['focus']) && count($show_param['dataList']['focus'])){
                        foreach($show_param['dataList']['focus'] as $data1){
                            ?>

                            <li> <img src="<?= $data1['pic'] ?>" class="img-responsive" alt="<?= $data1['alt'] ?>"></li>

                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="row" id="news_list_d3" style=" border: 0px solid black;position: relative; left: -20%px; top: -50px;text-align: right;">
                <div class="col-md-12">
                    <?php
                    if(is_array($show_param['dataList']['focus']) && count($show_param['dataList']['focus'])){
                        ?>
                        <?php
                        for($i=1;$i<=count($show_param['dataList']['focus']);$i++){
                            ?>
                            <span><?= $i; ?></span>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-5" id="news_list_d2">
            <?php
            if(is_array($show_param['dataList']['focus']) && count($show_param['dataList']['focus'])){
                foreach($show_param['dataList']['focus'] as $data3){
                    ?>
                    <div class="row" >
                        <div class="col-md-12 ">
                           <?= $data3['intro'] ?>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

    </div>
</div>


<!--移动-->
<div class="container" id="news_list_Y">
    <?php
    if(is_array($show_param['dataList']['focus']) && count($show_param['dataList']['focus'])){
        foreach($show_param['dataList']['focus'] as $data1){
            ?>
            <a>
                <div class="row">
                    <div class="col-sm-5 col-xs-5" id="news_list_xi" style="border: 0px solid black;">
                        <img src="<?= $data1['pic'];?>" class="img-responsive" style="" alt="<?= $data1['alt'] ?>">
                    </div>
                    <div class="col-sm-7 col-xs-7 img-responsive" id="news_list_xx" >
                       <?= $data1['intro']; ?>
                    </div>
                </div>
            </a>

            <?php
        }
    }
    ?>

</div>


<!--底部新闻-->
<div class="container" id="news_list_foot">
    <div class="row">
        <?php
        if(is_array($show_param['dataList']['nor']) && count($show_param['dataList']['nor'])){
            foreach($show_param['dataList']['nor'] as $data2){
                ?>
                <a href="<?= \yii\helpers\Url::to(['site/news-content','id'=>$data2['id']]) ?>">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <img src="<?= $data2['pic'] ?>" class="img-responsive" alt="<?= $data2['alt'] ?>">
                        <p><?= $data2['title'] ?></p>
                    </div>
                </a>
                <?php
            }
        }
        ?>
    </div>
</div>

<!--更多-->
<!--<div class="container">-->
<!--    <div class="row" style="text-align: center;padding-bottom: 20px;">-->
<!--        <a href=""><span>更多</span> >> </a>-->
<!--    </div>-->
<!--</div>-->


<!--页面引用js-->
<script type="text/javascript" src="<?= $baseUrl?>js/news.js?2017030701"></script>
<!--页面引用css-->
<link rel="stylesheet" href="<?= $baseUrl?>css/news-list.css?2017030701" />