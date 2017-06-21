<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="format-detection" content="telephone=no" />
		<title>商品结算</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/common.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/myaccountant.css" />
		<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	</head>

	<body>
		<header>
			<h1>我的账房</h1>
			<a class="u_back" href="javascript:history.go(-1)">返回</a>
		</header>
		<div class="main">
			<div class="b_box store_box_num">
				<ul>
					<li>
						<p class="txt">三界石（余额）</p>
						<p class="num">100.00</p>
					</li>
					<li>
						<p class="txt">三界石（余额）</p>
						<p class="num">100.00</p>
					</li>
					<li>
						<p class="txt">人民币（余额）</p>
						<p class="num">100.00</p>
					</li>
				</ul>
			</div>
			<div class="z_box z_store_box">
				<ul>
					<li>
						<a href="generalPay.html">充值</a>
					</li>
					<li>
						<a href="">转账</a>
					</li>
					<li>
						<a href="">提现</a>
					</li>
				</ul>
			</div>

			<div class="acc_box">
				<div class="z_d">
					<p>明细账单<span>（50）</span></p>
				</div>
				<div class="z_list">
					<ul class="z_tit z_tit_store fix">
						<li class="t1">时间</li>
						<li class="j1 z_type">
							<span>交易类型</span>
							<img src="../../images/downarrow.png" />
							<div class="mark">
								<div class="m_box store_a">
									<span></span>
									<div>全部</div>
									<div>充值</div>
									<div>转账</div>
									<div>提现</div>
									<div>消费</div>
									<div>会员消费奖励</div>
									<div>消费业绩</div>
								</div>
							</div>
						</li>
						<li class="s1">三界石</li>
						<li class="s2">三界宝</li>
						<li class="s3">人民币</li>
					</ul>
				</div>

				<div class="z_li">
					<ul>
						<li class="">今天<span>07:33</span></li>
						<li class="">会员消费奖励</li>
						<li class="z">+1000</li>
						<li class="">+1000</li>
						<li class="">+1000</li>
					</ul>
				</div>

				<div class="z_li">
					<ul>
						<li class="">昨天<span>07:33</span></li>
						<li class="">会员消费奖励</li>
						<li class="z">+1000</li>
						<li class="">+1000</li>
						<li class="">+1000</li>
					</ul>
				</div>

				<div class="z_li">
					<ul>
						<li class="">周二<span>10-18</span></li>
						<li class="">消费</li>
						<li class="z">+1000</li>
						<li class="">+1000</li>
						<li class="">+1000</li>
					</ul>
				</div>

				<div class="z_li">
					<ul>
						<li class="">周五<span>07:33</span></li>
						<li class="">转账</li>
						<li class="z">+1000</li>
						<li class="">+1000</li>
						<li class="">+1000</li>
					</ul>
				</div>

				<div class="z_li">
					<ul>
						<li class="">周一<span>07:33</span></li>
						<li class="">兑换</li>
						<li class="z">+1000</li>
						<li class="">+1000</li>
						<li class="">+1000</li>
					</ul>
				</div>

				<div class="z_li">
					<ul>
						<li class="">周二<span>10-18</span></li>
						<li class="">店铺充值奖励</li>
						<li class="z">+1000</li>
						<li class="">+1000</li>
						<li class="">+1000</li>
					</ul>
				</div>

			</div>
		</div>
		<footer>
			<div class="z_li z_heji">
				<ul>
					<li class=""></li>
					<li class="z_li_h">合计</li>
					<li class="z_num ">+9000</li>
					<li class="z_num  z_num1">+9000</li>
					<li class="z_num z_num1">+9000</li>
				</ul>
			</div>
		</footer>

		<script src="../../js/lib/zepto.min.js" type="text/javascript" charset="utf-8"></script>
		<script>
			$('.z_type').click(function() {
				$('.m_box').show();
			})

			$('.m_box div').click(function() {
				console.log($(this))
				var index = $(this).index();
				console.log(index)
				$('.mark .m_box').hide();
			})
		</script>
	</body>

</html>