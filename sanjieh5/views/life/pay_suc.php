<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>三界生活-付款成功</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/life_pay.css"/>
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script> 
</head>





<body>
<div class="screen">
	
	
	<header>
		<h1>付款成功</h1>
		<a class="u_back" href="<?php echo Yii::$app->urlManager->createUrl('user/usercenter'); ?>">返回</a>
	</header>
	
	
	<div class="main no_footer_main">
		 <!--三界生活-图像区-->
		 <div class="lift_suc_img"> 
		 	 <img src="<?php echo $pc_style; ?>images/success.png" alt="" /> 
		 	 <h3> 付款成功 </h3>
		 	 <!-- <p> 有效期截止到2017.04.30（周末、法定节假日通用） </p> -->
		 </div>
		 
		 <!--三界生活-成功信息-->
		 <div class="lift_suc_detalis" style="display: none;">
		 	<ul>
		 		<li>
		 		  <span> 消费码1 </span>
		 		  <font> <img src="<?php echo $pc_style; ?>images/icon_number1.png" alt="" /><i>1621 3521 2661 </i></font>
		 		</li>
		 		<li>
		 		  <span> 消费码2  </span>
		 		  <font> <img src="<?php echo $pc_style; ?>images/icon_number2.png" alt="" /><i>1621 3521 2661</i> </font>
		 		</li>
		 	</ul>
		 	<ul class="lift_suc_detalis_ul">
		 		<li>
		 		  <span> 订单号 </span>
		 		  <font>  1621 3521 2661 </font>
		 		</li>
		 		<li>
		 		  <span> 已付金额  </span>
		 		  <strong> <i>￥</i>4096.00 </strong>
		 		</li>
		 	</ul>
		 	<ul class="lift_suc_detalis_ul">
		 		<li>
		 		  <span> 付款方式 </span>
		 		  <font class="lift_suc_detalis_font">  支付宝 </font>
		 		</li>
		 		<li>
		 		  <span> 付款时间  </span>
		 		  <font> 2016-10-17 12:24 </font>
		 		</li>
		 	</ul>
		 </div>
		 
		 
		 <div class="u_link_button pay_suc_btn"><a href="<?php echo Yii::$app->urlManager->createUrl('user/shoporder'); ?>">查看订单</a></div>
		
	</div>
 
</div>





<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
<script>
	/*fastclick解决移动端点击延迟的问题*/
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	}
</script>
</body>
</html>