<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>爆款</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/miaosha.css"/>
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="screen">
	<header class="u_live_header">
		<h1>爆款抢购</h1>
		<a class="u_back" href="javascript:history.go(-1)">返回</a>
	</header>
	<div class="main no_footer_main">
		<div class="miaosha_top">
			<img src="<?php echo $pc_style; ?>images/fuzhou.jpg"/>
		</div>
		<!--<div class="b_ul_top">
			爆款抢购
		</div>-->
		<ul class="cl_center">

			<?php if(!empty($hotgoods)){foreach($hotgoods as $k=>$v){?>
	            <li>
		            <a href="<?php echo \Yii::$app->urlManager->createUrl(['life/goodsdetails','id'=>$v['store_goods_id']])?>">
		            	<div class="cl_li_left">
		            		<img src="<?php echo $pic_host,$v['goods_img']; ?>" >
		            		<img class="cl_li_left_posi" src="<?php echo $pc_style; ?>images/qianggou.png"/>
		            	</div>
						<div class="cl_center_right">
							<p><?=$v['goods_name']?></p>
							<p class="cl_center_rig_p2"><span><?=$v['promote_price']?></span><span>三界石</span>
								<button>
									马上抢购
								</button>
							</p>
						</div>
					</a>
				</li>
			<?php }; }?>

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
	 
 
//   $(".main").scroll(function(){
//       var $this =$(this),
//       viewH =$(this).height(),//可见高度
//       contentH =$(this).get(0).scrollHeight,//内容高度
//       scrollTop =$(this).scrollTop();//滚动高度
//       console.log(viewH);
//       console.log(contentH);
//       console.log(scrollTop);
//      //if(contentH - viewH - scrollTop <= 100) { //到达底部100px时,加载新内容
//      if(scrollTop/(contentH -viewH)>=0.95){ //到达底部100px时,加载新内容
//      // 这里加载数据..
//      alert(1);
//      }
//   });
 
	
	
</script>
</body>
</html>