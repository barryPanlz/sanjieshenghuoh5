<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>商家主页</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/live/livecheck.css"/>
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="screen">
	<header>
		<h1>商家主页</h1>
		<a class="u_back" href="javascript:window.history.go(-1);">返回</a>
	</header>
	<div class="main">
		<div class="sk_top">
			<div class="sk_top_top">
				<img src="<?php echo $pic_host.$merchant['store_img']; ?>"/>
				<ul>
					<li><?php echo $merchant['store_name']; ?></li>
					<!--<li><span>注册号：</span><em><?php //echo $merchant['store_name']; ?></em></li>
					<li><span>注册名称：</span><em><?php //echo $merchant['store_name']; ?></em></li>-->
					<!-- <li><span>营业时间：</span><em>11:00-21:00</em></li>
					<li><span>门店服务：</span><em>支持WIFI</em></li> -->
					<li><span>电话：</span><em><?php echo $merchant['store_tel']; ?></em></li>
					<li><span>地址：</span><em><?php if(!empty($province['province'])&&!empty($city['city'])&&!empty($area['area'])){echo $province['province'].$city['city'].$area['area'].$merchant['address'];} ?></em></li>
				</ul>
			</div>
			<!--<div class="sk_top_bot">
				<ul>
					<li>电话：</li>
					<li><?php //echo $merchant['store_tel']; ?></li>
					<li>地址：</li>
					<li><?php if(!empty($province['province'])&&!empty($city['city'])&&!empty($area['area'])){echo $province['province'].$city['city'].$area['area'].$merchant['address'];} ?></li>
				</ul>
				<div>
					<li>
						<img src="<?php //echo $pic_host.$merchant['Rcode']; ?>"/>
						<p>扫码享受vip服务</p>
					</li>
				</div>
			</div>-->
		</div>
		<!-- <div class="sk_center_wrap">
			<div class="sk_center_head">
				商家介绍
			</div>
			<div class="sk_center_conternt">
				<img src="<?php //echo $pc_style; ?>images/shop.png"/>
				<?php //echo $merchant['store_desc']; ?>
			</div>
		</div> -->
		<div class="sk_center_wrap">
			<div class="sk_center_head">
				在售商品
			</div>
			<div class="sk_center_ul_wrap">
               <?php if(!empty($merchant_goods)){ foreach($merchant_goods as $v){ ?>
				<li>
					<a href="<?php echo Yii::$app->urlManager->createUrl(['life/goodsdetails','id'=>$v['store_goods_id']]);?>">
						<img src="<?php echo $pic_host.$v['goods_img'];?>"/>
						<div class="li_right">
							<p class="cont_title">
								<?php echo $v['goods_name'];?> 
							</p>
							<p class="cont_content">
								<?php echo $v['goods_name'];?>
							</p>
							<p class="cont_mony">
								<!--<span>
									￥
								</span>
								<span><?php echo $v['promote_price'];?></span>-->
							</p>
							<p class="cont_bott">
								<em>
									<span id="">
										￥
									</span>
									<span>
										<i><?php echo $v['promote_price'];?></i>
									</span>
								</em>
								<b>
									<span>
										已售
									</span>
									<b><?php echo $v['goods_sales'];?></b>
								</b>
							</p>
						</div>
					</a>
				</li>
				<?php } }?>
			</div>
		</div>

		
	</div>
	<footer>
		<ul>
			<li>
				<a href="<?php echo Yii::$app->urlManager->createUrl('index/index');?>">
					<div><img src="<?php echo $pc_style; ?>images/shouye-ct.png" alt=""></div>
					<p>三界商城</p>
				</a>				
			</li>
			<li class="nowpage">
				<a class="aaa" attr="ben">
					<div><img src="<?php echo $pc_style; ?>images/weilaishenghuo-xz.png" alt=""></div>
					<p>三界本地</p>
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
					<p>发现</p>
				</a>				
			</li>
			<li>
				<a href="<?php echo Yii::$app->urlManager->createUrl('user/usercenter');?>">
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

	/*fastclick解决移动端点击延迟的问题*/
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	}
</script>
</body>
</html>