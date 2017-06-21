<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>修改登录密码</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/form.css">
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="screen">
	<header>
		<h1>修改登录密码</h1>
		<a class="u_back" href="#" onclick="history.go(-1)">返回</a>
	</header>
	<div class="main no_footer_main white_main">
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
					<input type="password" placeholder="输入原始密码">
				</li>
				<li>
					<input type="password" placeholder="输入6-16个字符（包含大小写字母、数字或符号等）">
				</li>
				<li>
					<input type="password" placeholder="再次输入密码">
				</li>
			</ul>
		</form>
		<div id="sure" class="u_button regist_button"><input type="submit" value="确定"></div>
		<p class="version">三界商城v1.0</p>
	</div>
	<div class="error_tip">手机号码格式不正确</div>
	<div class="success_box">
		<img src="../../images/icon23.png" alt="">
		<p>修改成功</p>
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
	$('#sure').click(function(event) {
		/*如果表单填写错误，执行以下js,则显示错误提示,显示2s后消失，显示时改变错误提示的内容即可*/
		/*if(!$('.error_tip').is(":animated")){
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
		}*/
		/*如果表单提交成功，执行以下js,则显示注册成功,显示2s后消失并跳转到*/
		if(!$('.success_box').is(":animated")){
			$('.success_box').show(100, function() {
				$('.success_box').animate({
					opacity: 1,
					},1000, function() {
					window.setTimeout(function(){
							$('.error_tip').animate({
								opacity: 0,
								},
								1000, function() {
								$('.success_box').hide();
							});
					}, 1000)
				});
			});		
		}	
	});	
</script>
</body>
</html>