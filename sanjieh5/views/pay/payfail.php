<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
		<title> 充值失败 </title>
		<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
		<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/pay.css"/>
		<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>		
		<!--这里是头部样式三-->
		<header>
			<h1> 充值失败 </h1>
			<a class="u_back" href="<?php echo Yii::$app->urlManager->createUrl('user/usercenter'); ?>">返回</a>
	   </header>
	   
	    <!--商城-付款成功内容区-->
	    <div class="paysuccess"  style="height: 4.8rem;">
	    	<div class="paysuccess_img paysuccess_img_1">
	    		<img src="<?php echo $pc_style; ?>images/shibai.png"/>
	    		<p> 充值失败 </p>
	    		<p style="margin-top: 0.1rem;">  </p>
	    	</div>
	    	<!--<div class="paysuccess_details">
	    		<dl>
	    			<dt> 订单号 </dt>
	    			<dd>121784652354835434758</dd> 
	    		</dl>
	    		<dl style="margin-left: 0.4rem;">
	    			<dt> 应付金额</dt>
	    			<dd class="sumo"> 798三界石 </dd> 
	    		</dl>
	    	</div>-->
	    </div>
	  <!--走链接的按钮-->
		
	</body>
</html>
