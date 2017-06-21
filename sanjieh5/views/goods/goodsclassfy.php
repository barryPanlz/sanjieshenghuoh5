<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>三界商城-商品分类</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/classfy.css">
	<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/rem.js"></script>
</head>
<body>
<div class="screen">
	<header>
		<a class="u_back" onclick="history.go(-1)">返回</a>
<form action="<?php echo \Yii::$app->urlManager->createUrl(['goods/search']);?>" method="get">
		<div class="u_search_box">
			<input type="text" class="kuang" name="keyworlds" placeholder="搜索关键字">
			<input type="submit" class="suoSou" id="" >
		</div>
</form>
		<!-- <div class="u_search_box">
			<input type="text" placeholder="搜索关键字">
			<span class="u_search">搜索</span>
		</div> -->
	</header>
	<div class="main">
		<div class="classfy_top">全部分类</div>
		<section>
			<div class="classfy_list">
				<ul class="classfy_left">
				<?php foreach ($goodslist as $key => $v) { ?>
				    <input type="hidden" class="cat_id" value="<?php echo $v['cat_id']; ?>" id="catid_<?=$key+1; ?>" />
					<li class="now_choose"><a href="<?php echo Yii::$app->urlManager->createUrl(['goods/goodscat','parent_id'=>$v['cat_id']]);?>" id="cat_id"><?php echo $v['cat_name'];?></a></li>
				<?php }?>
					
					
				</ul>
				<div class="classfy_right">
					<div class="advert_box">
						<img src="<?php echo $pc_style; ?>images/img18.png" alt="">
						<img src="<?php echo $pc_style; ?>images/img19.png" alt="">
						<img src="<?php echo $pc_style; ?>images/img20.png" alt="">
					</div>
					<div class="classfy_in">
						<ul id="cate">
                           <?php if(!empty($catlist)){ foreach($catlist as $v){ ?>
							<li><a href="<?php echo Yii::$app->urlManager->createUrl(['goods/goodslist','cat_id'=>$v['cat_id']]);?>"><?php echo empty($v['cat_name'])?'':$v['cat_name']; ?></a></li>
                            <?php }}?>
						</ul>
					</div>
				</div>
			</div>
		</section>
	</div>
	<footer>
		<ul>
			<li class="nowpage">
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['index/index']);?>">
					<div><img src="<?php echo $pc_style; ?>images/shouye-xuanzhong.png" alt=""></div>
					<p>三界商城</p>
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


	/*fastclick解决移动端点击延迟的问题*/
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	}
//	$('.classfy_left li').click(function(event) {
//		$(this).addClass('now_choose').siblings('li').removeClass('now_choose');
//	});


</script>
</body>
</html>