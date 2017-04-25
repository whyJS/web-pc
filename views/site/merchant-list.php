<?php
/**
 * Created by PhpStorm.
 * User: Tianbao KANG
 * Date: 2017/1/6
 * Time: 11:31
 */

$this->title = Yii::$app->name;
$baseUrl = Yii::$app->getHomeUrl();
?>
<!--优秀品牌商css-->
<link rel="stylesheet" href="<?= $baseUrl; ?>css/merchant-list.css?2017030701" />

<div style="width: 100%;padding: 0px;margin: 0px;position: relative;overflow:hidden;">
    <img src="<?= $baseUrl ?>images/new/banner2.png" alt="" style="width: 100%;margin-top:-10px;">
</div>

<div class="container">
    <div class="row" id="activity_zxhd">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" id="ZX_span">
            <span class="ZX_span_s"></span>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: center;">
            <span id="activity-span">优秀品牌商</span>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <span  class="ZX_span_s" ></span>
        </div>
    </div>
</div>


<div class="container yx_bd3">
    <div class="row aa">
        <?php
        if(is_array($show_param['dataList']) && count($show_param['dataList'])){
            foreach($show_param['dataList'] as $data){
                ?>
                <a href="<?= \yii\helpers\Url::to(['site/merchant-content','id'=>$data['id']]) ?>" target="_blank">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 num">
                        <div class="yx_bd3_ul_d1">
                            <img src="<?= $data['pic'] ?>" alt="<?= $data['alt'] ?>"/>
                        </div>
                        <p class="merchant_p1">
                            <?= $data['name'] ?>
                        </p>
                        <p class="merchant_p2">
                            <?= $data['intro'] ?>
                        </p>
                    </div>
                </a>
                <?php
            }
        }
        ?>



    </div>
    <div id="yx_bd3_btn">

<!--        --><?php
//        if(is_array($show_param['dataList']) && count($show_param['dataList'])){
//        for($i=1;$i<=count($show_param['dataList']);$i++){
//            ?>
<!--            <span>--><?//= $i; ?><!--</span>-->
<!--        --><?php
//            }
//        }
//        ?>
<!--        <span class="yx_bd3_btn_span">1</span>-->
<!--        <span>2</span>-->
<!--        <span>3</span>-->

    </div>
</div>
