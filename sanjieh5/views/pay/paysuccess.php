<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>普通会员充值成功页面</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/reset.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/common.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/generalPay.css"/>
		<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<header>
			<h1>充值</h1>
			<a class="u_back" href="<?php echo Yii::$app->urlManager->createUrl('user/usercenter'); ?>">返回</a>
		</header>		
		<div class="main no_footer_main">
			<div class="succ_box ">
				<img src="<?php echo $pc_style; ?>images/icon22.png" alt="" />
				<p>充值成功 &nbsp;未来币已到账</p>
			</div>			
			<div class="succ_txt ">
				<ul>
					<!--<li>账户总额<span>5200<i>未来币</i></span></li>
					<li>充值金额<span>2000<i>未来币</i></span></li>
					<li>支付方式<span>支付宝</span></li>
					<li>支付金额<span>1000<i>元</i></span></li>
					<li>充值时间<span>2016-11-11 15:21</span></li>-->
				</ul>
			</div>			
			<div class="sure_pay">
				<a href="<?php echo Yii::$app->urlManager->createUrl('user/genrepay');?>">返回充值首页</a>
			</div>
		</div>
	</body>
</html>
