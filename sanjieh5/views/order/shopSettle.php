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
		<header class="order_set"  style="background: #f3001e;">
			<h1>订单结算</h1>
			<a class="u_back" href="javascript:history.go(-1);">返回</a>
		</header>
		<div class="main main_art no_footer_main">

			<div class="art_top_box">
				<div class="art_top">
					<img src="<?php echo $pc_style; ?>images/icon_checkbox_red.png" alt="">
					<p>订单提交成功，请尽快支付！</p>
				</div>
				<div class="art_mid ord_mid">
					订单提交成功后，请您于<span style="color: #f3001e;">15分钟</span>内完成支付，否则，订单会自动取消。
				</div>
				<div class="art_btm fix">
					<p class="fl">订单号</p>
					<p class="fr" id="store_order_sn"><?php echo $get['order_sn']; ?></p>
				</div>
			</div>
			
            <form action="<?php echo \Yii::$app->urlManager->createUrl(['wechat/makeorder']);?>" method="post" id="formid">
            <input type="hidden" id="_csrf" name="<?php echo Yii::$app->request->csrfParam;?>" value="<?php echo yii::$app->request->csrfToken?>">
            <input type="hidden" name="store_order_sn" value="<?php echo $get['order_sn']; ?>" />
            <input type="hidden" name="pay_order" value="shopon" />
			<div class="pay_way">
				
				 <div class="art_mid_top art_mid_top1 fix">
					<p class="fl">应付总额</p>
					<p class="fr">￥<?php echo $get['money']; ?></p>
				</div>
				<ul class="pay_radio pay_radio1">
					<!--<li>
						<input type="radio" name="pay_type" value="1" />
						<div>
							<img  class="zifubao" src="<?php echo $pc_style; ?>images/zhifubao.png" alt="" />
						</div>				
					</li>-->
					<li>
						<input type="radio" name="pay_type"  value="2"/>
						<div class="">
							<img class="weixin" src="<?php echo $pc_style; ?>images/wechat_payment.png" alt="" />				
						</div>					
						<span class="">更快更安全</span>
					</li>
					<!--<li>
						<input type="radio" name="1"/>
						<div>
							<img  class="yinlian" src="<?php echo $pc_style; ?>images/yinlianzhifu.png" alt="" />
							<i></i>
						</div>						
						<span>支持网银支付，银行卡快捷支付</span>
					</li>-->
				</ul>
			</div>
			<input type="hidden" id="isPromote" value="<?php echo $_GET['isPromote'];?>">

			
			
			<div class="art_btm_box order_btm_box">
				<input type="button" id="logic" value="立即支付" attr_id="<?php echo $get['order_sn']; ?>"   style="background: #f3001e;"/>
			</div>
            </form>
		</div>
		<script src="<?php echo $pc_style; ?>js/lib/zepto.min.js" type="text/javascript" charset="utf-8"></script>
		<script>

			$(function(){
				$('.pay_radio li input').click(function(){
					$('.pay_radio li div').removeClass('choose');
					$(this).siblings().addClass('choose');
				})
                //点击按钮修改提交的方法
                // $("input[name='pay_type']").click(function(){
                //     //支付宝 1  微信  2
                //     if($(this).val() == '1'){
                //         var url = '<?php echo \Yii::$app->urlManager->createUrl(['life/pay_logic']);?>';
                //         $('#formid').attr("action", url);
                //     }else if($(this).val() == '2'){
                //         var url = '<?php echo \Yii::$app->urlManager->createUrl(['wechat/makeorder/']);?>';
                //     //else结束
                //     }
                //     $('#formid').attr("action", url);
                // })


                $("#logic").click(function(){
                	var isPromote = $("#isPromote").val();
	        	   	if(isPromote == '2'){
	        	   		//支付宝支付
	        	   		var pay_type = $("input[name='pay_type']:checked").val();
	                     if(typeof(pay_type)=='undefined'){
	                        alert("您还没有选择支付方式！");return false;
	                     }
	                     $("#formid").submit();
	        	   	}else{
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
			                    else{
			                        alert(data.error);
			                    }
			                }
			            });
	                }

                     
                })			
			})
		</script>
	</body>

</html>