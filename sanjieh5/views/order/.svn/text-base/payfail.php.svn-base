<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
		<title> 商城-付款失败 </title>
		<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
		<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/pay.css"/>
		<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<!--这里是头部样式三-->
		<header>
			<h1> 付款失败 </h1>
			<a class="u_back" href="<?php echo Yii::$app->urlManager->createUrl('user/usercenter'); ?>">返回</a>
	   </header>
	   
	    <!--商城-付款成功内容区-->
	    <div class="paysuccess"  style="height: 4.8rem;">
	    	<div class="paysuccess_img paysuccess_img_1">
	    		<img src="<?php echo $pc_style; ?>images/shibai.png"/>
	    		<p> 付款失败，请在48小时内重新付款 </p>
	    		<p style="margin-top: 0.1rem;"> 逾期则订单将自动取消 </p>
	    	</div>
	    	<div class="paysuccess_details">
	    		<dl>
	    			<dt> 订单号 </dt>
	    			<dd><?php if(isset($get["order_no"])){echo $get["order_no"]; }?></dd>
	    		</dl>
	    		<dl style="margin-left: 0.4rem;">
	    			<dt> 应付金额</dt>
	    			<dd class="sumo"> <?php if(isset($get["order_amount"])){echo $get["order_amount"];} ?>三界石 </dd>
	    		</dl>
	    	</div>
	    </div>
	  <!--走链接的按钮-->
	  <div class="u_link_button paysuccess_btn"><a href="<?php echo Yii::$app->urlManager->createUrl('user/usercenter'); ?>">重新付款</a></div>
		
	</body>
</html>
