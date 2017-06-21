<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>发现</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/huodong.css">
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	<style>
		.site {
		    position: absolute;
		    top: 0.2rem;
		    right: 0.3rem;
		    color: #FFFFFF;
		    font-size: 0.26rem;
		}
		.site span{
			color: #FFFFFF;
		}
	</style> 
</head>
<body>
<div class="screen">
	<header>
		<h1>发现</h1>
		<!--<a class="site" id="city" attr="chosecity"> 
			[<span id="address">城市</span> ]  
	    </a>-->
	</header>
	<div class="main">
		<!-- <div class="tab_box">
			<a class="tab_div1">
				<h3>创业会员奖励收益</h3>
				<ul>
					<li class="ffs">第1名</li>
					<li>12月第1周</li>
					<li>138****455</li>
					<li><span class="monynub">0 </span><span>三界宝</span></li>
				</ul>
				<ul>
					<li class="ffs">第2名</li>
					<li>12月第1周</li>
					<li>138****455</li>
					<li><span class="monynub">0 </span> <span>三界宝</span></li>
				</ul>
				<ul>
					<li class="ffs">第3名</li>
					<li>12月第1周</li>
					<li>138****455</li>
					<li><span class="monynub">0 </span> <span>三界宝</span></li>
				</ul>
				<ul>
					<li>第4名</li>
					<li>12月第1周</li>
					<li>138****455</li>
					<li><span class="monynub">0 </span><span>三界宝</span></li>
				</ul>
				<ul>
					<li>第5名</li>
					<li>12月第1周</li>
					<li>138****455</li>
					<li><span class="monynub">0 </span> <span>三界宝</span></li>
				</ul>
			</a>
			<a class="tab_div2 tab_hid">
				<h3>店铺销量排行榜</h3>
				<ul>
					<li class="ffs">第1名</li>
					<li>12月第1周</li>
					<li>河北邢台新骑点</li>
					<li><span>￥</span><span class="monynub">10600</span></li>
				</ul>
				<ul>
					<li class="ffs">第2名</li>
					<li>12月第1周</li>
					<li>河北邢台新骑点</li>
					<li><span>￥</span><span class="monynub">1050</span></li>
				</ul>
				<ul>
					<li class="ffs">第3名</li>
					<li>12月第1周</li>
					<li>河北邢台新骑点</li>
					<li><span>￥</span><span class="monynub">109000</span></li>
				</ul>
				<ul>
					<li>第4名</li>
					<li>12月第1周</li>
					<li>河北邢台新骑点</li>
					<li><span>￥</span><span class="monynub">106000</span></li>
				</ul>
				<ul>
					<li>第5名</li>
					<li>12月第1周</li>
					<li>河北邢台新骑点</li>
					<li><span>￥</span><span class="monynub">100300</span></li>
				</ul>
			</a>
			<ul class="tab_num">
				<li class="tab_active"></li>
				<li></li>
			</ul>		
		</div> -->
				
		<!-- <div class="guanggao">
			<h3>秒杀专场</h3>
			<a href="<?php //echo \Yii::$app->urlManager->createUrl(['help/miaosha']);?>">
				<img src="<?php //echo $pc_style; ?>images/miaosha1.png" alt="" />
			</a>
		</div>
		<div class="guanggao">
			<h3>爆款</h3>
			<a href="<?php //echo \Yii::$app->urlManager->createUrl(['help/baokuan']);?>">
				<img src="<?php //echo $pc_style; ?>images/miaosha1.png" alt="" />
			</a>
		</div> -->
		 <div class="guanggao">
			
			<?php if(!empty($act_list)){ 
				foreach ($act_list as $key => $actlist) { ?>
					<!-- 秒杀活动 -->
					<?php if($actlist['recommend_type'] == 1){ ?>
					<!-- <h3>秒杀</h3> -->
					<a href="<?php echo \Yii::$app->urlManager->createUrl(['help/miaosha','activityId'=>$actlist['target_id']]);?>">
						<img src="<?php echo $actlist['thumb']?>" alt="" />
					</a>
					<!-- 爆款 -->
					<?php }else if($actlist['recommend_type'] == 2){ ?>
					<!-- <h3>爆款</h3> -->
					<a href="<?php echo \Yii::$app->urlManager->createUrl(['help/baokuan','activityId'=>$actlist['target_id']]);?>">
						<img src="<?php echo $actlist['thumb']?>" alt="" />
					</a>
					<!-- 单条分类 -->
					<?php }else if($actlist['recommend_type'] == 3){?>
					<a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/goodslist','cat_id'=>'2']);?>">
						<img src="<?php echo $actlist['thumb']; ?>" alt="" />
					</a>
					<!--  超链接-->
					<?php }else if($actlist['recommend_type'] == 4){?>
					<a href="<?php echo $actlist['target_url'];?>">
						<img src="<?php echo $actlist['thumb']; ?>" alt="" />
					</a>
					<!-- 单条商品 -->
					<?php }else if($actlist['recommend_type'] == 5){?>
					<a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/details','goodsId'=>$actlist['target_id'],"catId"=>'2']);?>">
						<img src="<?php echo $navlist['thumb']; ?>" alt="" />
					</a>
					<!-- 商品列表 -->
					<?php }else if($actlist['recommend_type'] == 6){?>
					<a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/goodslist','cat_id'=>'2']);?>">
						<img src="<?php echo $actlist['thumb']; ?>" alt="" />
					</a>
					<!-- 分类列表 -->
					<?php }else if($actlist['recommend_type'] == 7){?>
					<a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/goodscat']);?>">
						<img src="<?php echo $actlist['thumb']; ?>" alt="" />
					</a>
					<!-- 订单列表 -->
					<?php }else if($actlist['recommend_type'] == 8){?>
					<a href="<?php echo \Yii::$app->urlManager->createUrl(['user/shoporder']);?>">
						<img src="<?php echo $actlist['thumb']; ?>" alt="" />
					</a>
					<!-- 购物车 -->
					<?php }else if($actlist['recommend_type'] == 9){?>
					<a href="<?php echo \Yii::$app->urlManager->createUrl(['car/car']);?>">
						<img src="<?php echo $actlist['thumb']; ?>" alt="" />
					</a>
					<?php }?>
				    	
			<?php  } } ?>
		</div> 

		
		<div class="nav_type">
			<ul>
				<li>
					<a href="<?php echo Yii::$app->urlManager->createUrl(['help/customerservice']);?>">
						<img src="<?php echo $pc_style; ?>images/nav_type1.png" alt="" />
						<p>客服</p>
					</a>
				</li>
				<li>
					<a href="<?php echo Yii::$app->urlManager->createUrl(['help/aboutus']);?>">
						<img src="<?php echo $pc_style; ?>images/nav_type2.png" alt="" />
						<p>关于我们</p>
					</a>
				</li>
				<li>
					<a href="<?php echo Yii::$app->urlManager->createUrl(['help/share']);?>">
						<img src="<?php echo $pc_style; ?>images/nav_type3.png" alt="" />
						<p>分享邀请</p>
					</a>
				</li>
				
			</ul>
			<ul>
				<li>
					<a href="<?php echo Yii::$app->urlManager->createUrl(['help/whatsanjiebao']);?>">
						<img src="<?php echo $pc_style; ?>images/nav_type4.png" alt="" />
						<p>三界宝</p>
					</a>
				</li>
				<li>
					<a href="<?php echo Yii::$app->urlManager->createUrl(['help/whatsanjieshi']);?>">
						<img src="<?php echo $pc_style; ?>images/nav_type5.png" alt="" />
						<p>三界石</p>
					</a>
				</li>
				<li>
					<a href="###">
						<img class="end" src="<?php echo $pc_style; ?>images/nav_type6.png" alt="" />
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
			
			<!--<li>
				<a class="aaa" attr="shang">
					<div><img src="<?php echo $pc_style; ?>images/kefu-ct.png" alt=""></div>
					<p>商家</p>
				</a>
			</li>-->
			<li >
				<a class="aaa" attr="huo">
					<div><img src="<?php echo $pc_style; ?>images/kefuone.png" alt=""></div>
					<p class="active_t">发现</p>
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
//切换城市
  var cityname = localStorage.getItem("cityname");
  if(cityname != null){ 
	  cityname = cityname.split("·");
	  if( cityname[1].length >= 5 ){
	  	$('#address').html( cityname[1].slice(0,4) );
	  }else{
	  	$('#address').html( cityname[1] );
	  }
	}

  $("#city").click(function(){
	if($(this).attr("attr")=='chosecity'){
		document.cookie = "url="+"<?php echo \Yii::$app->urlManager->createUrl(['help/huodong']);?>"+";path=/";
		location.href = "<?php echo \Yii::$app->urlManager->createUrl(['merchant/chosecity']);?>";
	}
})
  







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


	$(function(){
		$('.tab_num li').click(function(){
			$(this).addClass('tab_active').siblings().removeClass('tab_active');
			var index =$(this).index();
			$('.tab_box a').eq(index).css({display:'block'}).siblings('a').css({display:"none"});
		});
		var onum=$(".tab_hid").find(".monynub");
		$.each(onum, function(i) {
			var anub=$(this).text()    
			if(anub>=10000){
				anub=anub/10000+"w";
		}
			$(this).text(anub);
		});
	})
</script>
</body>
</html>