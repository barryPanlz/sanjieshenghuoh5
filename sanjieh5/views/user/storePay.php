<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>商铺充值</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/reset.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/common.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/generalPay.css"/>
		<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<header>
			<h1>充值</h1>
			<a class="u_back" href="javascript:history.go(-1)">返回</a>
		</header>
		
		<div class="main no_footer_main">
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
						<span class="u_degree">商铺</span>
					</li>
					<li>
						<div><img src="../../images/icon19.png" alt=""></div>
						<h4>兑换汇率</h4>
						<span class="end">50:100(50元可充值100三界石)</span>
					</li>
				</ul>
			</div>
			
			<div class="input_box">
				<div>&nbsp; 充值金额<input type="text" class="num_b2" placeholder="输入金额（三界石）"/></div>
				<div>&nbsp; 需要支付<input type="text" class="num_q2"placeholder="需支付的人民币数额"/></div>
				
			</div>
			
			<div class="pay_way">
				<h2>支付方式</h2>
				<ul class="">
					<li>
						<input type="radio" name="1"/>
						<img  class="zifubao" src="../../images/zhifubao.png" alt="" />
					</li>
					<li>
						<input type="radio" name="1"/>
						<img class="weixin" src="../../images/wechat_payment.png" alt="" />
						<span>更快更安全</span>
					</li>
					<li>
						<input type="radio" name="1"/>
						<img  class="yinlian" src="../../images/yinlianzhifu.png" alt="" />
						<span>支持网银支付，银行卡快捷支付</span>
					</li>
				</ul>
			</div>
			
			<div class="sure_pay">
				<input type="button" value="确认充值" />
			</div>
			
		
		</div>
		<div class="error_box">
			<p>请输入大于1的整数金额</p>
	   </div>
		
	</body>
</html>
