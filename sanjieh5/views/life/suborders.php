<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>提交订单</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/live/suborder.css"/>
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="screen">
		<header>
			<h1>提交订单</h1>
			<a class="u_back" href="javascript:history.go(-1);">返回</a>
		</header>

	<div class="main">
		<div class="sub_top">
			<ul class="sub_top_left">
				<li>
					<img src="<?php echo $pc_style; ?>images/user.png"/>
					<span>
						<?php echo !empty($user_details->user_name)?$user_details->user_name:$user_details->mobile_phone; ?>
					</span>
				</li>
				<li>
					<img src="<?php echo $pc_style; ?>images/tel.png"/>
					<span>
						<?php echo !empty($user_details->mobile_phone)?$user_details->mobile_phone:""; ?>
						<input type="hidden" id="is_hot" value="<?php echo $goods_info['is_hot']; ?>">
					</span>
				</li>
                <input type="hidden" name="usercode" value="<?php echo !empty($user_details->usercode)?$user_details->usercode:""; ?>" />
                <input type="hidden" name="goodsImg" value="<?php echo $goods_info['goods_img']; ?>">
                <input type="hidden" name="goodsName" value="<?php echo $goods_info['goods_name']; ?>">

			</ul>
		</div>
		<div class="sub_center">
			<ul>
				<li>
                        <input type="hidden" name="store_id" value="<?php echo $goods_info['store_id']; ?>" />
                        <input type="hidden" name="store_goods_id" value="<?php echo $goods_info['store_goods_id']; ?>" />
                        <input type="hidden" name="cat_id" value="<?php echo $goods_info['cat_id']; ?>" />
					    <a href="<?php echo Yii::$app->urlManager->createUrl(['life/goodsdetails','id'=>$goods_info['store_goods_id']]); ?>">
    						<div class="sub_li_left">
    							<img src="<?php echo $pic_host.$goods_info['goods_img']; ?>"/>
    						</div>
    						
				    	</a>
						<div class="sub_li_right">
							<p><a href="<?php echo Yii::$app->urlManager->createUrl(['life/goodsdetails','id'=>$goods_info['store_goods_id']]); ?>"><?php echo $goods_info['goods_name']; ?></a></p>
							<p><!-- 有效期截止到 2017.04.30（周末、法定节假日通用） --></p>
							<?php if($goods_info['is_hot']==1){ ?>
								<p>
								<b><i><?php if($goods_info['is_hot']==1){echo '三界石：';}else{echo '￥';}?></i><i class="shopPrice"><?php echo $goods_info['promote_price']; ?></i></b>
								<em class="jiajian" style="border:none">
									<input type="number" name="num" class="onub" readonly="readonly" value="1" />
								</em>
								</p>
							<?php }else{ ?>
								<p>
									<b><i><?php if($goods_info['is_hot']==1){echo '三界石：';}else{echo '￥';}?></i><i class="shopPrice"><?php echo $goods_info['shop_price']; ?></i></b>
									<em class="jiajian">
										<span class="oper jia_up" title="减一">-</span>
									 	<input type="number" name="num" class="onub" readonly="readonly" value="1" />
									 	<span class=".oper jian_next" title="加一">+</span>
									</em>
								</p>
							<?php }?>
						</div>
				</li>
				<div class="peisong_wrap">
					<div class="peisong">
						<div class="heji">
							<span>共</span><i id="shopNub">1</i><span>商品，合计：</span><i><?php if($goods_info['is_hot']==1){echo '三界石：';}else{echo '￥';}?></i><i class="shopAllMonye"><?php echo $goods_info['promote_price']; ?></i>
						</div>
					</div>
					
				</div>
			</ul>
			<!-- <div class="shiyongguize">
				<div class="shiy_top">
					使用规则
				</div>
				<ul class="ul">
					<p>1、有效期：2016-11-23之日起即可。</p>
					<p>2、温馨提示：如需发票，请您在消费时向商家咨询，为了保障您的三界石可以准时到账，建议使用APP的实体店消费付款功能进行支付，感谢您的理解和支持！</p>
					<p>3、预约信息：无需预约，如遇消费高峰时段您可能需要排队。</p>
					<p>3、预约信息：无需预约，如遇消费高峰时段您可能需要排队。</p>
					<p>4、商家服务：提供免费WiFi。</p>
					<p>5、规则提醒：需到店自提，不再与其他优惠同享。</p>
					
				</ul>
			</div> -->
		</div>
		
	</div>
	<footer>
		<div class="dingdananniu">
			<div class="dingdan_heji">
				<span>合计：</span>
				<i><?php if($goods_info['is_hot']==1){echo '三界石：';}else{echo '￥';}?></i>
				<i class="shopAllMonye"><?php echo $goods_info['promote_price']; ?></i>
			</div>
			<a id="found_order" class="dingdan_queding">
				提交订单
			</a>
		</div>
	</footer>
</div>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
<script>
$(document).ready(function() {
	/*fastclick解决移动端点击延迟的问题*/
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	}
	$('#found_order').click(function(){
		    var is_hot = $("#is_hot").val();
            var store_goods_id = $("input[name='store_goods_id']").val();
            var cat_id = $("input[name='cat_id']").val();
            var store_id = $("input[name='store_id']").val();
            var num = $("input[name='num']").val();
            var userCode = $("input[name='usercode']").val();
            var goodsImg = $("input[name='goodsImg']").val();
            var goodsName = $("input[name='goodsName']").val();
            var postscript = "0";
            var storeGoodsPrice = "0";
            var orderAmount  = "0";
            var orderStatus  = "0";
            var orderCode  = "0";
            $.ajax({
                type:'POST',
                data:'storeGoodsId='+store_goods_id+'&userCode='+userCode+'&cat_id='+cat_id+'&storeId='+store_id+'&goodsNum='+num+'&postscript='+postscript+'&storeGoodsPrice='+storeGoodsPrice+'&orderAmount='+orderAmount+'&orderStatus='+orderStatus+'&orderCode='+orderCode+'&goodsImg='+goodsImg+'&goodsName='+goodsName+'&is_hot='+is_hot,
                dataType:'json',
                url:"<?php echo Yii::$app->urlManager->createUrl('life/submitorder');?>",
                success:function(data){
                     if(data.errno==0){
						if(data.is_hot == 1){
							 location.href= "<?php echo Yii::$app->urlManager->createUrl('life/storesettle');?>?order_sn="+data.data+"&money="+data.storeorderAmount;
						 }else{
		    					location.href= "<?php echo Yii::$app->urlManager->createUrl('life/pay_order');?>?order_sn="+data.data;
						 }
                     }else{
                        alert(data.error);
                     }
                },
            });
    })
	
	//加减
	var oNub=1;
	$(".jia_up").click(function(){	

		$(this).parent(".jiajian").find(".oper").css("color","#282828");
		oNub=$(this).parent(".jiajian").find(".onub").val();	
		var shopAllMoney=$(".shopAllMonye").eq(0).text();

		oNub--;	

		if(oNub<1){
			oNub=1;
			$(this).parent(".jiajian").find(".jia_up").css("color","#999999");
			var shopAllmonye=parseFloat(0);
			var hejiNub=$(".shopAllMonye").eq(0).text();
			var allNub=parseFloat(hejiNub)+parseInt(shopAllmonye);
			var allNub=parseFloat(hejiNub)+parseInt(shopAllmonye);
			$(".shopAllMonye").text(allNub);
		}else{
			var shopmony=$(this).parents("li").find(".shopPrice").text();
			var shopAllmonye=parseFloat(-shopmony);
			var hejiNub=$(".shopAllMonye").eq(0).text();
			var allNub=parseFloat(hejiNub)+parseInt(shopAllmonye);
		}
			
			$(this).parent(".jiajian").find(".onub").val(oNub);
			$(".shopAllMonye").text(allNub);
			$("#shopNub").text($(".onub").val());
			return false;
	});
	$(".jian_next").click(function(){
		$(this).parent(".jiajian").find(".oper").css("color","#282828");
		oNub=$(this).parent(".jiajian").find(".onub").val();	
		oNub++;	
		$(this).parent(".jiajian").find(".onub").val(oNub);
		
		var shopmony=$(this).parents("li").find(".shopPrice").text();
		var shopAllmonye=parseFloat(shopmony);
		var hejiNub=$(".shopAllMonye").eq(0).text();
		var allNub=parseFloat(hejiNub)+parseInt(shopAllmonye);
		$(this).parent(".jiajian").find(".onub").val(oNub);
		$(".shopAllMonye").text(allNub);
		$("#shopNub").text($(".onub").val());
		return false;
	});
$(document).ready(function(){
	var subCenter=$(".sub_center").find("li");
	var shopNub=0;
	var shopAllMoney=0;
  $.each(subCenter, function(m) { 
  	shopNub++;
  	console.log($(this).find(".shopPrice").text()) ;
  	var shopMoney=parseFloat($(this).find(".shopPrice").text()*$(this).find(".onub").val());
  	console.log(shopMoney);
  	shopAllMoney+=shopMoney;
  });
  $("#shopNub").text(shopNub);
  $(".shopAllMonye").text(shopAllMoney);
});
 
 



	
});


</script>
</body>
</html>