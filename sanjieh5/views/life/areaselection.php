<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>三界本地-地区选择</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/classfy.css">
	<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/rem.js"></script>
</head>
<body>
<div class="screen">
	<header class="u_live_header">
		<h1>地区选择</h1>
		<a class="u_back" href="#" onclick="history.go(-1)">返回</a>
	</header>
	<div class="main">
		<h4 class="area_title">当前城市</h4>
		<div class="classfy_in area_list">
			<ul>
				<li><a href="#">北京</a></li>
			</ul>
		</div>
		<h4 class="area_title">已开辟分站</h4>
		<div class="classfy_in area_list">
			<ul>
				<li><a href="#">北京</a></li>
				<li><a href="#">天津</a></li>
				<li><a href="#">石家庄</a></li>
				<li><a href="#">邯郸</a></li>
				<li><a href="#">上海</a></li>
				<li><a href="#">杭州</a></li>
				<li><a href="#">苏州</a></li>
				<li><a href="#">天津</a></li>
				<li><a href="#">石家庄</a></li>
				<li><a href="#">邯郸</a></li>
				<li><a href="#">上海</a></li>
				<li><a href="#">杭州</a></li>
				<li><a href="#">苏州</a></li>
			</ul>
		</div>
		<h4 class="area_title">即将开辟</h4>
		<div class="classfy_in area_list area_list_gray">
			<ul>
				<li><a href="#">南昌</a></li>
				<li><a href="#">福建</a></li>
				<li><a href="#">武昌</a></li>
				<li><a href="#">合肥</a></li>
				<li><a href="#">南昌</a></li>
				<li><a href="#">福建</a></li>
				<li><a href="#">武昌</a></li>
				<li><a href="#">合肥</a></li>
			</ul>
		</div>
		<h4 class="area_title">全国其他城市</h4>
		<div class="classfy_in area_list area_list_gray">
			<ul>
				<li><a href="#">南昌</a></li>
				<li><a href="#">福建</a></li>
				<li><a href="#">武昌</a></li>
				<li><a href="#">合肥</a></li>
				<li><a href="#">南昌</a></li>
				<li><a href="#">福建</a></li>
				<li><a href="#">武昌</a></li>
				<li><a href="#">合肥</a></li>
			</ul>
		</div>
	</div>
	<footer>
		<ul>
			<ul>
			<li>
				<a href="#">
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
			<li >
				<a class="aaa" attr="huo">
					<div><img src="<?php echo $pc_style; ?>images/kefutwo.png" alt=""></div>
					<p>发现</p>
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
<script type="text/javascript" src="../../js/lib/zepto.min.js"></script>
<script type="text/javascript" src="../../js/lib/fastclick.js"></script>
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


	/*fastclick解决移动端点击延迟的问题*/
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	}
</script>
</body>
</html>