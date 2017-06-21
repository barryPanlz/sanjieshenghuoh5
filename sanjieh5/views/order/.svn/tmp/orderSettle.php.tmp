<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
		<title>商品结算</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/common.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/shopSettle.css" />
		<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	</head>

	<body>
		<header class="order_set">
			<h1>订单结算</h1>
			<a class="u_back" onclick="history.go(-1)" href="#">返回</a>
		</header>
		<div class="main main_art no_footer_main">

			<div class="art_top_box">
				<div class="art_top">
					<img src="<?php echo $pc_style; ?>images/tijiaochenggong.png" alt="">
					<p>订单提交成功，请尽快支付！</p>
				</div>
				<div class="art_mid ord_mid">
					订单提交成功后，请您于<span>15分钟内</span>内完成支付，否则，订单会自动取消。
				</div>
				<div class="art_btm fix">
					<p class="fl">订单号</p>
					<p class="fr" id="store_order_sn"><?php echo $store_order_sn; ?></p>
				</div>


                <!--<div class="art_mid_box">
                    <div class="art_mid_top fix">
                        <p class="fl">应付总额</p>
                        <p class="fr" id="store_order_price">￥<?php echo $store_order_price; ?></p>
                    </div>
                </div>-->


			</div>
			<div class="pay_way">
			    <div class="art_mid_top art_mid_top1 fix">
					<p class="fl">应付总额</p>
					<p class="fr"><?php echo $store_order_price; ?>三界石</p>
				</div>
				<ul class="pay_radio pay_radio1">					        
					<li>
						<input type="radio" name="1" id="zhifubao"/>
						<div>
							<img  class="zifubao" src="<?php echo $pc_style; ?>images/zhifubao.png" alt="" />
						</div>				
					</li>
					<li>
						<input type="radio" name="1" id="weixin"/>
						<div class="">
							<img class="weixin" src="<?php echo $pc_style; ?>images/wechat_payment.png" alt="" />
						</div>					
						<span class="">更快更安全</span>
					</li>
<!--					<li>-->
<!--						<input type="radio" name="1" id="yinlian"/>-->
<!--						<div>-->
<!--							<img  class="yinlian" src="--><?php //echo $pc_style; ?><!--images/yinlianzhifu.png" alt="" />-->
<!--							<i></i>-->
<!--						</div>						-->
<!--						<span>支持网银支付，银行卡快捷支付</span>-->
<!--					</li>-->
				</ul>
			</div>
			
			<div class="art_btm_box order_btm_box">
				<input type="button" value="立即支付" attr_id="<?php echo $store_order_sn; ?>" class="Immediate_payment"/>
			</div>
		</div>
		<script src="<?php echo $pc_style; ?>js/lib/zepto.min.js" type="text/javascript" charset="utf-8"></script>
		<script>
			$(function(){
				$('.pay_radio li input').click(function(){
					$('.pay_radio li div').removeClass('choose');
					$(this).siblings().addClass('choose');
				})				
			})
		</script>
	</body>

</html>

<script>
    $(function() {
        $(".Immediate_payment").click( function(){
            var store_order_sn = $("#store_order_sn").text();
            var store_order_price = $("#store_order_price").text();
            if($('#zhifubao').is(':checked')) {
                var pay_type = '1';
            }else if($('#weixin').is(':checked')){
                var pay_type = '1';
            }

            $.ajax({
                type:'POST',
                data:{store_order_sn: store_order_sn, pay_type: pay_type, store_order_price: store_order_price},
                dataType:'json',
                url:'<?php echo Yii::$app->urlManager->createUrl('order/store_pay');?>',
                success:function(data){
                    if(data.errno==0){
//                        alert(data);
//                        alert(data.error);
                        location.href= "<?php echo Yii::$app->urlManager->createUrl('order/storepay_success');?>?order_no="+store_order_sn;
                    }else{
                        alert(data.error);
                        //	location.href= "<?php echo Yii::$app->urlManager->createUrl('order/pay_fail');?>?order_sn="+$(this).attr("attr_id");
                    }
                }
            });
        });
    })
</script>