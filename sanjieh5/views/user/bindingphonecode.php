<?php
    use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>判断手机验证码</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/bindphone.css">
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="screen">
	<header>
		<h1>绑定手机</h1>
		<a class="u_back" href="javascript:history.go(-1)">返回</a>
	</header>
	<div class="main no_footer_main">
	  
	  <div class="phone_phone">
	  	请输入手机收到的短信验证码
	  </div>
	  
	  <div class="code_input">
	  	<span> <img src="<?php echo $pc_style; ?>images/Check-code.png"/> </span>
	  	<input type="number" name="" id="vcode" placeholder="请输入手机验证码"/>
	  	<input type="hidden" id="phone" value="<?php echo $_GET['phone'];?>">
	  </div>
	  
	  <div class="code_auth">
	  	获取验证码 
	  </div>
	  
	   <div class="code_auth_1"> 
	  	 重新获取( <span>60</span> s) 
	  </div>
	  
	  
	  <div class="u_button code_button"><input type="button" id="btn" value="确认修改"></div>
	 
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
	//获取验证码
	$(".code_auth").click(function(){
        var phone = $("#phone").val();
        $(".code_auth").attr('disabled','true');
        $.ajax({
            url:"<?php echo Yii::$app->urlManager->createUrl(['user/phone']);?>",
            data:{phone:phone},
            type:"POST",
            dataType:"json",
            success:function(obj){
                if(obj.errorCode == 0){ 
			        $('.code_auth').hide();
			        $('.code_auth_1').show();
			        $(".code_auth_1").attr('disabled','true'); 
			        //验证码倒计时
				    function tesSetIn(){
				        var total=60;
				        var timer = setInterval(function(){
				            if(total == 0) {
				                $('.code_auth').show();
				                $('.code_auth_1').hide();
				                $('.code_auth').removeAttr("disabled"); 
				                $('.code_auth_1').removeAttr("disabled"); 
				                clearInterval(timer);//如果程序在上一行出现错误，这一行代码就无法执行 
				            }
				            $(".code_auth_1 span").html(total);
				            total--;
				        },1000);
				    };
				    tesSetIn();
                    // location.href="<?php echo Yii::$app->urlManager->createUrl(['user/bindingphonecode']);?>?phone="+phone;
		                    $("#btn").click(function(){
					        var vcode = $("#vcode").val();
					        var phone = $("#phone").val();
					        if( vcode == '' ){
					        	alert('验证码不能为空');
					        	return false;
					        };
					        if(  $('.code_auth').css('display') == 'block' ){
					        	alert('请重新获取验证码');
					        	return false;
					        };
						        $.ajax({
						            url:"<?php echo Yii::$app->urlManager->createUrl(['user/phone1']);?>",
						            data:{vcode:vcode,phone:phone},
						            type:"POST",
						            dataType:"json",
						            success:function(obj){
						                if(obj.errorCode == 0){
						                    alert('绑定成功!');
						                    var phone = obj.data.phone;
						                    sessionStorage.setItem("phone", phone);
						                      location.href="<?php echo Yii::$app->urlManager->createUrl(['user/safecenter']);?>";
						                }else if(obj.errorCode == -13){
						                	alert('：验证码输入不匹配！');
						                }else if(obj.errorCode == -15){
						                	alert('参数错误-为空或格式错误');
						                }else if(obj.errorCode == -20){
						                	alert('手机号已被其他用户绑定!');
						                }else if(obj.errorCode == -32){
						                	alert('手机号格式不正确!');
						                }else if(obj.errorCode == -34){
						                	alert('网络繁忙，请稍候重试!');
						                }else if(obj.errorCode == -49){
						                	alert('绑定手机号失败!');
						                }else if(obj.errorCode == -99){
						                	alert('您已绑定手机号，不能重复绑定!');
						                }
						            },
						            error:function(){
						                alert("网络异常");
						            }
						        })
					    })
                }else if(obj.errorCode == -14){
                	alert('验证码发送失败，请检查手机号是否正确！');
                }else if(obj.errorCode == -15){
                	alert('参数错误-为空或格式错误');
                }else if(obj.errorCode == -99){
                	alert('您已绑定手机号，不能重复绑定!');
                }else if(obj.errorCode == -34){
                	alert('网络繁忙，请稍候重试!');
                }
            },
            error:function(){
                alert("网络异常!");
            }
        })
    })
	//绑定手机号
	// $("#btn").click(function(){
 //        var vcode = $("#vcode").val();
 //        var phone = $("#phone").val();
        
 //        $.ajax({
 //            url:"<?php echo Yii::$app->urlManager->createUrl(['user/bindingphonecode']);?>",
 //            data:{vcode:vcode,phone:phone},
 //            type:"POST",
 //            dataType:"json",
 //            success:function(obj){
 //                if(obj.errorCode == 0){
 //                    alert('绑定成功!');
 //                    location.href="<?php echo Yii::$app->urlManager->createUrl(['user/safecenter']);?>";
 //                }else if(obj.errorCode == -13){
 //                	alert('：验证码输入不匹配！');
 //                }else if(obj.errorCode == -15){
 //                	alert('参数错误-为空或格式错误');
 //                }else if(obj.errorCode == -20){
 //                	alert('手机号已被其他用户绑定!');
 //                }else if(obj.errorCode == -32){
 //                	alert('手机号格式不正确!');
 //                }else if(obj.errorCode == -34){
 //                	alert('网络繁忙，请稍候重试!');
 //                }else if(obj.errorCode == -49){
 //                	alert('绑定手机号失败!');
 //                }
 //            },
 //            error:function(){
 //                alert("网络异常");
 //            }
 //        })
 //    })
	
	
	
	
	
	
</script>
</body>
</html>