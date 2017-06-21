<?php
    use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>安全中心</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/security.css">
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="screen">
	<header>
		<h1>安全中心</h1>
		<a class="u_back" href="<?php echo Yii::$app->urlManager->createUrl('user/accountset'); ?>">返回</a>
	</header>
	<div class="main no_footer_main">
		<ul class="security_list">
			<li>
				<div class="list_top">
					<h3>登录密码</h3>
					<img src="<?php echo $pc_style; ?>images/icon26.png" alt="">
					<p>
						<a href="<?php echo Url::toRoute("user/savepwd");?>">
							<img src="<?php echo $pc_style; ?>images/edit.png" alt="">
							<span> 修改 </span>	
						</a>
					</p>
				</div>
				<p class="list_bottom">安全性高的密码可以使账号更安全。建议您定期更换密码，且设置一个包含数字和字母，并长度超过6位以上的密码。</p>
			</li> 
			<!-- 绑定手机号 -->
			<?php if(!empty($phone->phone)){ ?>
			<li>
				<div class="list_top">
					<h3>手机绑定</h3>
					<img src="<?php echo $pc_style; ?>images/icon26.png" alt="">
					<p>
						<a href="#">
							<img src="<?php echo $pc_style; ?>images/edit.png" alt="">
							<span style="color:#848484"> 已绑定 </span>	
						</a>
					</p>
				</div> 
			    <p class="list_bottom"> 您绑定的手机号是：<?php echo $phone->phone; ?></p>
			</li> 
			<?php }else{ ?>
				<li>
				<div class="list_top">
					<h3>手机绑定</h3>
					<img src="<?php echo $pc_style; ?>images/icon26.png" alt="">
					<p>
						<a href="<?php echo Url::toRoute("user/bindingphone");?>">
							<img src="<?php echo $pc_style; ?>images/edit.png" alt="">
							<span> 绑定 </span>	
						</a>
					</p>
				</div> 
			    <p class="list_bottom"> 在三界生活找回密码，修改密码的时候都需要验证手机号哦。</p>
			</li>
			<?php }?>
			<!--提现账号-->
			<?php if(!empty($res->data)){
				if($res->data->user_type == '3'){ ?>
					<li>
						<div class="list_top">
							<h3>提现账号</h3>
							<img src="<?php echo $pc_style; ?>images/icon26.png" alt="">
							<p>
								<a href="<?php echo Url::toRoute("user/withdrawalset");?>">
									<img src="<?php echo $pc_style; ?>images/edit.png" alt="">
									<span> 修改 </span>	
								</a>
							</p>
						</div> 
					    <p class="list_bottom"> 填写您的支付宝、微信或银行卡等信息，以后就可以选择任意方式提现人民币了 </p>
					</li>
				<?php } }?>
		</ul>
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
	// window.onload=function(){
	// 	var value = sessionStorage.getItem("phone");
	// 	if(value == ''){
	// 		$('#phone').text("无");
	// 	}else{
	// 		var r = value;
	// 		var x = r.substr(0, 3) + '****' + r.substr(7);
	// 		$('#phone').text(x);
	// 		//sessionStorage.removeItem("phone");
	// 	}
		//var username=document.cookie.split(";")[0].split("=")[1];  

		// if(window.location.search==''){
		// 	$('#phone').text("无");
		// }else{
		// 	var r = window.location.search.split("=")[1];
		// 	var x = r.substr(0, 3) + '****' + r.substr(7);
		// 	$('#phone').text(x);
		// }
	// }

</script>
</body>
</html>