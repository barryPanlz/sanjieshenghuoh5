<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
		<title> 店铺-转账 </title>
		<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
		<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/storetransfer.css" />
		<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	</head>

	<body>
		<div class="screen">

			<header>
				<h1>转账</h1>
				<a class="u_back" href="javascript:history.go(-1);">返回</a>
			</header>

			<div class="main no_footer_main">

				<!--店铺信息-->
				<div class="u_list">
					<ul>
						<li>
							<div><img src="../../images/icon13.png" alt=""></div>
							<h4>账户余额</h4>
							<span>3200三界石</span>
						</li>
						<li>
							<div><img src="../../images/icon16.png" alt=""></div>
							<h4>我的身份</h4>
							<span class="u_degree">店铺</span>
						</li>
						<li>
							<div><img src="../../images/icon19.png" alt=""></div>
							<h4>兑换汇率</h4>
							<span>￥1000.00/次</span>
						</li>
					</ul>
				</div>

				<!--店铺转账金额-->
				<div class="store_tranfer_sum">
					<div class="store_tranfer_box">
						<span> 输入金额 </span>
						<input type="number" name="" id="" placeholder="输入金额(三界石)" />
					</div>
					<div class="store_tranfer_box">
						<span> 对方账户 </span>
						<input type="text" name="" id="" placeholder="输入对方账户" />
					</div>
				</div>

				<div class="u_button store_tranfer_btn"><input type="submit" value="确认转账"></div>

				<div class="motai_succe store_tranfer_suc">
					转账成功
				</div>

				<div class="motai_lose store_tranfer_suc" style="display: none;">
					抱歉 当前余额不足
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