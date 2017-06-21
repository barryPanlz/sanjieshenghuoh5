<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>实体店消费付款</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/physical_store.css">
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="screen">
	<header>
		<h1>实体店消费付款</h1>
		<a class="u_back" href="#" onclick="<?php echo Yii::$app->urlManager->createUrl('user/usercenter'); ?>">返回</a>
	</header>
	<div class="main no_footer_main">
		<div class="succ_status succ_status1">
			<div class="succ_box">
				<div class="succ_top fail_top">
					<img src="<?php echo $pc_style; ?>images/fail.png" alt="" />
				    <p class="tit1">付款失败，请您重新支付</p>
				</div>
				<!-- <div class="pays_way" style="display:none">
					<ul  class="pay_b">
						<li>消费金额<span>268</span ><span class="sjt">人民币</span></li>
						<li>奖励数额<span class="address">河北省邢台事桥东区阿里郎和哈利路亚新起点彻夜</span></li>
						<li>支付方式<span>支付宝</span></li>
					</ul>
				</div> -->
				
			</div>
		</div>
	</div>	
</div>
</body>
</html>
