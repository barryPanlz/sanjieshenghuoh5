<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>商品结算</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/common.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/shopSettle.css" />
		<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo $pc_style; ?>js/lib/jquery-1.7.1.min.js"></script>
	</head>

	<body>
		<header>
			<h1>订单结算</h1>
			<a class="u_back" href="<?php echo \Yii::$app->urlManager->createUrl(['user/usercenter']);?>">返回</a>
		</header>
		<div class="main main_art no_footer_main">

			<div class="art_top_box">
				<div class="art_top">
					<img src="<?php echo $pc_style; ?>images/icon_checkbox_red.png" alt="">
					<p>订单提交成功，请尽快支付！</p>
				</div>
				<div class="art_mid">
					订单提交成功后，请您于<span>15分钟</span>内完成支付，否则，订单会自动取消。
				</div>
				<div class="art_btm fix">
					<p class="fl">立即支付</p>
					<p class="fr"><?php echo $get['order_sn']; ?></p>
				</div>
			</div>
			<div class="art_mid_box">
				<div class="art_mid_top fix">
					<p class="fl">应付总额</p>
					<p class="fr"><?php echo $get['money']; ?>三界石</p>
				</div>
				<div class="art_mid_mid">
					支付方式
				</div>
				<div class="art_mid_btm">
					<p class="fl">账户余额<span><?php echo !empty($money)?$money['future_currency']:"0.00"; ?>三界石</span></p>
					<a class="fr" href="<?php echo Yii::$app->urlManager->createUrl('pay/centerpay');?>">马上充值</a>
				</div>
			</div>
			<div class="art_btm_box">
				<input type="button" value="立即支付" attr_id="<?php echo $get['order_sn']; ?>" class="Immediate_payment"/>
			</div>
		</div>

	</body>

</html>
<script>
    $(function() {
        $(".Immediate_payment").click( function(){
            $.ajax({
                type:'POST',
                data:'order_sn='+$(this).attr("attr_id"),
                dataType:'json',
                url:'<?php echo Yii::$app->urlManager->createUrl('order/pay_logic');?>',
                success:function(data){
                    if(data.errno==0){
                    	alert(data.error);
                        location.href= "<?php echo Yii::$app->urlManager->createUrl('order/pay_success');?>?order_amount="+data.data.order_amount+"&pay_time="+data.data.pay_time+"&order_no="+data.data.order_no;
                  	}
                  //   }else if(data.errno==1){
                		// alert("您已支付，请查看订单");
                		// location.href="<?php echo Yii::$app->urlManager->createUrl('user/shoporder');?>";
                  //   	}
                    else{
                        alert(data.error);
                        //	location.href= "<?php echo Yii::$app->urlManager->createUrl('order/pay_fail');?>?order_sn="+$(this).attr("attr_id");
                    }
                }
            });
        });
    })
</script>