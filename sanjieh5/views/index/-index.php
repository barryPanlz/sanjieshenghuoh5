<?php
    use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>三界生活商城-积分商城|区块链商城</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/mallIndex.css"/>
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $pc_style; ?>js/lib/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $pc_style; ?>js/lib/jquery.touchSlider.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $pc_style; ?>js/lib/jquery.event.drag-1.5.min.js" type="text/javascript" charset="utf-8"></script>
</head>	
<body>
<div class="screen">
	  <!--商城首页头部-->
	  <header>
		<a class="u_search seek" href="<?php echo Yii::$app->urlManager->createUrl('goods/goodscat');?>">搜索</a>
		<h1>三界商城</h1>
		<a class="shopping_cart" <a href="<?php echo \Yii::$app->urlManager->createUrl(['car/car']);?>">>购物车</a>
	  </header>
	<div class="main main_1">
		 
	  <!--商城首页轮播图-->
	  <div class="mallIndex_img"> 
		<div class="main_visual">
			<!--<div class="flicking_con">
				<a href="#">1</a>
				<a href="#">2</a>
				<a href="#">3</a>
				<a href="#">4</a>
				<a href="#">5</a>
				<span>/9</span>
			</div>-->
			
			<div class="main_image">
				<ul id="main_image_ul">
				
				<li>
					<a href="<?php echo @\Yii::$app->urlManager->createUrl(['index/suiyi']);?>" class="img_1">
                            <img src="<?php echo $pc_style; ?>images/yimitai.png"/>
                    </a>
				</li>

				
				
					
				</ul>
				<a href="javascript:;" id="btn_prev"></a>
				<a href="javascript:;" id="btn_next"></a>
			</div>
        </div>
			
	  </div>
	  
	  <!--商城首页-总导航-->
	  <div class="mallIndex_navi"> 
	  <!-- 秒杀活动 -->
		<?php if(!empty($tuijian_list)){ foreach ($tuijian_list as $key => $tuijianlist) { ?>
				<?php if($tuijianlist['recommend_type'] == 1){ ?>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['help/miaosha','activityId'=>$actlist['target_id']]);?>">
			  		<img src="<?php echo $tuijianlist['thumb']; ?>"/>
			  		<p> <?php echo $tuijianlist['title']; ?> </p>
			  	</a>
				<!-- 爆款 -->
				<?php }else if($tuijianlist['recommend_type'] == 2){ ?>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['help/baokuan','activityId'=>$actlist['target_id']]);?>">
			  		<img src="<?php echo $tuijianlist['thumb']; ?>"/>
			  		<p> <?php echo $tuijianlist['title']; ?> </p>
			  	</a>
				<!-- 单条分类 -->
				<?php }else if($tuijianlist['recommend_type'] == 3){?>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/goodslist','cat_id'=>$tuijianlist['target_id']]);?>">
			  		<img src="<?php echo $tuijianlist['thumb']; ?>"/>
			  		<p> <?php echo $tuijianlist['title']; ?> </p>
			  	</a>
				<!--  超链接-->
				<?php }else if($tuijianlist['recommend_type'] == 4){?>
				<a href="<?php echo $tuijianlist['target_url']; ?>">
			  		<img src="<?php echo $tuijianlist['thumb']; ?>"/>
			  		<p> <?php echo $tuijianlist['title']; ?> </p>
			  	</a>
				<!-- 单条商品 -->
				<?php }else if($tuijianlist['recommend_type'] == 5){?>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/details','goodsId'=>$tuijianlist['target_id'],"catId"=>$tuijianlist['cat_id']]);?>">
			  		<img src="<?php echo $tuijianlist['thumb']; ?>"/>
			  		<p> <?php echo $tuijianlist['title']; ?> </p>
			  	</a>
				<!-- 商品列表 -->
				<?php }else if($tuijianlist['recommend_type'] == 6){?>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/goodslist','cat_id'=>$tuijianlist['target_id']]);?>">
			  		<img src="<?php echo $tuijianlist['thumb']; ?>"/>
			  		<p> <?php echo $tuijianlist['title']; ?> </p>
			  	</a>
				<!-- 分类列表 -->
				<?php }else if($tuijianlist['recommend_type'] == 7){?>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/goodscat']);?>">
			  		<img src="<?php echo $tuijianlist['thumb']; ?>"/>
			  		<p> <?php echo $tuijianlist['title']; ?> </p>
			  	</a>
				<!-- 订单列表 -->
				<?php }else if($tuijianlist['recommend_type'] == 8){?>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['user/dianpuorder']);?>">
			  		<img src="<?php echo $tuijianlist['thumb']; ?>"/>
			  		<p> <?php echo $tuijianlist['title']; ?> </p>
			  	</a>
				<!-- 购物车 -->
				<?php }else if($tuijianlist['recommend_type'] == 9){?>
					<a href="<?php echo \Yii::$app->urlManager->createUrl(['car/car']);?>">
				  		<img src="<?php echo $tuijianlist['thumb']; ?>"/>
				  		<p> <?php echo $tuijianlist['title']; ?> </p>
				  	</a>
				<?php }?>
				<!-- foreach结束 -->
				<?php } }?>
	  </div>
	  
	  
	  <!--合伙商-->
	  <div class="partnerShip">
	  <?php if(!empty($ship_list)){ foreach ($ship_list as $key => $shiplist) { ?>
	  	<a href="<?php echo $shiplist['target_url'];?>">
	  		<img src="<?php echo $shiplist['thumb']; ?>"/> 
	  	</a>
	  <?php } }?>
	  	
	  </div>
	  
	  <!--商城首页-品质-->
	  <div class="mallIndex_h3"> 品质 </div>
	  <div class="mallIndex_quality">
	  	<ul class="mallIndex_quality_ul1">
	      <?php if(!empty($hall_list)){ foreach ($hall_list as $key => $halllist) { ?>
			<?php if($halllist['recommend_type'] == 1){ ?>
			  	<a href="<?php echo \Yii::$app->urlManager->createUrl(['help/miaosha','activityId'=>$actlist['target_id']]);?>"> <img src="<?php echo $halllist['thumb']; ?>"/></a>
				<!-- 爆款 -->
				<?php }else if($halllist['recommend_type'] == 2){ ?>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['help/baokuan','activityId'=>$actlist['target_id']]);?>"> <img src="<?php echo $halllist['thumb']; ?>"/></a>
				<!-- 单条分类 -->
				<?php }else if($halllist['recommend_type'] == 3){?>
				
			  	<a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/goodslist','cat_id'=>$halllist['target_id']]);?>"> <img src="<?php echo $halllist['thumb']; ?>"/></a>
				<!--  超链接-->
				<?php }else if($halllist['recommend_type'] == 4){?>
			  	<a href="<?php echo $halllist['target_url']; ?>"> <img src="<?php echo $halllist['thumb']; ?>"/></a>
				<!-- 单条商品 -->
				<?php }else if($halllist['recommend_type'] == 5){?>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/details','goodsId'=>$halllist['target_id'],'catId'=>$halllist['cat_id']]);?>"> <img src="<?php echo $halllist['thumb']; ?>"/></a>
				<!-- 商品列表 -->
				<?php }else if($halllist['recommend_type'] == 6){?>
			  	<a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/goodslist','cat_id'=>$halllist['target_id']]);?>"> <img src="<?php echo $halllist['thumb']; ?>"/></a>
				<!-- 分类列表 -->
				<?php }else if($halllist['recommend_type'] == 7){?>
			  	<a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/goodscat']);?>"> <img src="<?php echo $halllist['thumb']; ?>"/></a>
				<!-- 订单列表 -->
				<?php }else if($halllist['recommend_type'] == 8){?>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['user/dianpuorder']);?>"> <img src="<?php echo $halllist['thumb']; ?>"/></a>
				<!-- 购物车 -->
				<?php }else if($halllist['recommend_type'] == 9){?>
				  	<a href="<?php echo \Yii::$app->urlManager->createUrl(['car/car']);?>"> <img src="<?php echo $halllist['thumb']; ?>"/></a>
				<?php }?>

	       <?php }}?>
	  	</ul> 
	  </div>


	  <div class="mallIndex_quality mallIndex_quality_dif">
	  	 <ul class="mallIndex_quality_ul2">
	        <?php if(!empty($hall2_list)){ foreach ($hall2_list as $key => $hall2list) { ?>

			<?php if($hall2list['recommend_type'] == 1){ ?>
			  	<a href="<?php echo \Yii::$app->urlManager->createUrl(['help/miaosha','activityId'=>$actlist['target_id']]);?>"> <img src="<?php echo $hall2list['thumb']; ?>"/></a>
				<!-- 爆款 -->
				<?php }else if($hall2list['recommend_type'] == 2){ ?>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['help/baokuan','activityId'=>$actlist['target_id']]);?>"> <img src="<?php echo $hall2list['thumb']; ?>"/></a>
				<!-- 单条分类 -->
				<?php }else if($hall2list['recommend_type'] == 3){?>
				
			  	<a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/goodslist','cat_id'=>$hall2list['target_id']]);?>"> <img src="<?php echo $hall2list['thumb']; ?>"/></a>
				<!--  超链接-->
				<?php }else if($hall2list['recommend_type'] == 4){?>
			  	<a href="<?php echo $hall2list['target_url']; ?>"> <img src="<?php echo $hall2list['thumb']; ?>"/></a>
				<!-- 单条商品 -->
				<?php }else if($hall2list['recommend_type'] == 5){?>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/details','goodsId'=>$hall2list['target_id'],'catId'=>$hall2list['cat_id']]);?>"> <img src="<?php echo $hall2list['thumb']; ?>"/> </a>
				<!-- 商品列表 -->
				<?php }else if($hall2list['recommend_type'] == 6){?>
			  	<a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/goodslist','cat_id'=>$hall2list['target_id']]);?>"> <img src="<?php echo $hall2list['thumb']; ?>"/></a>
				<!-- 分类列表 -->
				<?php }else if($hall2list['recommend_type'] == 7){?>
			  	<a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/goodscat']);?>"> <img src="<?php echo $hall2list['thumb']; ?>"/></a>
				<!-- 订单列表 -->
				<?php }else if($hall2list['recommend_type'] == 8){?>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['user/dianpuorder']);?>"> <img src="<?php echo $hall2list['thumb']; ?>"/></a>
				<!-- 购物车 -->
				<?php }else if($hall2list['recommend_type'] == 9){?>
				  	<a href="<?php echo \Yii::$app->urlManager->createUrl(['car/car']);?>"> <img src="<?php echo $hall2list['thumb']; ?>"/></a>
				<?php }?>


	  		
	  		<?php }}?>
	  	</ul> 
	 </div>
	 
	 
	 <!--大的广告区域-->
     <div class="cl_center_1">
		<ul>
			<!-- 秒杀活动 -->
		<?php if(!empty($ban_list)){ foreach ($ban_list as $key => $banlist) { ?>
				<?php if($banlist['recommend_type'] == 1){ ?>
			  	<a href="<?php echo \Yii::$app->urlManager->createUrl(['help/miaosha','activityId'=>$actlist['target_id']]);?>">
					<img src="<?php echo $banlist['thumb'];?>" alt="" />
				</a>
				<!-- 爆款 -->
				<?php }else if($banlist['recommend_type'] == 2){ ?>
				
			  	<a href="<?php echo \Yii::$app->urlManager->createUrl(['help/baokuan','activityId'=>$actlist['target_id']]);?>">
					<img src="<?php echo $banlist['thumb'];?>" alt="" />
				</a>
				<!-- 单条分类 -->
				<?php }else if($banlist['recommend_type'] == 3){?>
			  	<a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/goodslist','cat_id'=>$banlist['target_id']]);?>">
					<img src="<?php echo $banlist['thumb'];?>" alt="" />
				</a>
				<!--  超链接-->
				<?php }else if($banlist['recommend_type'] == 4){?>
				<a href="<?php echo $banlist['target_url'];?>">
					<img src="<?php echo $banlist['thumb'];?>" alt="" />
				</a> 
				<!-- 单条商品 -->
				<?php }else if($banlist['recommend_type'] == 5){?>
				
			  	<a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/details','goodsId'=>$banlist['target_id'],"catId"=>$banlist['cat_id']]);?>">
					<img src="<?php echo $banlist['thumb'];?>" alt="" />
				</a>
				<!-- 商品列表 -->
				<?php }else if($banlist['recommend_type'] == 6){?>
			  	<a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/goodslist','cat_id'=>$banlist['target_id']]);?>">
					<img src="<?php echo $banlist['thumb'];?>" alt="" />
				</a>
				<!-- 分类列表 -->
				<?php }else if($banlist['recommend_type'] == 7){?>
				
			  	<a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/goodscat']);?>">
					<img src="<?php echo $banlist['thumb'];?>" alt="" />
				</a>
				<!-- 订单列表 -->
				<?php }else if($banlist['recommend_type'] == 8){?>
				
			  	<a href="<?php echo \Yii::$app->urlManager->createUrl(['user/dianpuorder']);?>">
					<img src="<?php echo $banlist['thumb'];?>" alt="" />
				</a>
				<!-- 购物车 -->
				<?php }else if($banlist['recommend_type'] == 9){?>
				 <a href="<?php echo \Yii::$app->urlManager->createUrl(['car/car']);?>">
					<img src="<?php echo $banlist['thumb'];?>" alt="" />
				</a>
				<?php }?>
				<!-- foreach结束 -->
				<?php } }?>
			
		</ul>
     </div>  
	  
	  <!--商城首页-商品列表-->
	  <ul class="mallIndex_list">
	  <?php if(!empty($catlist)){ foreach ($catlist as $key => $v) { ?>
		<a href="<?php echo Yii::$app->urlManager->createUrl(['goods/goodslist','cat_id'=>$v['target_id']]);?>">
	  		<img src="<?php echo $v['thumb']?>"/> 
	  	</a>

	  <?php } }?>

	  </ul>
 
	</div>
	
	<footer>
		<ul>
			<li class="nowpage">
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
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
<script>

 
//console.log( storageSwith );
//if( storageSwith == 2 ){
//	$('.android_nav').css('display','none');
//}
var cityname = localStorage.getItem("cityname");
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

<script type="text/javascript">
$(document).ready(function() { 
   $(".main_visual").hover(function(){
		$("#btn_prev,#btn_next").fadeIn()
	},function(){
		$("#btn_prev,#btn_next").fadeOut()
	});
	
	$dragBln = false;
	
	$(".main_image").touchSlider({
		flexible : true,
		speed : 200,
		btn_prev : $("#btn_prev"),
		btn_next : $("#btn_next"),
		paging : $(".flicking_con a"),
		counter : function (e){
			$(".flicking_con a").removeClass("on").eq(e.current-1).addClass("on");
		}
	});
	
	$(".main_image").bind("mousedown", function() {
		$dragBln = false;
	});
	
	$(".main_image").bind("dragstart", function() {
		$dragBln = true;
	});
	
	$(".main_image a").click(function(){
		if($dragBln) {
			return false;
		}
	});
	
	timer = setInterval(function(){
		$("#btn_next").click();
	}, 2000);
	
	$(".main_visual").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(function(){
			$("#btn_next").click();
		},2000);
	});
	
	$(".main_image").bind("touchstart",function(){
		clearInterval(timer);
	}).bind("touchend", function(){
		timer = setInterval(function(){
			$("#btn_next").click();
		}, 2000);
	});
	
	
   //动态总导航
   var shang = 100/( $('.mallIndex_navi a').length );
   $('.mallIndex_navi a').css('width',shang+'%');

	});
	
//var onOff = 1;
//var storageSwith="";
//storageSwith = localStorage.getItem('onOff'); 
//console.log( storageSwith );
//if( storageSwith == null  ){
//	$('.android_nav').css('display','block');
//	$(".cha_img").click(function(){ 
//		 localStorage.setItem('onOff',2);  
//		$('.android_nav').css('display','none');
//	});
//}else{
//	$('.android_nav').css('display','none');
//}; 

</script>

</body>
</html>	
	
	
	
	
	 
