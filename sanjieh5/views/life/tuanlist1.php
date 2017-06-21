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
</head>
<body>
<div class="screen">
	<header>
		<a class="u_back" href="javascript:window.history.go(-1);">返回</a>
        <form action="<?php echo \Yii::$app->urlManager->createUrl(['life/goodslist']);?>" method="post" id="formid">
		<div class="u_search_box">
    			<input type="text" name="keywords" placeholder="搜索关键字">
			    <input type="hidden" name="catId" value="18">
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
		<div class="cl_center" style="top: 0.5rem;">
			<div class="sk_center_ul_wrap">
                <?php if(!empty($storelist)){ foreach($storelist as $k=>$v){ ?>
				<li>
					<a href="<?php echo Yii::$app->urlManager->createUrl(['life/goodsdetails','id'=>$v->store_id]);?>">
						<img src="<?php echo empty($v->goods_img)?$pc_style.'img/pic404.png':$pic_host.$v->goods_img;?>"/>
						<div class="li_right">
							<p class="cont_title">
								<?php echo empty($v->goods_name)?'':$v->goods_name ?> 
							</p>
							<p class="cont_content">
								<?php echo empty($v->store_name)?'':$v->store_name ?>
							</p>
							<p class="cont_mony">
								<span>
									￥
								</span>
								<span><?php echo empty($v->promote_price)?'':$v->promote_price ?></span>
							</p>
							<p class="cont_bott">
								<em>
									<span id="">
										门店价
									</span>
									<del>
										￥<i><?php echo empty($v->shop_price)?'':$v->shop_price ?></i>
									</del>
								</em>
								<b>
									<span>
										已售
									</span>
									<span><?php echo empty($v->goods_sales)?'':$v->goods_sales ?></span>
								</b>
							</p>
						</div>
					</a>
				</li>
                <?php }}?>
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

	$(function(){
	   $(".join").click(function(){
            var val = $(this).attr("attr");
            alert(val);
            return false;
            var url = self.location.href;
    		if(url.indexOf($(this).attr("attr_type")+"=")>0){
                var re=eval('/(&'+$(this).attr("attr_type")+'\\=)([^\"]*)\/gi');
                var new_url = url.replace(re,"&"+$(this).attr("attr_type")+'='+val);
                window.location.href = new_url;
            }else{
                window.location.href = url+"&"+$(this).attr("attr_type")+"="+val;
            }
        })
		/*fastclick解决移动端点击延迟的问题*/
		/** if ('addEventListener' in document) {
		    document.addEventListener('DOMContentLoaded', function() {
		        FastClick.attach(document.body);
		    }, false);
		}
		//tab切换
		$("#funTab").find(".cl_top_div").click(function(){
			$(".cl_top_ul").css("display","block");
			$(this).find("p").addClass("fun_cl_tab");
			$(this).siblings().find("p").removeClass("fun_cl_tab");
			$(this).find("img").attr("src","<?php echo $pc_style; ?>images/up.png");
			$(this).siblings().find("img").attr("src","<?php echo $pc_style; ?>images/down.png");
		})
		$(".fun_top_div").click(function(){
			$("#funTab").find(".cl_top_div").siblings().find("p").removeClass("fun_cl_tab");
			$("#funTab").find(".cl_top_div").siblings().find("img").attr("src","<?php echo $pc_style; ?>images/down.png");
		})
		$(".fun_click_color").click(function(){
			$(this).addClass("cl_click_color");
			$(this).siblings().removeClass("cl_click_color");
			$(this).siblings().find("img").eq(1).attr("src","<?php echo $pc_style; ?>images/up.png");
			$(this).siblings().find("img").eq(2).attr("src","<?php echo $pc_style; ?>images/down.png");
		})
//		jQuery切换
		$(".fun_click_color").toggle(
			function(){
				$(this).find("img").eq(0).attr("src","<?php echo $pc_style; ?>images/up.png");
				$(this).find("img").eq(1).attr("src","<?php echo $pc_style; ?>images/down_green.png");
				
			},
			function(){
				$(this).find("img").eq(0).attr("src","<?php echo $pc_style; ?>images/up-green.png");
				$(this).find("img").eq(1).attr("src","<?php echo $pc_style; ?>images/down.png");
			}
		)
		//冒泡
		
		$(".cl_top_ul").click(function(){
			$(".cl_top_ul").css("display","none");
			$(".cl_top_ul").css("display","none");
			$("#funTab").find(".cl_top_div").find("p").removeClass("fun_cl_tab");
			$("#funTab").find(".cl_top_div").find("img").attr("src","<?php echo $pc_style; ?>images/down.png");
		})
		$(".cl_top_ul").find("a").click(function(){
			return false;
		}) **/
        $(".u_search").click( function(){
             $("#formid").submit();
        })
})
</script>
</body>
</html>