<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
		<title> 店铺-提现成功 </title>
		<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
		<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/withdrawal.css" />
		<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	</head>

	<body>
		<div class="screen">

			<header>
				<h1>提现</h1>
				<a class="u_back" href="javascript:history.go(-1);">返回</a>
			</header>

			<div class="main no_footer_main">
				<!--供应商提现成功图像-->
				<div class="supplier_withdrawal_prompt">
					<img src="<?php echo $pc_style; ?>images/icon22.png" />
					<p> 提现申请已提交，请等待平台处理 </p>
				</div>

				<!--供应商提现成功详细信息-->
				<!--<ul class="supplier_withdrawal_message">
					<li class="supplier_withdrawal_message_li"> <span> 提现账号   </span>
						<font> 招商银行（尾号4226） </font>
					</li>
					<li> <span> 充值金额   </span>
						<font> 2000三界石 </font>
					</li>
					<li> <span> 提现时间   </span>
						<font> 2016-11-11 15:21 </font>
					</li>
				</ul>-->

				<!--供应商提现成功到账时间-->
				<div class="supplier_withdrawal_time">
					到账时间：1-2个工作日，遇周末、节假日则自动顺延
				</div>

				<div class="u_link_button supplier_withdrawal_return">
					<a href="<?php echo \Yii::$app->urlManager->createUrl(['user/usercenter']);?>">返回提现首页</a>
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
		<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script>
		<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
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