<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>未来商城首页</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	<style type="text/css">
		 .sousuo_wrap{
		 	width: 6.08rem;
		 	height: 0.76rem;
		 	margin-top:0.2rem ;
		 	margin:0.2rem auto 0 ;
		 } 
		 .sousuo_wrap input[type="text"]{
		 	width: 82%;
		 	height: 0.74rem;
		 	border: 1px solid #DEDEDE;
		 	border-radius:0.03rem 0.03rem 0.03rem 0.00rem ;
		 	float: left;
		 	font-size: 0.24rem;
		 	text-indent: 0.3rem;
		 	color: #282828;
		 }
		  .sousuo_wrap input[type="submit"]{
		 	width: 17%;
		 	height: 0.77rem;
		 	border: 1px solid #DEDEDE;
		 	border-left:0 ;
		 	border-radius:0.06rem ;
		 	float: left;
		 	font-size: 0.24rem;
		 	background: red url(<?php echo $pc_style; ?>images/icon8.png) no-repeat  center;
		 	background-size:0.32rem ;
		 }
		 .sousuo_wrap input[type="button"]{
		 	width: 17%;
		 	height: 0.77rem;
		 	border: 1px solid #DEDEDE;
		 	border-left:0 ;
		 	border-radius:0.06rem ;
		 	float: left;
		 	font-size: 0.24rem;
		 	background: red url(<?php echo $pc_style; ?>images/icon8.png) no-repeat  center;
		 	background-size:0.32rem ;
		 }
		 .sk_center_ul_wrap{
			width: 100%;
			height: auto;
			overflow: hidden;
			margin:0.2rem 0;
		}
		.sk_center_ul_wrap li{
			width: 6.0rem;
			min-height: 2rem;
			padding: 0.2rem;
			border-bottom:1px solid #f6f6f6 ;
			background: #FFFFFF;
		}
		.sk_center_ul_wrap li img{
			width: 2rem;
			height: 2rem;
			float: left;
		}
		.sk_center_ul_wrap .li_right{
			width: 3.8rem;
			min-height: 2rem;
			float: left;
			margin-left:0.2rem ;
		}
		.cont_title{
			width: 100%;
			height:0.9rem;
			line-height: 0.46rem;
			font-size: 0.28rem;
			font-weight: 400;
			color: #282828;
			overflow:hidden; 
			text-overflow:ellipsis;
			display:-webkit-box; 
			-webkit-box-orient:vertical;
			-webkit-line-clamp:2; 
		}
		.cont_content{
			width: 100%;
			height: 0.6rem;
			line-height: 0.3rem;
			font-size: 0.16rem;
			color: #848484;
			overflow:hidden; 
			text-overflow:ellipsis;
			display:-webkit-box; 
			-webkit-box-orient:vertical;
			-webkit-line-clamp:2; 
		}
		.cont_mony{
			width: 100%;
			height: 0.4rem;
			padding: 0.1rem 0;
		}
		.cont_mony span{
			color: #F3001D;
			float: left;
		}
		.cont_mony span:nth-of-type(1){
			font-size: 0.2rem;
			margin-top:0.05rem ;
			
		}
		.cont_mony span:nth-of-type(2){
			font-size: 0.3rem;
		}
		.cont_bott{
			width: 100%;
			height: 0.3rem;
			
		}
		.cont_bott em{
			font-style: normal;
			float: left;
			font-size: 0.2rem;
			color: #999999;
		}
		.cont_bott span{
			font-size: 0.2rem;
			color: #999999;
		}
		.cont_bott del{
			font-size: 0.2rem;
			color: #999999;
		}
		.cont_bott i{
			font-style: normal;
			font-size: 0.2rem;
			color: #999999;
		}
		.cont_bott b{
			font-size: 0.2rem;
			float: right;
			font-weight: 400;
		}
		.cont_bott b span{
			color: #999999;
		}
		.empty_list{
			width: 100%;
		}
		.empty_list img{
			display: block;
			width: 1.7rem;
			height: 1.48rem;
			margin: 0 auto;
			margin-top: 1.16rem;
		}
		.empty_list p{
			width: 100%;
			text-align: center;
			font-size: 0.2rem;
			color: #999999;
			margin-top: 0.16rem;
		}
				

	</style>
</head>
<body>
<div class="screen">
	<header>
		<h1>搜索</h1>
		<a class="u_back"  href="<?php echo Yii::$app->urlManager->createUrl(['merchant/mindex']);?>"); ?>">返回</a>
	</header>
	<div class="main">
	<form action="<?php echo \Yii::$app->urlManager->createUrl(['merchant/sousuo']);?>" method="get" id="sousuo">
		<div class="sousuo_wrap">
            <input type="text" name="keyworlds" id="keyworlds" placeholder="搜索关键字">
            <input type="button" id="btn" value=''>
        </div>
    </form>
        <div class="sk_center_ul_wrap">
        <?php if(!empty($storelist)){ foreach ($storelist as $key => $v) { ?>
			<li>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['merchant/goodslist','storeId'=>$v->storeId]); ?>">
					<img src="<?php echo $pic_host.$v->storeImg?>">
					<div class="li_right">
						<p class="cont_title">
							<?php echo $v->storeName; ?>
						</p>
						<!-- <p class="cont_mony">
							<span>
								15
							</span>
							<span>个商品在售</span>
						</p> -->
						<p class="cont_bott">
							<em>
								<?php echo $v->address; ?>
							</em>
						</p>
					</div>
				</a>
			</li>
		<?php } }else{ ?>
			<div class="empty_list">
				<img class="identity_img" src="<?php echo $pc_style; ?>images/shangpinzhanweitu.png"/>
				<p> 抱歉，该页面无内容 </p>
			</div>
		<?php }?>
		</div>
		<!--非空列表-->

		
	</div>
	
	<footer>
		<ul>
			<li>
				<a href="<?php echo Yii::$app->urlManager->createUrl('index/index');?>">
					<div><img src="<?php echo $pc_style; ?>images/shouye-ct.png" alt=""></div>
					<p>三界商城</p>
				</a>				
			</li>
			<li>
				<a class="aaa" attr="ben">
					<div><img src="<?php echo $pc_style; ?>images/weilaishenghuo-ct.png" alt=""></div>
					<p>三界本地<?php echo Yii::$app->request->cookies->getValue('city'); ?></p>
				</a>				
			</li>
			<li class="nowpage">
				<a class="aaa" attr="shang">
					<div><img src="<?php echo $pc_style; ?>images/kefu-xz.png" alt=""></div>
					<p class="active_t">商家</p>
				</a>
			</li>
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
	$("#btn").click(function(){
		var keyworlds = $("#keyworlds").val();
		if(keyworlds == ''){
			return false;
		}
		$("#sousuo").submit();
	})
</script>
</body>
</html>