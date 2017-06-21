<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> 帮助中心 </title>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/reset.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/mix.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/common.css"/>
	</head>
	
	
	
	<body>
		
		
		<!--头部用户导航-->
		<?php echo \Yii::$app->view->renderFile('@app/views/layouts/header.php'); ?>
		<!--搜索商品栏-->
		<div class="super_Search">
			<div class="Search" href=""> 
			<img src="<?php echo $pc_style; ?>img/logo.png"/> 
		  </div> 
		</div>
		
		<div class="redXian"></div>
		<!--帮助中心内容区-->
		<div class="super_help_content">
			<div class="help_content">
				
				<ul class="help_content_left">
					<h4> 常见问题分类 </h4>
					<li> 注册登录
						<ol>
							<li> <a href=""> 消费者注册 </a> </li>
							<li> <a href=""> 用户登录 </a> </li>
							<li> <a href=""> 忘记密码 </a> </li>
							<li> <a href=""> 商家入驻 </a> </li>
						</ol>
					</li>
					<li> 消费者指南
						<ol>
							<li> <a href=""> 兑换流程 </a> </li>
							<li> <a href=""> 消费流程 </a> </li>
							<li> <a href=""> 货币与支付 </a> </li>
							<li> <a href=""> 配送方式 </a> </li>
							<li> <a href=""> 物流查询 </a> </li>
						</ol>
					</li>
					<li> 售后服务 
						<ol>
							<li> <a href=""> 7天无理由退换货 </a> </li>
							<li> <a href=""> 退货流程</a> </li> 
						</ol>
					</li>
					<li> 订单问题
							<ol>
							<li> <a href=""> 订单查询 </a> </li>
							<li> <a href=""> 消费码 </a> </li>
							<li> <a href=""> 订单取消 </a> </li> 
						</ol>
					</li>
					<li> 联系我们
						<ol>
							<li> <a href=""> 电话：010-88888 </a> </li>
							<li> <a href=""> QQ:1654517688 </a> </li>
							<li> <a href=""> 邮箱:10130075740@qq。com </a> </li>
							<li> <a href=""> 微信公众号：123456 </a> </li> 
						</ol>
					</li>
				</ul>
				
				<div class="help_content_rig">
					<div class="help_path">
						<span> 首页 </span>
						<img src="<?php echo $pc_style; ?>img/jiantou-icon.png"/>
						<span> 常见问题 </span>
						<img src="<?php echo $pc_style; ?>img/jiantou-icon.png"/>
						<span> 用户注册 </span>
						<img src="<?php echo $pc_style; ?>img/jiantou-icon.png"/>
						<span style="color: #282828;"> 消费者注册 </span>
					</div>
					<h5> 如何注册? </h5>
					<p> 1、进入三界商城，点击  “<a href=""> 注册 </a>” </p>
					<div> <img src="<?php echo $pc_style; ?>img/help1.jpg"/> </div>
					<p style="margin-top: 50px;"> 2、进入页面，填写相关信息 </p>
					<div> <img src="<?php echo $pc_style; ?>img/help2.jpg"/> </div>
				</div>
				
			</div>
		</div>
		
		
		
	    <!--底部-->
		<?php echo \Yii::$app->view->renderFile('@app/views/layouts/bottom.php'); ?>
		
		
		<script src="<?php echo $pc_style; ?>js/lib/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php echo $pc_style; ?>js/lib/common.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
		$(document).ready(function(){ 
			var help_left = $('.help_content_left>li'); 
		   for( var i = 0; i < help_left.length; i++  ){
		   	  help_left[i].index = i;	
		   	  help_left[i].onmousemove = function(){  
		 
      	   	  	$(this).find('ol').show();
		   	  	
		   	  };
		   	  help_left[i].onmouseleave = function(){  
		 
      	   	  	$(this).find('ol').hide();
		   	  	
		   	  };
		   };
		});	
		</script>
		
	</body>
</html>
