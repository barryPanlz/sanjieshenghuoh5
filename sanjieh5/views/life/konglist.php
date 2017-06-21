<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>团购列表</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/live/tuanlist.css"/>
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	<style>
		.cl_img{
			margin:0 auto;
			width:2.4rem;
			text-align: center;
			position:absolute;
			top:50%;
			left:50%;
			margin-top:-1.8rem;
			margin-left:-1.2rem;
		}
		
		.cl_img .p_1{
			font-size:.24rem;
			color:#282828;
			margin-top:.6rem;
		}
		.cl_img img{
			width:1.74rem;
			height:1.74rem;
		}
		.cl_img .p_2{
			margin-top:.3rem;
			font-size:.22rem;
			color:#848484;
		}
		.sor_bootom{
        	width: 100%;
        	/*height: 0.5rem;*/
        	text-align: center;
        	position: relative;
        	z-index: 111;
        }
        .sor_bootom img{
        	display: inline;
        } 
        .xiala_chi{
        	position: absolute;
        	width: 100%;
        	height: 8.8rem;
        	z-index: -1;
        }
        .cl_img2{
        	width: 100%;
        	height: auto;
        	overflow: hidden;
        	margin-top:1.2rem ;
        }
        .cl_img2 img{
        	width: 100%;
        }
        .guangyiguang{
        	display: block;
		    width: 1.8rem;
		    height: 0.6rem;
		    border: 1px solid #D4D4D4;
		    text-align: center;
		    line-height: 0.6rem;
		    margin: 0.2rem auto;
		    color: #575757;
		    font-size: 0.22rem;
		    border-radius: 2px;
        }
	</style>
</head>
<body>
<div class="screen">
	<header>
		<a class="u_back" href="javascript:window.history.go(-1);">返回</a>
        <form action="<?php echo \Yii::$app->urlManager->createUrl(['life/goodsearch']);?>" method="get" id="formid">
		<div class="u_search_box">
    			<input type="text" name="keyworlds" class="keyworlds" placeholder="搜索关键字">
    			<span class="u_search">搜索</span>
		</div>
        </form>
	</header>
	<div class="main main1" >
		<div class="cl_top">
			<div class="cl_top_div fun_click_color join" attr_type="orderBy" attr="<?php if(!empty($order)&&!empty($by)&&$order=='store_goods_id'){echo $order.'.'.$by;}else{echo 'store_goods_id.desc';} ?>">
				<span id="">
					综合
				</span>
				<a>
					<img src="<?php echo $pc_style; ?>images/<?php if(!empty($order)&&!empty($by)&&$order.'.'.$by=="store_goods_id.desc"){echo "up-green";}else{echo "up";}?>.png"/>
					<img src="<?php echo $pc_style; ?>images/<?php if(!empty($order)&&!empty($by)&&$order.'.'.$by=="store_goods_id.asc"){echo "down_green";}else{echo "down";}?>.png"/>
				</a>
			</div>
            <div class="cl_top_div fun_click_color join" attr_type="orderBy" attr="<?php if(!empty($order)&&!empty($by)&&$order=='promote_price'){echo $order.'.'.$by;}else{echo 'promote_price.desc';} ?>">
				<span id="">
					价格
				</span>
				<a>
					<img src="<?php echo $pc_style; ?>images/<?php if(!empty($order)&&!empty($by)&&$order.'.'.$by=="promote_price.desc"){echo "up-green";}else{echo "up";}?>.png"/>
					<img src="<?php echo $pc_style; ?>images/<?php if(!empty($order)&&!empty($by)&&$order.'.'.$by=="promote_price.asc"){echo "down_green";}else{echo "down";}?>.png"/>
				</a>
			</div>
			<!-- 2016-11-20 辛未注 <div class="cl_top_div fun_click_color join" attr_type="orderBy" attr="goods_sales">
				<span id="">
					兑换值
				</span>
			</div>-->
			<div class="cl_top_div fun_click_color join" attr_type="orderBy" attr="<?php if(!empty($order)&&!empty($by)&&$order=='goods_sales'){echo $order.'.'.$by;}else{echo 'goods_sales.desc';} ?>">
				<span id="">
					兑换量
				</span>
				<a>
					<img src="<?php echo $pc_style; ?>images/<?php if(!empty($order)&&!empty($by)&&$order.'.'.$by=="goods_sales.desc"){echo "up-green";}else{echo "up";}?>.png"/>
					<img src="<?php echo $pc_style; ?>images/<?php if(!empty($order)&&!empty($by)&&$order.'.'.$by=="goods_sales.asc"){echo "down_green";}else{echo "down";}?>.png"/>
				</a>
			</div>
			<div class="cl_top_div fun_click_color join" attr_type="orderBy" attr="<?php if(!empty($order)&&!empty($by)&&$order=='add_time'){echo $order.'.'.$by;}else{echo 'add_time.desc';} ?>">
				<span id="">
					人气
				</span>
				<a>
					<img src="<?php echo $pc_style; ?>images/<?php if(!empty($order)&&!empty($by)&&$order.'.'.$by=="add_time.desc"){echo "up-green";}else{echo "up";}?>.png"/>
					<img src="<?php echo $pc_style; ?>images/<?php if(!empty($order)&&!empty($by)&&$order.'.'.$by=="add_time.asc"){echo "down_green";}else{echo "down";}?>.png"/>
				</a>
			</div>
		</div>
		<!-- 2016-11-20 辛未注 <div class="cl_top" id="funTab">
			<div class="cl_top_div">
				<p class="cl_top_div_p">
					<span id="">
						品牌
					</span>
					<img src="<?php echo $pc_style; ?>images/down.png"/>
				</p>
			</div>
			<div class="cl_top_div">
				<p class="cl_top_div_p">
					<span id="">
						人民币
					</span>
					<img src="<?php echo $pc_style; ?>images/down.png"/>
				</p>
			</div>
			<div class="cl_top_div">
				<p class="cl_top_div_p">
					<span id="">
						尺寸
					</span>
					<img src="<?php echo $pc_style; ?>images/down.png"/>
				</p>
			</div>
			<div class="cl_top_div">
				<p class="cl_top_div_p">
					<span id="">
						规格
					</span>
					<img src="<?php echo $pc_style; ?>images/down.png"/>
				</p>
			</div>
			<ul class="cl_top_ul">
				<li class="ajax_add">
					<a href="">全部</a>
					<a href="">0-599</a>
					<a href="">600-999</a>
					<a href="">1000-1499</a>
					<a href="">1500-1999</a>
					<a href="">2000-2999</a>
					<a href="">3000-3999</a>
					<a href="">4000-4999</a>
					<a href="">5000以上</a>
				</li>
				<li>
					<button>重置</button>
					<button>确定</button>
				</li>
			</ul>
		</div>-->
		<div class="cl_center" style="top: 0.8rem;">
			<!--<div class="sk_center_ul_wrap">
               
			</div>-->
			
			<!--<div class="cl_img">
				<img src="<?php echo $pc_style; ?>images/kongkong.png" alt="" />		
				<p class="p_1">没有搜索结果</p>		
				<p class="p_2">没有找到相关的宝贝</p>
			</div>	-->
			<div class="cl_img2">
				<img src="<?php echo $pc_style; ?>images/jiqingqidai.jpg"/>
			<!-- 	<a class="guangyiguang" href="<?php //echo \Yii::$app->urlManager->createUrl(['life/goodslist',"catId"=>'18']);?>">查看已上架商品</a> -->
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
<script src="<?php echo $pc_style; ?>js/lib/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>
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

	
        $(".u_search").click( function(){
        	var keyworlds = $(".keyworlds").val();
        	if(keyworlds == ''){
        		return false;
        	}
        	
            $("#formid").submit();
        })

</script>
</body>
</html>
