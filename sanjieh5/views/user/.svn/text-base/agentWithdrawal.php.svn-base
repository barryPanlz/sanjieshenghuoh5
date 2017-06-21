<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<meta name="wap-font-scale" content="no">
	<title> 代理商-提现 </title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/withdrawal.css"/>
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>



<body>
<div class="screen">
	
	<header>
		<h1> 提现 </h1>
		<a class="u_back"  href="javascript:history.go(-1);">返回</a>
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
				<span class="u_degree">代理商</span>
			</li>
			<li>
				<div><img src="../../images/icon19.png" alt=""></div>
				<h4>兑换汇率</h4>
				<span>￥1000.00/次</span>
			</li>
		</ul>
	 </div>
		
		<!--供应商提现方式-->
		<div class="supplier_withdrawal_style">
			<h5 class="supplier_withdrawal_style_h5"> 提现金额 </h5>
			<input class="supplier_withdrawal_style_num" type="number" name="" id="" placeholder="输入金额(元)" />
			<h5 class="supplier_withdrawal_style_h5"> 提现账号 </h5>
			<li class="supplier_withdrawal_style_li"> 
				<img id="supplier_withdrawal_img" src="../../images/icon_radio_red.png"/> 
				<span> 支付宝 </span> 
				<input type="text" name="" id="" placeholder="输入您的支付宝名称" /> 
			</li>
			<li>  <input type="number" name="" id="" placeholder="输入您的支付宝账号" /> </li>
			<li> 
				<img id="supplier_withdrawal_img1" src="../../images/icon_checkbox.png"/>
				<span> 银行卡</span> 
				<select name=""> 
				   <option value="">选择银行</option>
				   <option value="">建设银行</option>
				   <option value="">招商银行</option>
			    </select> 
			</li>
			<li>  <input type="number" name="" id="" placeholder="输入银行卡卡号" /> </li>
			<li>  <input type="text" name="" id="" placeholder="输入持卡人姓名" /> </li> 
		</div>
		
		<div class="u_button supplier_withdrawal_btn"><input type="submit" value="确认提现"></div>
		
		<p class="supplier_withdrawal_p supplier_withdrawal_p1"> 提现流程：用户发起——>填写提现账号信息——>平台审核——>平台打款——>资金到账。 </p>
		<p class="supplier_withdrawal_p"> 到账时间：1-2个工作日，遇周末、节假日则自动顺延。 </p>
		<p class="supplier_withdrawal_p supplier_withdrawal_p2"> 客服咨询:400-0680-1628 </p>
		
	</div>
	 
	
	
	
</div>
<script type="text/javascript" src="../../js/lib/zepto.min.js"></script>
<script type="text/javascript" src="../../js/lib/fastclick.js"></script>
<script>
    //	fastclick解决移动端点击延迟的问题
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	}
	
	
    //	选择银行还是支付宝支付
    $('#supplier_withdrawal_img').click(function(){ 
    		$('#supplier_withdrawal_img').attr('src','../../images/icon_radio_red.png');             
    		$('#supplier_withdrawal_img1').attr('src','../../images/icon_checkbox.png'); 
    });
    $('#supplier_withdrawal_img1').click(function(){ 
    		$('#supplier_withdrawal_img').attr('src','../../images/icon_checkbox.png');             
    		$('#supplier_withdrawal_img1').attr('src','../../images/icon_radio_red.png'); 
    });
    
    
	
</script>
</body>
</html>
