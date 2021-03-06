<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title><?php echo empty($goodsinfo->goodsName)?'':$goodsinfo->goodsName;?>--三界生活商城-积分商城|区块链商城</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/common.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/shopDetails.css" />
		<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php echo $pc_style; ?>js/lib/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php echo $pc_style; ?>js/lib/jquery.touchSlider.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php echo $pc_style; ?>js/lib/jquery.event.drag-1.5.min.js" type="text/javascript" charset="utf-8"></script>
	</head>

	<body>
		<header>
            <a class="u_back" href="javascript:history.go(-1);">返回</a>
			<h1>商品详情</h1>
			<!-- <a class="u_info u_search" href="<?php //echo \Yii::$app->urlManager->createUrl(['merchant/index']);?>"></a> -->
		</header>
		<div class="main main_art">
			<div class="main_visual">
				<!--<div class="flicking_con">
					<a href="#" class="on">1</a>-->
					<!-- <a href="#">2</a> -->
<!--					<a href="#">3</a>-->
<!--					<a href="#">4</a>-->
<!--					<a href="#">5</a>-->
<!--					<a href="#">6</a>-->
<!--					<a href="#">7</a>-->
<!--					<a href="#">8</a>-->
<!--					<a href="#">9</a>-->
					<!--<span>/1</span>
				</div>-->
				<div class="main_image">
					<ul>
						<li><img src="<?php echo $pic_host.$goodsinfo->goodsImg; ?>" alt="" /></li>
					</ul>
				</div>
			</div>

			<div class="d_info">
				<div class="d_top_box">
					<div class="d_top">
						<p><?php echo empty($goodsinfo->goodsName)?'':$goodsinfo->goodsName;?></p>
					</div>
					<div class="d_mid">
						<div class="d_mid_top">
							<span class="s t"><?php echo empty($goodsinfo->goodsPrice)?'0.00':$goodsinfo->goodsPrice ?></span>
							<span class="s b">三界石</span>
<!--							<span class="vip">创业会员</span>-->
						</div>
						<div class="d_mid_mid">
							<p class="one">已兑换 <span><?php echo empty($goodsinfo->goodsSales)?"0":$goodsinfo->goodsSales;?></span></p>
							<p class="two">运费 <span>0.00</span></p>
							<!--<p class="three">杭州</p>-->
						</div>
					</div>
					<div class="d_btm">
						<!-- <div class="d_btm_top"> -->
							<!--<p class="fl">商品编码:<span><?php //echo empty($goodsinfo->goodsSn)?'暂无':$goodsinfo->goodsSn; ?></span></p>
							<p class="fr">供应商:<span><?php //echo empty($goodsinfo->goodsSn)?'暂无':$goodsinfo->goodsSn; ?></span></p>-->
						<!-- </div> -->
						<!-- <div class="d_btm_mid">
						<?php if($goodsinfo->isPromote == 1){ ?>
							<p>促销：<span>仅限本地</span></p>
						<?php	}else{ ?>
							<p>促销：<span>包邮</span></p>
						<?php	}?>
						</div> -->
					</div>
				</div>
			</div>
			<div class="d_tit">
				<h3>商品详情</h3>
<!--				<img src="--><?php //echo $pc_style; ?><!--images/shangpinxiangqing.png" alt="" />-->
	             <p><?php echo empty($goodsinfo->goodsDesc)?'':$goodsinfo->goodsDesc ?></p>
			</div>
		</div>
		<footer>
			<div class="fl">
                    <a href="<?php echo \Yii::$app->urlManager->createUrl(['index/index']);?>">
                        <img src="<?php echo $pc_style; ?>images/shouye-ct.png" alt="" />
                    </a>
                    <a href="<?php echo \Yii::$app->urlManager->createUrl(['car/car']);?>">
                        <img src="<?php echo $pc_style; ?>images/gouwuche-ct.png" alt="" />
                    </a>
<input <?php if($goodsinfo->isPromote == 1){ echo 'disabled="disabled" style="background: #dddddd;"';} ?>  class="add_cart" type="button" value="加入购物车" />
<input class="buy_now" type="button"  attr_goodsid="<?php echo empty($goodsinfo->goodsId)?'0':$goodsinfo->goodsId; ?>" value="立即购买" />

			</div>
		</footer>

		<div class="mark">
			<div class="opc">
			</div>
		</div>
		<div class="c_box" height="100px;">
		<!-- 商品规格便利开始 -->
		<div class="gui_ge">
		
	        <?php if(!empty($arr)){ foreach ($arr as $k=>$value){ ?>
				<div class="color_box">
					<h3 data-1="<?php echo $k ?>"><?php echo $tag["$k"]['attr_name']?></h3>
					<ul class="color_kind">
					<?php foreach ($value as $item) { ?>
						<li><?php echo $item ?></li>
						<!-- <li class="c_3">红色</li> -->
					<?php } ?>
					<input type="hidden" value="" class="state aaaa" name="state[]">
					<input type="hidden" value="" class="state aaaa" name="skuValue[]">
					</ul>
					
				</div>
			<?php } }?>	
		
		<!-- 商品规格便利结束 -->
				<div class="num_box">
					<p class="fl">数量</p>
					<?php if($goodsinfo->isPromote == '1' ){ ?>
						<p class="fr" style="border:none">
							<input type="number" class="d_numVal" value="1" id="onub"  readonly="readonly"/>
						</p>
					<?php }else{ ?>
						<p class="fr">
							<span class="d_subtract">-</span>
							<input type="number" class="d_numVal" value="1" id="onub"  readonly="readonly"/>
							<span class="d_add">+</span>
						</p>
					<?php }?>
				</div>
			</div>
			<!-- <div class='c_chu'>
				<p>库存<span>1180</span>件</p>
			</div> -->
			<div class="sure" attr_goodsid="<?php echo empty($goodsinfo->goodsId)?'0':$goodsinfo->goodsId; ?>">
				确定
			</div>
		</div>
		<input type="hidden" id="user_type" value="<?php echo Yii::$app->session->get('user_type'); ?>"/>
		<!--购物成后-->
		<div class="succ">
			<div class="succ_box">
				<img src="<?php echo $pc_style; ?>images/chenggong.png" alt="" />
				<p>加入购物车成功</p>
			</div>
		</div>

		<script>
	
		</script>
	</body>

</html>
<script type="text/javascript">
		//商品属性选项卡
		// for( var i = 0; i < $('.gui_ge ul').length; i++){
		// 	$('.color_kind').eq(i).find('li').eq(0).addClass('c_3'); 
		// }; 
		$(function(){
            var a = "";
			for( var i = 0; i < $('.gui_ge ul').length; i++){
				$('.color_kind').eq(i).find('li').eq(0).addClass('c_3'); 
                a = $('.color_box').eq(i).find('h3').html() +':' + $('.color_kind').eq(i).find('li').eq(0).html()+';';
                var j = $('.gui_ge ul').length - 1;
                b = $('.color_kind').eq(i).find('li').eq(0).html()+',';
                // if( i == j ) {
                // 	 b = $('.color_kind').eq(j).find('li').eq(0).html();
                // }else{
                // 	 b = $('.color_kind').eq(i).find('li').eq(0).html()+',';
                // }
	           $('.color_kind').eq(i).find('input').eq(0).val(a);
	           $('.color_kind').eq(i).find('input').eq(1).val(b);
			};
		}); 
        
		$('.color_kind li').click(function(){
			var a = "";
			$(this).addClass('c_3').siblings().removeClass('c_3');
            a += $(this).parents(".color_kind").siblings().html()+':';
            a += $(this).html()+';';
            $(this).parents(".color_kind").find('input').eq(0).val(a);
            $('.gui_ge ul').each(function(i){
              var j = $('.gui_ge ul').length - 1;
              b = $('.color_kind').eq(i).find('.c_3').html()+',';
	            // if( i == j ) {
	            // 	 b = $('.color_kind').eq(j).find('.c_3').html();
	            // }else{
	            // 	 b = $('.color_kind').eq(i).find('.c_3').html()+',';
	            // }
	            $('.color_kind').eq(i).find('input').eq(1).val(b);
            }) 
             
            // for( var i = 0; i < $('.gui_ge ul').length; i++){
	        	
            // };
		})

	$(document).ready(function() {
		var li_h = $('.main_image ul li').lenght;
		if(li_h>1){
			$(".main_image").touchSlider({
				flexible: true,
				speed: 300,
				btn_prev: $("#btn_prev"),
				btn_next: $("#btn_next"),
				paging: $(".flicking_con a"),
				counter: function(e) {
					$(".main_visual .flicking_con a").removeClass("on").eq(e.current - 1).addClass("on");
				}
			});
		}
		
		
        //遮罩选择区
//    	$('.add_cart,.buy_now').click(function() {
//			$('.mark,.c_box').show();
//		})
//		//加入购物车
        $('.add_cart').click(function() {
            $('.mark,.c_box').show();
            $('.sure').click(function() {
	            //存当前页面cookie
	            $('.mark,.c_box').hide();
	            //隐藏遮罩层
	            //var num = $("#onub").val();
	            //调用加入购物车接口
	            // if($(this).attr('attr_goodsid')=='0'){
	            //     alert("系统错误！");
	            // }
	            //商品属性开始
	            var attrs = "";
	            var xx = "";
	            $("input[name='state[]']").each(function() {
	                attrs += this.value;
	                if(($(this).val()) == ''){
	                    xx = "12";
	                    return false;
	                }
	            });
	            if(xx == "12"){
	            	alert("请选择商品属性！");
	                return false;
	            }
			    var num = $("#onub").val();
				if($(this).attr('attr_goodsid')=='0'){
					alert("系统错误！");
				}
				//商品属性结束
				//加入购物车新增参数skuValue开始
	            var skuValue = "";
	            var aa = "";
	            $("input[name='skuValue[]']").each(function() {
	                skuValue += this.value;
	                if(($(this).val()) == ''){
	                    aa = "12";
	                    return false;
	                }
	            });
	            if(aa == "12"){
	            	alert("请选择商品属性！");
	                return false;
	            }
			    var num = $("#onub").val();
				if($(this).attr('attr_goodsid')=='0'){
					alert("系统错误！");
				}
				skuValue = skuValue.substring(0,skuValue.length-1);
				
				//加入购物车新增参数skuValue结束
				// alert(skuValue);
				// return false;

	            var sku_id ='0';
	            <?php if (empty(Yii::$app->session->get('sessionid'))){ ?>
	                location.href= "<?php echo Yii::$app->urlManager->createUrl('index/login');?>";
	            <?php }elseif(Yii::$app->session->get('user_type') == 3){ ?>
	                alert("店铺会员，不可以购买"); return false;
	            <?php  } ?>
	            $.ajax({
	                type:'POST',
	                data:'num='+num+'&goods_id='+$(this).attr('attr_goodsid')+'&sku_id='+attrs+'&skuValue='+skuValue,
	                // data:'num='+num+'&goods_id='+$(this).attr('attr_goodsid')+'&sku_id='+sku_id,
	                dataType:'json',
	                url:"<?php echo Yii::$app->urlManager->createUrl('car/addcar');?>",
	                success:function(data){
	                    if(data.errno==0){
	                        //显示添加成功
	                        $('.succ').show();
	                        location.href= "<?php echo Yii::$app->urlManager->createUrl('car/car');?>";
	                    }else if(data.errno==2){
	                        alert(data.error);
	                        location.href= "<?php echo Yii::$app->urlManager->createUrl('index/login');?>";
	                    }else{
	                        alert(data.error);
	                    }
	                }
	            });
			})



        })
		
        
        
		// $('.rule_kind li').click(function(){
		// 	$(this).addClass('c_3').siblings().removeClass('c_3')
		// })
		
		//数字加减
		var numVal = '';
		$('.d_subtract').bind("click",function(){	
			numVal=$('.d_numVal').val();
            numVal--;
			if(numVal>0){
				$('.d_numVal').val(numVal);	
			}		
			$(this).addClass('c28').siblings('span').removeClass('c28');
		})
		$('.d_add').click(function(){
			numVal=$('.d_numVal').val();
			numVal ++;
			$('.d_numVal').val(numVal);	
		    $(this).addClass('c28').siblings('span').removeClass('c28');
		})
	});
	//立即购买
    $(".buy_now").click(function(){
    	$('.mark,.c_box').show();
    	$('.sure').click(function() {
	    	// var user_type = $("#user_type").val();
	    	// alert(user_type);
	    	// return false;
	    	// if(user_type == 1 || user_type == 2 || user_type == ''){
	    		//存当前url
	            var buynowurl = self.location.href;
	            document.cookie = "url="+buynowurl+";path=/";
	//            location.href = "<?php //echo Yii::$app->urlManager->createUrl('user/useraddresslist');?>//";
	//            alert(buynowurl);
	//        return false;
	        var num = $("#onub").val();
	        var goods_id = $(this).attr('attr_goodsid');
	        //商品属性开始
	            var attrs = "";
	            var xx = "";
	            $("input[name='state[]']").each(function() {
	                attrs += this.value;
	                if(($(this).val()) == ''){
	                    xx = "12";
	                    return false;
	                }
	            });
	            if(xx == "12"){
	            	alert("请选择商品属性！");
	                return false;
	            }
			    var num = $("#onub").val();
				if($(this).attr('attr_goodsid')=='0'){
					alert("系统错误！");
				}
				//商品属性结束
				//加入购物车新增参数skuValue开始
	            var skuValue = "";
	            var aa = "";
	            $("input[name='skuValue[]']").each(function() {
	                skuValue += this.value;
	                if(($(this).val()) == ''){
	                    aa = "12";
	                    return false;
	                }
	            });
	            if(aa == "12"){
	            	alert("请选择商品属性！");
	                return false;
	            }
			    var num = $("#onub").val();
				if($(this).attr('attr_goodsid')=='0'){
					alert("系统错误！");
				}
				//加入购物车新增参数skuValue结束
				// alert(skuValue);
				// return false;
				<?php if (empty(Yii::$app->session->get('sessionid'))){ ?>
                location.href= "<?php echo Yii::$app->urlManager->createUrl('login/login');?>";
                <?php }elseif(Yii::$app->session->get('user_type') == 3){ ?>
                alert("店铺会员，不可以购买"); return false;
                <?php  }else if(Yii::$app->session->get('user_type') == 4){ ?>
                alert("供应商会员，不可以购买"); return false;
                <?php }else if(Yii::$app->session->get('user_type') == 5){ ?>
                alert("代理商会员，不可以购买"); return false;
                <?php }?>
                
	        location.href="<?php echo Yii::$app->urlManager->createUrl('order/found_order'); ?>?goods_id="+goods_id+"&num="+num+"&sku_id="+attrs+"&isPromote="+"<?=$isPromote?>"+"&skuValue="+skuValue;
	    	// }else{
	    	// 	alert('抱歉，只有普通、创业会员才能购买商品哦！');
	    	// }
	    })	
            
    });
</script>
