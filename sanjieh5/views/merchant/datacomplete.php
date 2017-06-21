<?php
    use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>提交资料完成</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css"> 
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/merchant/recruitment.css"> 
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $pc_style; ?>js/lib/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>  
</head> 
<body>
	<div class="screen">
		<header>
			<h1>商家入驻</h1>
			<a class="u_back" href="<?php echo Yii::$app->urlManager->createUrl(['merchant/index']);?>">返回</a> 
		</header>
		<div class="main no_footer_main">		 
		  
	      <div class="data_icon">
	      	<img src="<?php echo $pc_style; ?>images/success.png"/>
	      	<p> 资料提交成功，客服将在1-2个工作日内与您联系 </p>
	      </div> 
	       <div class="u_link_button merchant_btn"> <a href="<?php echo Yii::$app->urlManager->createUrl(['merchant/mindex']);?>">完成</a></div>
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
	}; 
</script>

 

</body>
</html>	
	
	
	
	
	 
