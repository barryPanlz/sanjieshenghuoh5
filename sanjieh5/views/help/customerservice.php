<!--这是活动页的主页面-->
<!--<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>活动</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/huodong.css">
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="screen">
	<header>
		<h1>活动</h1>
		<a class="u_back" href="javascript:history.go(-1);">返回</a>
	</header>
	<div class="main">
		<div class="tab_box">
			<a class="tab_div1">
				<h3>创业会员奖励收益</h3>
				<ul>
					<li>第1名</li>
					<li>12月第1周</li>
					<li>138****455</li>
					<li>0 <span>三界宝</span></li>
				</ul>
				<ul>
					<li>第2名</li>
					<li>12月第1周</li>
					<li>138****455</li>
					<li>0 <span>三界宝</span></li>
				</ul>
				<ul>
					<li>第3名</li>
					<li>12月第1周</li>
					<li>138****455</li>
					<li>0 <span>三界宝</span></li>
				</ul>
				<ul>
					<li>第4名</li>
					<li>12月第1周</li>
					<li>138****455</li>
					<li>0 <span>三界宝</span></li>
				</ul>
				<ul>
					<li>第5名</li>
					<li>12月第1周</li>
					<li>138****455</li>
					<li>0 <span>三界宝</span></li>
				</ul>
			</a>
			<a class="tab_div2 tab_hid">
				<h3>店铺销量排行榜</h3>
				<ul>
					<li>第1名</li>
					<li>12月第1周</li>
					<li>河北邢台新骑点</li>
					<li><span>￥</span>10000</li>
				</ul>
				<ul>
					<li>第2名</li>
					<li>12月第1周</li>
					<li>河北邢台新骑点</li>
					<li><span>￥</span>10000</li>
				</ul>
				<ul>
					<li>第3名</li>
					<li>12月第1周</li>
					<li>河北邢台新骑点</li>
					<li><span>￥</span>10000</li>
				</ul>
				<ul>
					<li>第4名</li>
					<li>12月第1周</li>
					<li>河北邢台新骑点</li>
					<li><span>￥</span>10000</li>
				</ul>
				<ul>
					<li>第5名</li>
					<li>12月第1周</li>
					<li>河北邢台新骑点</li>
					<li><span>￥</span>10000</li>
				</ul>
			</a>
			<ul class="tab_num">
				<li class="tab_active"></li>
				<li></li>
			</ul>		
		</div>
				
		<div class="guanggao">
			<h3>秒杀专场</h3>
			<a href="">
				<img src="<?php echo $pc_style; ?>images/miaosha1.png" alt="" />
			</a>
		</div>
		<div class="guanggao">
			<h3>爆款</h3>
			<a href="">
				<img src="<?php echo $pc_style; ?>images/miaosha1.png" alt="" />
			</a>
		</div>
		
		<div class="nav_type">
			<ul>
				<li>
					<a href="">
						<img src="<?php echo $pc_style; ?>images/nav_type1.png" alt="" />
						<p>客服</p>
					</a>
				</li>
				<li>
					<a href="">
						<img src="<?php echo $pc_style; ?>images/nav_type2.png" alt="" />
						<p>关于我们</p>
					</a>
				</li>
				<li>
					<a href="">
						<img src="<?php echo $pc_style; ?>images/nav_type3.png" alt="" />
						<p>分享邀请</p>
					</a>
				</li>
				
			</ul>
			<ul>
				<li>
					<a href="">
						<img src="<?php echo $pc_style; ?>images/nav_type4.png" alt="" />
						<p>三界宝</p>
					</a>
				</li>
				<li>
					<a href="">
						<img src="<?php echo $pc_style; ?>images/nav_type5.png" alt="" />
						<p>三界石</p>
					</a>
				</li>
				<li>
					<a href="">
						<img src="<?php echo $pc_style; ?>images/nav_type6.png" alt="" />
						<p></p>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<footer>
		<ul>
			<li class="nowpage">
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['index/index']);?>">
					<div><img src="<?php echo $pc_style; ?>images/shouye-ct.png" alt=""></div>
					<p>三界商城</p>
				</a>				
			</li>
			<li>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['life/life_index']);?>">
					<div><img src="<?php echo $pc_style; ?>images/weilaishenghuo-ct.png" alt=""></div>
					<p>三界本地</p>
				</a>				
			</li>
			<li>
			<?php if(!empty(Yii::$app->session->get('city'))){ ?>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['merchant/index']);?>">
					<div><img src="<?php echo $pc_style; ?>images/kefu-ct.png" alt=""></div>
					<p>商家</p>
				</a>
			<?php }else{ ?>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['merchant/chosecity']);?>">
					<div><img src="<?php echo $pc_style; ?>images/kefu-ct.png" alt=""></div>
					<p>商家</p>
				</a>
			<?php }?>
								
			</li>
			<li>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['car/car']);?>">
					<div><img src="<?php echo $pc_style; ?>images/gouwuche-ct.png" alt=""></div>
					<p>购物车</p>
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
<script>
	$(function(){
		$('.tab_num li').click(function(){
			$(this).addClass('tab_active').siblings().removeClass('tab_active');
			var index =$(this).index();
			$('.tab_box a').eq(index).show().siblings('a').hide();
		})
	})
</script>
</body>
</html>-->






<!----------------------排行榜y页面------------------------->
<!--<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>排行榜</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/huodong.css">
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="screen">
	<header>
		<h1>排行榜</h1>
		<a class="u_back" href="javascript:history.go(-1);">返回</a>
	</header>
	<div class="main">
		<div class="paihang">
			<a class="paihang_active" href="">创业会员奖励收益</a></li>
			<a href="">店铺销量</a>
		</div>	
		<div class="paihang_box">			
			<ul class="paihang_div1">
				<li>名次</li>
				<li>时间</li>
				<li>用户名</li>
				<li>收益数额</li>
			</ul>		
			<div class="paihang_div2">
				<ul>
					<li>第1名</li>
					<li>12月第1周</li>
					<li>138****455</li>
					<li>0 <span>三界宝</span></li>
				</ul>
			</div>
		</div>
				
	</div>
	<footer>
		<ul>
			<li class="nowpage">
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['index/index']);?>">
					<div><img src="<?php echo $pc_style; ?>images/shouye-ct.png" alt=""></div>
					<p>三界商城</p>
				</a>				
			</li>
			<li>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['life/life_index']);?>">
					<div><img src="<?php echo $pc_style; ?>images/weilaishenghuo-ct.png" alt=""></div>
					<p>三界本地</p>
				</a>				
			</li>
			<li>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['help/customerservice']);?>">
					<div><img src="<?php echo $pc_style; ?>images/kefu-xz.png" alt=""></div>
					<p class="active_t">客服</p>
				</a>				
			</li>
			<li>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['car/car']);?>">
					<div><img src="<?php echo $pc_style; ?>images/gouwuche-ct.png" alt=""></div>
					<p>购物车</p>
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
<script>

</script>
</body>
</html>-->




<!-----------------------------------------------排行榜二----------------------------------------->
<!--<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>排行榜</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/huodong.css">
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="screen">
	<header>
		<h1>排行榜</h1>
		<a class="u_back" href="javascript:history.go(-1);">返回</a>
	</header>
	<div class="main">
		<div class="paihang">
			<a class="" href="">创业会员奖励收益</a></li>
			<a class="paihang_active" href="">店铺销量</a>
		</div>	
		<div class="paihang_box">			
			<ul class="paihang_div1">
				<li>名次</li>
				<li>时间</li>
				<li>用户名</li>
				<li>收益数额</li>
			</ul>		
			<div class="paihang_div2 paihang_div22">
				<ul>
					<li>第1名</li>
					<li>12月第1周</li>
					<li>河北邢台新骑点</li>
					<li>￥<span>0</span></li>
				</ul>
			</div>
		</div>
				
	</div>
	<footer>
		<ul>
			<li class="nowpage">
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['index/index']);?>">
					<div><img src="<?php echo $pc_style; ?>images/shouye-ct.png" alt=""></div>
					<p>三界商城</p>
				</a>				
			</li>
			<li>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['life/life_index']);?>">
					<div><img src="<?php echo $pc_style; ?>images/weilaishenghuo-ct.png" alt=""></div>
					<p>三界本地</p>
				</a>				
			</li>
			<li>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['help/customerservice']);?>">
					<div><img src="<?php echo $pc_style; ?>images/kefu-xz.png" alt=""></div>
					<p class="active_t">客服</p>
				</a>				
			</li>
			<li>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['car/car']);?>">
					<div><img src="<?php echo $pc_style; ?>images/gouwuche-ct.png" alt=""></div>
					<p>购物车</p>
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
<script>

</script>
</body>
</html>-->




<!------------------------------关于我们-------------------------------->

