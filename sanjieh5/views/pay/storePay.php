<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>充值</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/reset.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/common.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/generalPay.css"/>
		<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<header>
			<h1>充值</h1>
			<a class="u_back" href="javascript:history.go(-1)">返回</a>
		</header>
		
		<div class="main no_footer_main">
			<div class="u_list">
				<ul>
					<li>
						<div><img src="<?php echo $pc_style; ?>images/icon13.png" alt=""></div>
						<h4>账户余额</h4>
						<span><?php echo empty($info->future_currency)?'0':$info->future_currency ?>三界石</span>
					</li>
					<li>
						<div><img src="<?php echo $pc_style; ?>images/icon16.png" alt=""></div>
						<h4>我的身份</h4>
						<span class="u_degree">
                            <?php if(!empty($info->user_type)&&$info->user_type==1){
                                echo '普通会员';
                            }elseif(!empty($info->user_type)&&$info->user_type==2){
                                echo "创业会员";
                            }elseif(!empty($info->user_type)&&$info->user_type==3){
                                echo "店铺";
                            }?></span>
					</li>
					<li>
						<div><img src="<?php echo $pc_style; ?>images/icon19.png" alt=""></div>
						<h4>兑换汇率</h4>
						<span class="end"><?php echo empty($info->feeRate)?'':$info->feeRate; $feerate =  explode(':',$info->feeRate); ?>(<?php echo $feerate[0]; ?>元可充值<?php echo $feerate[1]; ?>三界石)</span>
					</li>
				</ul>
			</div>
			<input type="hidden" value="<?php echo $feerate[0]; ?>" name="rmb" />
			<input type="hidden" value="<?php echo $feerate[1]; ?>" name="wlb" />
            <form action="<?php echo \Yii::$app->urlManager->createUrl(['wechat/makeorder']);?>" method="post" id="formid">
			<div class="input_box">
				<div>&nbsp; 充三界石<input type="text" class="num_b2" name="sanjieprice" onblur="pay_money();" placeholder="输入个数（三界石）"/></div>
				<div>
                    &nbsp; 需要支付<input class="price" id="money" type="text" style="color: red;" placeholder="人民币数额" value="￥0" readonly >
                </div>
                <input type="hidden" value="<?php echo $feerate[0]/$feerate[1]; ?>" name="bili" />
			</div>
			
			<div class="pay_way">
				<h2>支付方式</h2>
				<ul class="">
					<!-- <li>
						<input type="radio" name="pay_type" checked="checked" value="1" />
						<img  class="zifubao" src="<?php echo $pc_style; ?>images/zhifubao.png" alt="" />
					</li -->
				    <li>
						<input type="radio" name="pay_type" checked="checked" value="2"/>
						<img class="weixin" src="<?php echo $pc_style; ?>images/wechat_payment.png" alt="" />
						<span>更快更安全</span>
					</li>
					<!--<li>
						<input type="radio" name="1"/>
						<img  class="yinlian" src="<?php echo $pc_style; ?>images/yinlianzhifu.png" alt="" />
						<span>支持网银支付，银行卡快捷支付</span>
					</li>-->
				</ul>
			</div>
			<input type="hidden" name="pay_order" value="recharge" />
			<div class="sure_pay">
				<input type="button" value="确认充值" onclick="pay()" />
			</div>
            </form>
		</div>
		<div class="error_box">
			<p>请输入大于1的整数金额</p>
	   </div>
		<script src="<?php echo $pc_style; ?>js/lib/jquery-1.7.1.min.js"></script>
        <script src="<?php echo $pc_style; ?>js/lib/common.js"></script>

		<script>
			$(function() {
				$(".num_b2").val("");
				$('.pay-select li input').click(function() {
					$('.pay-select li').children("div").removeClass('abcdf');
					$(this).next("div").addClass('abcdf');
				})
				$('.pay-btn-box').click(function() {
					$('.pay-mark').hide();
				});
			})
//            function pay(){
//               $("#formid").submit();
//
//            }
            //点击按钮修改提交的方法
            // $("input[name='pay_type']").click(function(){
                //支付宝 1  微信  2
                // if($(this).val() == '1'){
                //     var url = '<?php echo \Yii::$app->urlManager->createUrl(['pay/applyrecharge']);?>';
                // }else if($(this).val() == '2'){ 
                    // var url = '<?php echo \Yii::$app->urlManager->createUrl(['wechat/makeorder/']);?>';
                // }
                // $('#formid').attr("action", url);
            // })
            function pay(){
            	if($(".num_b2").val().length==0){
            		alert("请输入金额")
            	}else{
					var sanjieprice =  $(".num_b2").val();
					if(Number(sanjieprice)>"100000"){
						alert("一次最多充值100000");
						return flase;
					}
					if(!validate.isPositiveNum(sanjieprice)){
						alert("错误的充值金额");
						return flase;
					}
					$(".pay-mark").css("display","block")

					$("#formid").submit();
            	}
            }
            $(".num_b2").blur(function(){
                var sanjieprice =  $(".num_b2").attr("value")*<?php echo $feerate[0]/$feerate[1]; ?>;
               parseFloat($(".price").val('￥'+sanjieprice.toFixed(2)));
            })
            function pay_money(){
                //计算需要支付的人民币金额
                $("#money").html(($(".num_b2").val()/$("input[name='wlb']").val())*$("input[name='rmb']").val());
            }

		</script>
	</body>
</html>
