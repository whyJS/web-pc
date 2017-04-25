<?php
/**
 * Created by PhpStorm.
 * User: Tianbao KANG
 * Date: 2017/1/6
 * Time: 11:29
 */

$this->title = Yii::$app->name;
$baseUrl = Yii::$app->getHomeUrl();
?>
<style type="text/css">
    body{background: rgb(240,240,240);}
    .vote-body-d1,
    .vote-body-d3 {float: left; width: 25%;color: #666666;}

    .vote-body-d2 {
        float: left;
        width: 50%;
        text-align: center;
        color: #666666;
    }


    .vote-body-div {
        width: 98%;
        margin: auto;
        padding-bottom: 30px;
        background:rgb(255,255,255);
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 20px;
    }

    @media only screen and (max-width: 768px) {
        #vote-jg-body-s-2 {
            height: 500px;
            overflow: auto;
            padding-top: 20px;
        }
        #vote-jg-body-s-2-2 {
            height: 260px;
            overflow: auto;
            padding-top: 20px;
        }

        #vote-h3{padding-top: 30px;}
        .select-div-1{margin-bottom: 30px;}
        .select-h1{color: #333333;font-weight: 600;padding-bottom: 20px;font-size: 2.5em;}
        .select-dd{text-align: center;padding-top: 40px;}
    }
    
    
    @media only screen and (min-width: 768px) {
        #vote-jg-body-s-2 {
            height: 500px;
            overflow: auto;
            padding-top: 20px;
        }
        #vote-jg-body-s-2-2 {
            height: 500px;
            overflow: auto;
            padding-top: 20px;
        }
.select-result{width: 100%;}

.select-div-1{border-right: 2px dashed #333333;}
.select-h1{color: #333333;font-weight: 600;padding-bottom: 40px;font-size: 2.5em;}
.select-dd{text-align: center;padding-top: 60px;}
    }
    #vote-h3{color: #333333;padding-bottom: 30px;}
    
    .select-result{background: #FFCC00;padding-bottom: 100px;}
    .select-h4 span{
    	color: #333333;font-size: 20px;
    }
    #asimg{display:none;}
</style>

<!--年会结果-->
<div class="container select-result">
    <div class="row select-dd">
        <h1 class="select-h1" style="">年会投票结果</h1>
    </div>
    <div class="row" style="text-align: center;">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 select-div-1">
            <div class="row">
                <h3 style="color: #333333;padding-bottom: 15px;font-size: 20px;font-weight: 600;">一等奖:888元</h3>
                <h4 style="color: #666666;" class="select-h4">
                    <span>小品《回嘉》</span>
                    <span>2323票</span>
                </h4>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 select-div-1">
            <div class="row">
                <h3 style="color: #333333;padding-bottom: 15px;font-weight: 600;font-size: 20px;">二等奖:666元</h3>
                <h4 style="color: #666666;"class="select-h4">
                    <span >舞蹈《维族舞》</span>
                    <span >2003票</span>
                </h4>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="row">
                <h3 style="color: #333333;padding-bottom: 15px;font-weight: 600;font-size: 20px;">三等奖:368元</h3>
                <h4 class="select-h4">
                    <span >合唱《同创欢迎你》</span>
                    <span >479票</span>
                </h4>
            </div>
        </div>
    </div>
</div>

<!--节目结果-->
<div class="container" style="padding-bottom: 40px;">
    <div class="row" style="text-align: center;padding-top: 60px;">
        <h1 style="color: #333333;font-weight: 600;padding-bottom: 15px;font-size: 2.5em;">年夜饭投票结果</h1>
    </div>
    <div class="row" id="vote-jg-body" style="text-align: center;">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="vote-jg-body-s">

            <div class="row" style="text-align: center;" style="border: 1px solid black;">

                <h3 id="vote-h3">一等奖:云南5日双人游</h3>
            </div>
            <!--</div>-->
            <div class="vote-body-div">
                <div class="row" id="vote-jg-body-s-2">
                	
                    <div style="width: 100%;">
                        <div class="vote-body-d1">趙桂花</div>
                        <div class="vote-body-d2">131****0827</div>
                        <div class="vote-body-d3">2463票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">刘淑华</div>
                        <div class="vote-body-d2">136****5957</div>
                        <div class="vote-body-d3">1741票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">沈秉琪</div>
                        <div class="vote-body-d2">138****0215</div>
                        <div class="vote-body-d3">1594票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">王谦</div>
                        <div class="vote-body-d2">185****3656</div>
                        <div class="vote-body-d3">923票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">薛丹娜</div>
                        <div class="vote-body-d2">155****3566</div>
                        <div class="vote-body-d3">653票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">侯烨</div>
                        <div class="vote-body-d2">185****9802</div>
                        <div class="vote-body-d3">613票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">王长福</div>
                        <div class="vote-body-d2">157****5170</div>
                        <div class="vote-body-d3">592票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">高仁军</div>
                        <div class="vote-body-d2">150****6240</div>
                        <div class="vote-body-d3">560票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">蒋霞</div>
                        <div class="vote-body-d2">153****6065</div>
                        <div class="vote-body-d3">454票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">韩桂芝</div>
                        <div class="vote-body-d2">187****5036</div>
                        <div class="vote-body-d3">425票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">丛佩花</div>
                        <div class="vote-body-d2">134****7471</div>
                        <div class="vote-body-d3">401票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">王艳</div>
                        <div class="vote-body-d2">136****8993</div>
                        <div class="vote-body-d3">379票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">齐荣翔</div>
                        <div class="vote-body-d2">158****8085</div>
                        <div class="vote-body-d3">357票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">侯树清</div>
                        <div class="vote-body-d2">136****0040</div>
                        <div class="vote-body-d3">335票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">王淑敏</div>
                        <div class="vote-body-d2">137****2794</div>
                        <div class="vote-body-d3">323票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">白雪峰</div>
                        <div class="vote-body-d2">189****8250</div>
                        <div class="vote-body-d3">300票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">刘君彦</div>
                        <div class="vote-body-d2">130****2088</div>
                        <div class="vote-body-d3">260票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">于京华</div>
                        <div class="vote-body-d2">188****3564</div>
                        <div class="vote-body-d3">259票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">郝林</div>
                        <div class="vote-body-d2">131****9759</div>
                        <div class="vote-body-d3">231票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">曲秀伟</div>
                        <div class="vote-body-d2">159****3130</div>
                        <div class="vote-body-d3">205票</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="vote-jg-body-s">

            <div class="row" style="text-align: center;">

                <h3 id="vote-h3">二等奖:卡瓦斯一箱</h3>
            </div>
            <div class="vote-body-div">
                <div class="row" id="vote-jg-body-s-2-2">
                    <div style="width: 100%;">
                        <div class="vote-body-d1">刘兰</div>
                        <div class="vote-body-d2">130****5893</div>
                        <div class="vote-body-d3">188票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">张晓敏</div>
                        <div class="vote-body-d2">185****8247</div>
                        <div class="vote-body-d3">174票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">郝长青</div>
                        <div class="vote-body-d2">130****1339</div>
                        <div class="vote-body-d3">174票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">师学义</div>
                        <div class="vote-body-d2">156****5368</div>
                        <div class="vote-body-d3">152票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">李成城</div>
                        <div class="vote-body-d2">186****3878</div>
                        <div class="vote-body-d3">149票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">张栋</div>
                        <div class="vote-body-d2">183****4083</div>
                        <div class="vote-body-d3">132票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">范天柔</div>
                        <div class="vote-body-d2">153****8998</div>
                        <div class="vote-body-d3">93票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">京都晚霞</div>
                        <div class="vote-body-d2">131****1861</div>
                        <div class="vote-body-d3">77票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">金松林</div>
                        <div class="vote-body-d2">185****3210</div>
                        <div class="vote-body-d3">63票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">李梓嘉</div>
                        <div class="vote-body-d2">188****6158</div>
                        <div class="vote-body-d3">57票</div>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="vote-jg-body-s">

            <div class="row" style="text-align: center;" >

                <h3 id="vote-h3">三等奖:88元现金红包</h3>
            </div>
            <!--</div>-->
            <div class="vote-body-div">
                <div class="row" id="vote-jg-body-s-2">
                    <div style="width: 100%;">
                        <div class="vote-body-d1">李思</div>
                        <div class="vote-body-d2">158****7004</div>
                        <div class="vote-body-d3">56票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">其木格</div>
                        <div class="vote-body-d2">188****5829</div>
                        <div class="vote-body-d3">56票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">吴光丽</div>
                        <div class="vote-body-d2">135****1528</div>
                        <div class="vote-body-d3">54票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">李伟</div>
                        <div class="vote-body-d2">138****5526</div>
                        <div class="vote-body-d3">51票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">花开富贵</div>
                        <div class="vote-body-d2">158****6958</div>
                        <div class="vote-body-d3">51票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">郭少迪</div>
                        <div class="vote-body-d2">182****7978</div>
                        <div class="vote-body-d3">50票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">燕子</div>
                        <div class="vote-body-d2">138****8856</div>
                        <div class="vote-body-d3">43票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">倪</div>
                        <div class="vote-body-d2">177****1069</div>
                        <div class="vote-body-d3">41票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">李莎</div>
                        <div class="vote-body-d2">188****6158</div>
                        <div class="vote-body-d3">38票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">范保秀</div>
                        <div class="vote-body-d2">135****6765</div>
                        <div class="vote-body-d3">38票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">李杨</div>
                        <div class="vote-body-d2">133****4076</div>
                        <div class="vote-body-d3">36票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">何欣</div>
                        <div class="vote-body-d2">177****8773</div>
                        <div class="vote-body-d3">36票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">李先生</div>
                        <div class="vote-body-d2">138****3585</div>
                        <div class="vote-body-d3">36票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">陈翠萍</div>
                        <div class="vote-body-d2">135****1086</div>
                        <div class="vote-body-d3">36票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">魏桂香</div>
                        <div class="vote-body-d2">135****4822</div>
                        <div class="vote-body-d3">36票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">马率群</div>
                        <div class="vote-body-d2">151****6444</div>
                        <div class="vote-body-d3">36票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">赵洋</div>
                        <div class="vote-body-d2">187****1510</div>
                        <div class="vote-body-d3">35票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">向霞</div>
                        <div class="vote-body-d2">188****3275</div>
                        <div class="vote-body-d3">33票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">杨旭</div>
                        <div class="vote-body-d2">135****0035</div>
                        <div class="vote-body-d3">28票</div>
                    </div>
                    <div style="width: 100%;">
                        <div class="vote-body-d1">芊芊</div>
                        <div class="vote-body-d2">137****8197</div>
                        <div class="vote-body-d3">27票</div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>


