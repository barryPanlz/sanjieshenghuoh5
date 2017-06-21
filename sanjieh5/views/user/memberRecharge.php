<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
		<title> 普通会员-充值成功 </title>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/common.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/rechange.css" />
		<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	</head>

	<body>
		<div class="screen">

			<header>
				<h1>充值</h1>
				<a class="u_back" href="#">返回</a>
			</header>

			<div class="main no_footer_main">
				<!--充值成功图像 -->
				<div class="topup_success_img">
					<img src="../../images/icon22.png" />
					<p> 充值成功 三界石已到账 </p>
				</div>

				<!--充值成功详情-->
				<ul class="topup_success_details">
					<li> <span> 账户总额 </span> <em> 5200三界石 </em> </li>
					<li> <span> 充值总额 </span> <em> 2000三界石 </em> </li>
					<li> <span> 支付方式 </span> <em> 支付宝 </em> </li>
					<li> <span> 支付总额 </span> <em> 1000元 </em> </li>
					<li> <span> 充值时间 </span> <em> 2016-10-20 12：30 </em> </li>
				</ul>

				<div class="u_link_button topup_success_back">
					<a href="#">返回充值首页</a>
				</div>

			</div>

			<!--<footer>
			<ul>
				<li class="nowpage">
					<a href="#">
						<div><img src="../../images/shouye-xuanzhong.png" alt=""></div>
						<p>三界商城</p>
					</a>				
				</li>
				<li>
					<a href="#">
						<div><img src="../../images/weilaishenghuo-ct.png" alt=""></div>
						<p>三界本地</p>
					</a>				
				</li>
				<li>
					<a href="#">
						<div><img src="../../images/kefu-ct.png" alt=""></div>
						<p>商家</p>
					</a>				
				</li>
				<li>
					<a href="#">
						<div><img src="../../images/gouwuche-ct.png" alt=""></div>
						<p>购物车</p>
					</a>				
				</li>
				<li>
					<a href="#">
						<div><img src="../../images/gerenzhongxin-ct.png" alt=""></div>
						<p>我的</p>
					</a>				
				</li>
			</ul>
		</footer>-->

		</div>
		<script type="text/javascript" src="../../js/lib/zepto.min.js"></script>
		<script type="text/javascript" src="../../js/lib/fastclick.js"></script>
		<script>
			/*fastclick解决移动端点击延迟的问题*/
			if('addEventListener' in document) {
				document.addEventListener('DOMContentLoaded', function() {
					FastClick.attach(document.body);
				}, false);
			}
		</script>
	</body>

</html>