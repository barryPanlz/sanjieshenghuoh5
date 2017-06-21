<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>秒杀</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/miaosha.css"/>
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="screen">
	<header>
		<h1>秒杀抢购</h1>
		<a class="u_back" href="javascript:history.go(-1)">返回</a>
	</header>
	<div class="main no_footer_main">
		<div class="miaosha_top">
			<img src="<?php echo $pc_style; ?>images/miaosha4.jpg"/>
		</div>
		<div class="b_ul_top">
			秒杀专场
		</div>
		<ul class="cl_center miaosha_ul">
			<?php if(!empty($hotgoods)){ foreach($hotgoods as $k=>$v){?>
	           	<li>
		            <a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/details','goodsId'=>$v['goods_id'],'catId'=>$v['cat_id'] ])?>">
		            	<div class="cl_li_left">
			            		<img src="<?php echo $pic_host,$v['goods_img']; ?>" >
			            		<img class="cl_li_left_posi" src="<?php echo $pc_style; ?>images/miaosha.png"/>
			            	</div>
						<div class="cl_center_right">
							<p><?=$v['goods_name']?></p>
							<p class="cl_center_rig_p2"><span><?=$v['goods_price']?></span><span>三界石</span>
								<button>
									立即秒杀
								</button>
							</p>
							
						</div>
					</a>
				</li>
			<?php } }; ?>

<!--					<li>-->
<!--		            <a href="###">-->
<!--		            	<div class="cl_li_left">-->
<!--			            		<img src="--><?php //echo $pc_style; ?><!--images/shoujimiansha.jpg" >-->
<!--			            		<img class="cl_li_left_posi" src="--><?php //echo $pc_style; ?><!--images/miaosha.png"/>-->
<!--			            	</div>-->
<!--						<div class="cl_center_right">-->
<!--							<p>樱花空调大1.5P冷暖GMCC按实际掉海索秒杀久啊所阿斯蒂芬阿斯蒂芬阿斯大阿斯吓死多阿斯哦打死哦打死那是哦奥斯</p>-->
<!--							<p class="cl_center_rig_p2"><span>9800</span><span>三界石</span>-->
<!--								<button class="hui_but">-->
<!--									已抢光-->
<!--								</button>-->
<!--							</p>-->
<!--							-->
<!--						</div>-->
<!--					</a>-->
<!--				</li>-->
	           
	        
			</ul>
	</div>
</div>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
<script>
	/*fastclick解决移动端点击延迟的问题*/
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	}
</script>
</body>
</html>