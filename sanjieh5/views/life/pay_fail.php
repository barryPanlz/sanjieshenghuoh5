<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>三界生活-付款失败</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/life_pay.css"/>
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script> 
</head>





<body>
<div class="screen">
	
	
	<header>
		<h1>付款失败</h1>
		<a class="u_back" href="<?php echo Yii::$app->urlManager->createUrl('user/usercenter'); ?>">返回</a>
	</header>
	
	
	<div class="main no_footer_main">
		 <!--三界生活-图像区-->
		 <div class="lift_suc_img lift_suc_img1"> 
		 	 <img src="<?php echo $pc_style; ?>images/shibai.png" alt="" /> 
		 	 <h3> 付款失败，请在48小时内重新付款 </h3>
		 	 <h3 class="lift_suc_img1_h3"> 逾期则订单将自动取消 </h3>
		 </div>
		 
		 <!--三界生活-成功信息-->
		 <div class="lift_suc_detalis lift_fail_detalis" style="display: none;"> 
		 	<ul>
		 		<li>
		 		  <span> 订单号 </span>
		 		  <font>  1621 3521 2661 </font>
		 		</li>
		 		<li>
		 		  <span> 已付金额  </span>
		 		  <strong> <i>￥</i>4096.00 </strong>
		 		</li>
		 	</ul> 
		 </div>
		 
		 
		 <div class="u_link_button pay_suc_btn"><a href="<?php echo Yii::$app->urlManager->createUrl('user/usercenter'); ?>">重新付款</a></div>
		
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