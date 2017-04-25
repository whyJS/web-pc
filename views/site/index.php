<?php


$this->title = Yii::$app->name;
$baseUrl = Yii::$app->getHomeUrl();
?>

<div class='sangar-slideshow-container' id='sangar-example'>
    <div class='sangar-content-wrapper' >
        <?php
        if(is_array($show_param['nor']) && count($show_param['nor'])){
            foreach($show_param['nor'] as $value){
                ?>
                <div class='sangar-content'  >
                    <img src="<?= $value['pic']; ?>" alt="<?= $value['alt'] ?>"/>
                    <a ></a>
                </div>
                <?php
            }

        }
        ?>


    </div>
</div>

<!--3D轮播-->
<div class="index-3d-banner" style="margin: auto;margin-top: 60px;">
    <div class="title">
        <p style="">
            <span class="3d_span1" style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>顺道嘉新闻快报<span class="3d_span1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </p>
    </div>
    <div id="gla">
        <div id="gla_box">
            <span class="prev"><img src="<?= $baseUrl; ?>images/new/left.png" alt="顺道嘉商超"/></span>
            <span class="next"><img src="<?= $baseUrl; ?>images/new/right.png" alt="顺道嘉商超"/></span>
            <ul>
                <?php
                if(is_array($show_param['3d']) && count($show_param['3d'])){
                    foreach($show_param['3d'] as $data){
                        ?>
                        <li>
                            <div class="gla_inbox">
                                <a > <img src="<?= $data['pic'] ?>" border="0" alt="<?= $data['alt'] ?>"></a>
                                <div class="img_cont">
                                    <?= $data['title'] ?>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                }
                ?>



            </ul>
        </div>
    </div>
</div>
<div class="container" id="index-3d-banner_sm">
    <div class="row" style="text-align: center;">
        <h2 style="color: black;">顺道嘉新闻快报</h2>
    </div>
    <div id="index-3d-banner_sm_x" class="row">
        <?php
        if(is_array($show_param['3d']) && count($show_param['3d'])){
            foreach($show_param['3d'] as $data){
                ?>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="row col-md-12">
                        <img src="<?= $data['pic'] ?>" class="img-responsive img-rounded" alt="<?= $data['alt'] ?>">
                    </div>
                    <div class="row col-md-12 col-sm-12"><h4><?= $data['title'] ?></h4></div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>

<!--二维码-->
<div class="container" id="index_by_img">
    <div class="row">

        <div class="col-sm-4 col-xs-6">
            <img src="<?= $baseUrl; ?>images/new/qrcode-member.png" class="img-responsive" alt="区域代理加盟">
            <p>扫描下载用户版</p>
        </div>
        <div class="col-sm-4 col-xs-6">
            <img src="<?= $baseUrl; ?>images/new/qrcode-merchant.png" class="img-responsive" alt="互联网平台 社区服务">
            <p>扫描下载商家版</p>
        </div>
        <div class="col-sm-4" id="er_wei_ma">
            <img src="<?= $baseUrl; ?>images/new/qrcode-public.png?2017030801" class="img-responsive" alt="社区服务 互联网平台">
            <p>关注微信公众号</p>
        </div>
    </div>

</div>
<!--首页引用js-->
<script type="text/javascript" src="<?= $baseUrl; ?>js/index-1.js?2017030701"></script>
<script type="text/javascript" src="<?= $baseUrl; ?>js/jquery.touchSwipe.min.js?2017030701"></script>
<script type="text/javascript" src="<?= $baseUrl; ?>js/imagesloaded.min.js?2017030701"></script>
<script type="text/javascript" src="<?= $baseUrl; ?>js/sangarSlider.js?2017030701"></script>
<script type="text/javascript" src="<?= $baseUrl; ?>js/plug.js?2017030701"></script>
<script type="text/javascript" src="<?= $baseUrl; ?>js/jquery.corner.js?2017030701"></script>
<script type="text/javascript" src="<?= $baseUrl; ?>js/jquery.roundabout.js?2017030701"></script>
<script type="text/javascript" src="<?= $baseUrl; ?>js/jquery.roundabout-shapes.js?2017030701"></script>
<!--首页引用css-->
<link rel="stylesheet" href="<?= $baseUrl; ?>css/sangarSlider.css?2017030701" />
<link rel="stylesheet" href="<?= $baseUrl; ?>css/default.css?2017030701" />
<link rel="stylesheet" href="<?= $baseUrl; ?>css/index.css?2017030701" />
