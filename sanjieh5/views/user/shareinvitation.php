<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>分享邀请</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/form.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/text.css">
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="screen">
	<header>
		<h1>分享邀请</h1>
		<a class="u_back"  href="javascript:history.go(-1);">返回</a>
	</header>
	<div class="main no_footer_main no_padding">

		
		<div class="invitation_bottom">
			<h2 class="title">分享邀请</h2>
			<p class="content">
			每一个具备推荐邀请权限的会员都可以推荐三级会员 ，也就是说每一级都可以往下再发展两级。推荐人只能获取三级推荐所得的奖励，每一级给自己带来的奖励比例都不同，一级最高，三级最低，超过三级就与你无关了。
			</p>
			<h3 class="little_title">一、什么样的身份可以推荐会员呢？</h3>
			<p class="content">1、普通会员：可推荐普通会员、代理商。</p>
			<p class="content">2、创业会员：可推荐普通会员、代理商、供应商、店铺。</p>
			<p class="content">3、代理商：无推荐权限。</p>
			<p class="content">4、供应商：无推荐权限。</p>
			<p class="content">5、店铺：无推荐权限。</p>
			<h3 class="little_title">二、推荐的奖励规则是什么？</h3>
			<p class="content">1、推荐会员注册成功无法立即获得奖励，当推荐对象产生特定的消费行为时，您才能获得对应的奖励。</p>
			<p class="content">2、推荐普通会员，当他兑换商品时您可以获得奖励（三界宝）；当他升级为创业会员时，您也可以获得奖励（三界宝）。</p>
		    <p class="content">3、推荐创业会员，当他兑换商品时您可以获得奖励（三界宝）。</p>
			<p class="content">4、推荐供应商，当他在平台产生销售业绩时您可以获得奖励（三界宝）。</p>
		    <p class="content">5、推荐代理商，您可以一次性获得奖励（人民币）。</p>
			<p class="content">6、推荐实体店铺，当他充值三界石时您可以获得奖励（三界宝）。</p>
			<p class="content">7、如果您是代理商，当辖区内的实体店铺充值三界石时您可以获得奖励（人民币）。</p>
			<p class="content">8、根据您的会员角色、推荐对象、推荐等级的不同，您的奖励类别和比例也会有所差异，具体奖励标准还请参考运营人员给您的文件哦。</p>
			<h3 class="little_title">三、分享邀请的方法有哪些？</h3>
			<p class="content">1、将自己的邀请码分享给好友，让他在注册时输入即可。</p>
			<div class="img"><img src="<?php echo $pc_style; ?>images/yaoq_03.jpg" alt=""></div>
			<p class="content">2、打开会员中心，让好友用微信扫描自己的二维码，然后在打开的页面完成注册即可。</p>

			<div class="img"><img src="<?php echo $pc_style; ?>images/yaoq_06.jpg" alt=""></div>

			<p class="content">3、在手机端点开二维码详情页，点击分享给朋友，朋友在分享结果页完成注册即可。</p>
			<div class="img imgc"><img src="<?php echo $pc_style; ?>images/yaoq_09.jpg" alt=""></div>
			<div class="img imgc"><img src="<?php echo $pc_style; ?>images/yaoq_13.jpg" alt=""></div>
			<div class="img imgc"><img src="<?php echo $pc_style; ?>images/yaoq_15.jpg" alt=""></div>
		</div>		
	</div>	
	<!--这里是验证错误时的弹出框-->
	<div class="error_tip">手机号码格式不正确</div>
	<!--这里是注册成功时的弹出框-->
	<div class="success_box">
		<img src="<?php echo $pc_style; ?><?php echo $pc_style; ?>images/icon23.png" alt="">
		<p>恭喜注册成功</p>
	</div>	
</div>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
<script>
	/*fastclick解决移动端点击延迟的问题*/
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	}
	/*点击注册按钮*/
	$('.regist_button').click(function(event) {
		/*如果表单填写错误，执行以下js,则显示错误提示,显示2s后消失，显示时改变错误提示的内容即可*/
		if(!$('.error_tip').is(":animated")){
			$('.error_tip').show(100, function() {
				$('.error_tip').html('手机号码输入错误');//这里输入要提示的内容
				$('.error_tip').animate({
					opacity: 1
					},1000, function() {
					window.setTimeout(function(){
						$('.error_tip').animate({
							opacity: 0
							},
							1000, function() {
							$('.error_tip').hide();
						});
					}, 2000)
				});
			});		
		}
		/*如果表单提交成功，执行以下js,则显示注册成功,显示2s后消失并跳转到*/
		/*if(!$('.success_box').is(":animated")){
			$('.success_box').show(100, function() {
				$('.success_box').animate({
					opacity: 1,
					},1000, function() {
					window.setTimeout(function(){
							window.location = "http://www.baidu.com" //跳转到商城首页
					}, 1500)
				});
			});		
		}*/	
	});	
</script>

</body>
</html>