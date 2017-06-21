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
		<a class="u_back" href="javascript:history.go(-1);">返回</a>
	</header>
	<div class="main no_footer_main no_padding">
		<div class="invitation_top">
			<div class="logo">
				<img src="../../images/logo.png">
			</div>
			<form action="">
				<ul class="regist_box">
					<li>
						<input type="text" placeholder="输入手机号">
					</li>
					<li>
						<input class="code_text" type="text" placeholder="输入短信验证码">
						<div class="code">获取验证码</div>
					</li>
					<li>
						<input type="password" placeholder="输入6-16个字符（包含大小写字母、数字或符号等）">
					</li>
					<li>
						<input type="password" placeholder="再次输入密码">
					</li>
				</ul>
				<div class="agree invitation_agree">
					<label for="u_checkbox"><input class="choose_default" id="u_checkbox" type="checkbox">我同意<a href="agreement.html">《三界生活用户服务协议》</a></label>				
				</div>
			</form>
			<div class="u_button regist_button"><input type="submit" value="注册"></div>
			<p class="go_login">已有帐号?<a href="login.html">马上登录</a></p>
		</div>
		
		<div class="invitation_bottom">
			<h2 class="title">分享邀请——推荐会员注册奖奖奖</h2>
			<p class="content">
				首先，说明分享邀请功能是属于三级分销体系的部分，也是最关键的一部分。会员通过推荐其他的会员（或者店铺、代理商、供应商）注册并产生消费/交易行为，即可持续获得丰厚的奖励收益，已推荐的对象如果还推荐了其他人，那么三级内的推荐对象豆浆给您带来收益，此为三级分销。
			</p>
			<h3 class="little_title">小标题</h3>
			<p class="content">内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容</p>
			<div class="img"><img src="../../images/img26.png" alt=""></div>
			<h3 class="little_title">小标题</h3>
			<p class="content">内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容</p>
			<h3 class="little_title">小标题</h3>
			<p class="content">内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容</p>
		</div>		
	</div>	
	<!--这里是验证错误时的弹出框-->
	<div class="error_tip">手机号码格式不正确</div>
	<!--这里是注册成功时的弹出框-->
	<div class="success_box">
		<img src="../../images/icon23.png" alt="">
		<p>恭喜注册成功</p>
	</div>	
</div>
<script type="text/javascript" src="../../js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../../js/lib/fastclick.js"></script>
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
					opacity: 1,
					},1000, function() {
					window.setTimeout(function(){
						$('.error_tip').animate({
							opacity: 0,
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