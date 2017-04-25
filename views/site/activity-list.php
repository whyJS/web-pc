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
<!--最新活动css-->
<link rel="stylesheet" href="<?= $baseUrl; ?>css/activity-list.css?2017030701" />

<div class="container" id="activity_zxWB">
	<?php
	if(is_array($show_param['dataList']) && count($show_param['dataList'])){
		foreach($show_param['dataList'] as $data){
			?>
			<div class="row AC-row" >
				<a href="<?= \yii\helpers\Url::to(['site/activity-content','id'=>$data['id']]) ?>">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 AC-big-hidden" style="border: 0px solid black;">
						<div class="row AC-img-head">
							<?= $data['title'] ?>
						</div>
						<div class="row AC-data">
							<span class="AC-sp2">发布日期：<?= $data['ctime'] ?></span>
						</div>

					</div>
				</a>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 AC-img" style="">
					<a href="<?= \yii\helpers\Url::to(['site/activity-content','id'=>$data['id']]) ?>"><img src="<?= $data['pic'] ?>" class="img-responsive" alt="<?= $data['alt'] ?>" /></a>
				</div>
				<a href="<?= \yii\helpers\Url::to(['site/activity-content','id'=>$data['id']]) ?>"><div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 AC-smle-none" style="border: 0px solid black;">
						<div class="row AC-img-head">
							<?= $data['title'] ?>
						</div>
						<div class="row AC-data"  style="">
							<span class="AC-sp2" style="">发布日期：<?= $data['ctime'] ?></span>
						</div>
						<div class="row AC-content">
							<?= $data['intro'] ?>
						</div>

					</div>
				</a>
			</div>

	<?php
		}
	}
	?>



    
    <!--按钮-->
<!--    <div class="row" id="AC-row-span-id">-->
<!--         <span class="AC-row-span">1</span>-->
<!--         <span>2</span>-->
<!--      -->
<!--     </div>-->
        
        
</div>
<!--引入js-->
<script type="text/javascript" src="<?= $baseUrl?>js/activity-list.js?2017030701"></script>

