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
	<div class="main no_footer_main">
		
		<div class="sk_top">
		<a href="<?php echo \Yii::$app->urlManager->createUrl(['merchant/goodsdesc','storeId'=>$lists->storeId])?>">
			<div class="sk_top_top">
				<img src="<?php echo $pic_host.$lists->storeImg; ?>"/>
				<ul>
				<input type="hidden" id="store_id" value="<?php echo $lists->storeId; ?>">
					<li><?php echo empty($lists->storeName)?" ":$lists->storeName; ?></li>
					<li><span>电话：</span><span><?php echo empty($lists->storePhone)?" ":$lists->storePhone; ?></span></li>
					<li><span>地址：</span><span><?php echo empty($lists->address)?" ":$lists->address; ?></span></li>
				</ul>
			</div>
		</a>
			<div class="sk_top_bot">
				<ul>
					<div class="sousuoi">
						<input type="text" name="" id="keyword" placeholder="请输入商品名称" value="" />
						<img class="sousuo" src="<?php echo $pc_style; ?>images/fangdajingsousuo.png"/>
					</div>
				</ul>
			</div>
		</div>
		<div class="sk_center_wrap">
			<div class="sk_center_head">
				在售商品
			</div>
			<div class="sk_center_ul_wrap">
               <?php if(!empty($salelists)){ foreach($salelists->storeGoodsCanBuyList as $v){ ?>
				<li>
					<a href="<?php echo Yii::$app->urlManager->createUrl(['life/goodsdetails','id'=>$v->store_goods_id,'is_hot'=>$v->is_hot]);?>">
						<img src="<?php echo $pic_host.$v->goods_img;?>"/>
						<div class="li_right">
							<p class="cont_title">
								<?php echo $v->goods_name; ?> 
							</p>
							 <p class="cont_mony">
								<!--<span>
									￥
								</span>
								<span><?php //echo $v->shop_price;?></span>-->
							</p> 
							<p class="cont_bott">
								<em>
									<span id="">
									<?php if($v->is_hot==1){ ?>
										三界石
										<span>
											<i><?php echo $v->promote_price;?></i>
										</span>
									<?php }else{ ?>
										￥
										<span>
											<i><?php echo $v->shop_price;?></i>
										</span>
									<?php }?>
										
									</span>
									
								</em>
								<b>
									<span>
										已售
									</span>
									<b><?php echo $v->goods_sales;?></b>
								</b>
							</p>
						</div>
					</a>
				</li>
				<?php } }?>

			</div>
			
			
			
			
		<!--非空列表-->
		<?php if(empty($salelists->storeGoodsCanBuyList)){ ?>
		<div class="empty_list">
			<img class="identity_img" src="<?php echo $pc_style; ?>images/shangpinzhanweitu.png"/>
			<p> 抱歉，该页面无在售商品 </p>
		</div>
		<?php }?>	
			
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
	//搜索
	$('.sousuo').click(function(){
   		var store_id = $("#store_id").val();
   		var keyword = $("#keyword").val();
   		if(keyword == ''){
   			alert("请输入搜索关键字！");
   			return false;
   		}
   		$.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo Yii::$app->urlManager->createUrl('merchant/goodsearch');?>",
            data: {'store_id': store_id,"keyword": keyword},
            success: function (message) {
            	console.log(message);
                if (message.errno == 2000) {
                    console.log(message.data);
                    var attrobj = "";
                    $.each(message.data,function(k,v){
                    	var alianjie="<?php echo \Yii::$app->urlManager->createUrl(['life/goodsdetails']);?>?id="+v.store_goods_id;
                    	attrobj +='<li>';
                        attrobj += '<a href='+alianjie+'>';
                        attrobj += '<img src='+v.goods_img+' />';
                        attrobj += '<div class="li_right">';
                        attrobj += '<p class="cont_title">'+v.goods_name+'</p >';
						attrobj += '<p class="cont_bott"><em><span id="">￥</span><span><i>'+v.shop_price+'</i></span></em><b><span>已售</span><b>'+v.goods_sales+'</b></b></p>';
                        attrobj += '</div>';
                        attrobj +='</a>';
                        attrobj +='</li>';
                   });
                   $('.sk_center_ul_wrap').html(attrobj);
                } else {
                    alert(message.errmsg);
                }
            },
            error: function(message) {
                alert("网络繁忙！");
            }
        });

   });
</script>
</body>
</html>