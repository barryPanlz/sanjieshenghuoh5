<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
		<title> 绑定提现账号</title>
		<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
		<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/withdrawal.css" />
		<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script> 
	</head>
	<body>
		<div class="screen">
			<header>
				<h1> 提现账户 </h1>
				<a class="u_back" href="<?php echo \Yii::$app->urlManager->createUrl(['supplier/safecenter'])?>">返回</a>
			</header> 
			
			<div class="main no_footer_main">
			<!--绑定提现账号方式-->
            <div class="supplier_withdrawal_style bind_withdrawal_style"> 
               <!-- <h5 class="supplier_withdrawal_style_h5"> 提现账号 </h5>-->
                <li class="supplier_withdrawal_style_li">
                   <!-- <img src="<?php //echo $pc_style; ?>images/icon_radio_red.png" />-->
                    <span> 支付宝 </span>
                    <input type="text" name="revbankaccno" id="alipay_account" value="<?php echo empty($acclist->data->withdrawalAcc->alipay_account) ? "" : $acclist->data->withdrawalAcc->alipay_account ;?>" class="wi_input_right" style="margin-left: 0;" placeholder="请输入本人的支付宝账号"/>
                </li>
                
                
                <li><input type="text" name="revbankaccno" id="alipay_user_name" value="<?php echo empty($acclist->data->withdrawalAcc->alipay_user_name) ? "" : $acclist->data->withdrawalAcc->alipay_user_name ;?>" class="wi_input_right wi_input_right2" placeholder="请输入本人的支付宝名字"/>
                </li>
                
                <li>
                   <!-- <img src="<?php echo $pc_style; ?>images/icon_checkbox.png" />-->
                    <span> 微信 </span>
                    <input type="text" name="revbankaccno" id="wechat_account" value="<?php echo empty($acclist->data->withdrawalAcc->wechat_account) ? "" : $acclist->data->withdrawalAcc->wechat_account ;?>" class="wi_input_right" style="margin-left: 0;" placeholder="请输入本人的微信账号"/>
                </li>
                
                <li>
                    <!--<img src="<?php echo $pc_style; ?>images/icon_checkbox.png" />-->
                    <span> 银行卡</span>
                    <select name="revorgname" class="wi_input_left" id="bank_name">
                        <option value="">请选择</option>
                        <?php if(!empty($bancklist->data->bankList)){
                            foreach($bancklist->data->bankList as $re){ ?>
                                <option value="<?php echo $re ;?>" <?php if(!empty($acclist->data->withdrawalAcc->bank_name)){
                                    if($acclist->data->withdrawalAcc->bank_name == $re){
                                        echo "selected = 'selected'";
                                    }
                                } ?>><?php echo $re?></option>
                            <?php } } ?>
                    </select>
                </li>

                <li><input type="text" name="bank_address" id="bank_address" value="<?php echo empty($acclist->data->withdrawalAcc->bank_address) ? "" : $acclist->data->withdrawalAcc->bank_address ;?>" class="wi_input_right" placeholder="输入开户支行的名称"/></li>
                <li><input type="text" name="name"  id="bank_account" value="<?php echo empty($acclist->data->withdrawalAcc->bank_account) ? "" : $acclist->data->withdrawalAcc->bank_account ;?>" class="wi_input_right" placeholder="输入您本人的银行卡号"/></li>
                <li><input type="text" name="bank_user_name" id="bank_user_name" value="<?php echo empty($acclist->data->withdrawalAcc->bank_user_name) ? "" : $acclist->data->withdrawalAcc->bank_user_name ;?>" class="wi_input_right" placeholder="输入持卡人姓名"/></li>
            </div>
             
		    <div class="u_button  btn_save" style="margin-bottom: 1rem;"><input type="button" value="保存" id="submit"></div>
		    
		    
		    <!--保存成功提示框-->
		    <div class="save_success">
		    	 <img src="<?php echo $pc_style; ?>images/icon23.png" />
		    	 <p> 保存成功 </p>
		    </div>
          </div>
		</div>
          
		<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script> 
		<script>
		
           //延时器
		  function delayer(){
		  	window.setTimeout(function(){
		  		$('.save_success').css('display','none');
		  	},1000);
		  } ;   
		
		
            $('#submit').click(function ()  {
                var alipay_account = $('#alipay_account').val();
                var alipay_user_name = $('#alipay_user_name').val();
                if(alipay_user_name !== '' && alipay_account == ''){
                    alert('请输入支付宝账号');
                    return false;
                }
                var wechat_account = $('#wechat_account').val();
                var bank_name = $('#bank_name').val();
                var bank_address = $('#bank_address').val();
                var bank_account = $('#bank_account') .val();
                var bank_user_name = $('#bank_user_name').val();

                $.ajax({
                    url:"<?php echo \Yii::$app->urlManager->createUrl(['supplier/drawal'])?>",
                    type:'post',
                    dataType:'json',
                    data:{alipay_account:alipay_account,wechat_account:wechat_account,bank_name:bank_name,bank_address:bank_address,bank_account:bank_account,bank_user_name:bank_user_name,alipay_user_name:alipay_user_name},
                    success:function (data)  {
                        if(data.errorCode == 0){
                            //alert(data.message);
                            $('.save_success').css('display','block');
                            delayer();
                            location.href="<?php echo \Yii::$app->urlManager->createUrl(['supplier/safecenter']);?>";
                        }else{
                            alert(data.message);
                            //history.go();
                        }

                    },
                    error:function ()  {
                        alert('网络繁忙，请稍后重试！')
                    }
                });
            })





            //验证银行卡号
            //验证银行卡号
            function card() {
                var kahao = $("#kahao").val();
                // var flag = false;
                var reg = /^\d{16}|\d{19}$/;
                if (kahao == '') {
                    alert("卡号不能为空");
                    $("#acOrder").attr("disabled", "disabled");
                    return false;
                }  else if ( !reg.test(kahao)) {
                    alert("银行卡号错误");
                    $("#acOrder").attr("disabled", "disabled");
                    return false;
                } else {
                    $("#acOrder").removeAttr("disabled");
                    return true;
                }
            }
            
            $("#kahao").blur(function(){
               card();
            });

           
			//	选择银行还是支付宝支付
//			$('.supplier_withdrawal_style li').click(function(){
//				$(this).find('img').attr('src','../../resources/images/icon_radio_red.png');
//				$(this).siblings().find('img').attr('src','../../resources/images/icon_checkbox.png');
//			}); 
		</script>
	</body>

</html>