<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>空购物车</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/shopcar.css"/>
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="screen">
	<header>
		<a class="u_back" href="<?php echo \Yii::$app->urlManager->createUrl(['index/index']);?>"></a>
		<h1>购物车</h1>
		
	</header>
	<div class="main">
		<div class="sc_kong_wrap">
			<img src="<?php echo $pc_style; ?>images/kong-shopping-cart.png"/>
			<p>您的购物车是空的，去挑个宝贝吧</p>
			<a href="<?php echo \Yii::$app->urlManager->createUrl(['index/index']);?>">逛一逛</a>
		</div>
	</div>
	<div class="sc_bottom">
		<div class="sc_bottom_left">
			<label for="u_checkbox" style="color: #848484;"><input id="u_checkbox" type="checkbox" disabled="disabled">全选</label>
		</div>
		<div class="sc_bottom_center">
			<p>
				<span>合计：</span>
				<i>0</i>
				<span>三界石</span>
			</p>
			<li>
				不含运费
			</li>
		</div>
		<button class="sc_bottom_right">
			去结算
		</button>
	</div>
	<footer>
		<ul>
			<li class="nowpage">
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['index/index']);?>">
					<div><img src="<?php echo $pc_style; ?>images/shouye-xuanzhong.png" alt=""></div>
					<p class="active_t">三界商城</p>
				</a>				
			</li>
			
			<!--<li>
				<a class="aaa" attr="shang">
					<div><img src="<?php echo $pc_style; ?>images/kefu-ct.png" alt=""></div>
					<p>商家</p>
				</a>
			</li>-->
			<li>
				<a class="aaa" attr="huo">
					<div><img src="<?php echo $pc_style; ?>images/kefutwo.png" alt=""></div>
					<p >发现</p>
				</a>				
			</li>
			<li>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['user/usercenter']);?>">
					<div><img src="<?php echo $pc_style; ?>images/gerenzhongxin-ct.png" alt=""></div>
					<p>我的</p>
				</a>				
			</li>
		</ul>
	</footer>
</div>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
<script>
$(".aaa").click(function(){
	if($(this).attr("attr")=='ben'){
		document.cookie = "url="+"<?php echo \Yii::$app->urlManager->createUrl(['life/life_index']);?>"+";path=/";
		location.href = "<?php echo \Yii::$app->urlManager->createUrl(['life/life_index']);?>";
	}else if($(this).attr("attr")=='shang'){
		document.cookie = "url="+"<?php echo \Yii::$app->urlManager->createUrl(['merchant/mindex']);?>"+";path=/";
		location.href = "<?php echo \Yii::$app->urlManager->createUrl(['merchant/mindex']);?>";
	}else if($(this).attr("attr")=='huo'){
		document.cookie = "url="+"<?php echo \Yii::$app->urlManager->createUrl(['help/huodong']);?>"+";path=/";
		location.href="<?php echo \Yii::$app->urlManager->createUrl(['help/huodong']);?>";
	}
})


$(document).ready(function() {
	/*fastclick解决移动端点击延迟的问题*/
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	}
})
</script>
</body>
</html>