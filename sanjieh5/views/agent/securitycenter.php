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
		<a class="u_back" href="<?php echo Yii::$app->urlManager->createUrl('agent/accountset'); ?>">返回</a>
	</header>
	<div class="main no_footer_main">
		<ul class="security_list">
			<li>
				<div class="list_top">
					<h3>登录密码</h3>
					<img src="<?php echo $pc_style; ?>images/icon26.png" alt="">
					<p>
					 <a href="<?php echo Url::toRoute("agent/savepwd");?>">
					 	<img src="<?php echo $pc_style; ?>images/edit.png" alt="">
					 	<span> 修改 </span>	
					 </a>
					</p>
				</div>
				<p class="list_bottom">安全性高的密码可以使账号更安全。建议您定期更换密码，且设置一个包含数字和字母，并长度超过6位以上的密码。</p>
			</li>

            <li>
                <div class="list_top">
                    <h3>提现账号</h3>
                    <img src="<?php echo $pc_style; ?>images/icon26.png" alt="">
                    <p>
                        <a href="<?php echo Url::toRoute("agent/withdrawalset");?>">
                            <img src="<?php echo $pc_style; ?>images/edit.png" alt="">
                            <span> 修改 </span>
                        </a>
                    </p>
                </div>
                <p class="list_bottom"> 填写您的支付宝、微信或银行卡等信息，以后就可以选择任意方式提现人民币了 </p>
            </li>
			<!--<li>
				<div class="list_top">
					<h3>电子邮箱<img src="<?php echo $pc_style; ?>images/icon25.png" alt=""></h3>
					<p class="red"><a href="#"><img src="<?php echo $pc_style; ?>images/icon34.png" alt="">验证</a></p>
				</div>
				<p class="list_bottom">验证后，可用于快速找回登录密码，接收账户余额变动提醒。</p>
			</li>
			<li>
				<div class="list_top">
					<h3>手机绑定<img src="<?php echo $pc_style; ?>images/icon26.png" alt=""></h3>
					<p><a href="#"><img src="<?php echo $pc_style; ?>images/edit.png" alt="">修改</a></p>
				</div>
				<p class="list_bottom">您验证的手机：130130****00，可享有多个服务，如：密码找回，交易提醒等。</p>
			</li>
			<li>
				<div class="list_top">
					<h3>实名认证<img src="<?php echo $pc_style; ?>images/icon26.png" alt=""></h3>
					<p><a href="#"><img src="<?php echo $pc_style; ?>images/edit.png" alt="">查看</a></p>
				</div>
				<p class="list_bottom">您认证的实名信息：**勇 130****************000</p>
			</li>-->
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
</script>
</body>
</html>