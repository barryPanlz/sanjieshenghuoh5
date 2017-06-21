<?php
    use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>找回密码</title>
	<link rel="stylesheet" href="<?php echo $pc_style?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style?>css/private/form.css">
	<script src="<?php echo $pc_style?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="screen">
	<header>
		<h1>找回密码</h1>
		<a class="u_back"  href="javascript:history.go(-1);">返回</a>
	</header>
	<div class="main no_footer_main white_main">
		<div class="logo">
			<img src="../../resources/images/logo.png">
		</div>
		<form action="">
			<ul class="regist_box">
				<li>
					<input type="text" placeholder="输入登录账号" onblur="check_tel();" name="phone" id="mobile_phone">
				</li>
				<li>
					<input class="code_text" type="text" placeholder="输入短信验证码">
					<button type="button" id="sendcode" class="code" attr="0">获取验证码</button>
				</li>

				<li>
					<input type="password" placeholder="输入新密码6-16个字符(包含大小写字母、数字符号)" id="newPSd">
				</li>
				<li>
					<input type="password" placeholder="再次输入密码" id="rePsd">
				</li>
			</ul>
		</form>
		<div id="sure" class="u_button regist_button"><input type="button" class="btn1" id="btn1"  attr="0" value="确定"></div>
		<p class="version">三界商城v1.0</p>
	</div>
	<div class="error_tip">手机号码格式不正确</div>
	<div class="success_box">
		<img src="../../resources/images/icon23.png" alt="">
		<p>新密码设置成功</p>
	</div>

</div>
	<!--这里是验证错误时的弹出框-->
    <div class="error_tip">手机号码格式不正确</div>
	<!--这里是注册成功时的弹出框-->
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
<script>

	/*fastclick解决移动端点击延迟的问题*/
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	}
    $(document).ready(function() {
        $("#sendcode").click(function () {
        	if(check_tel()==false){
            return false;
        }
         $("#sendcode").attr("disabled","disabled");
            var phone = $("#mobile_phone").val();
            $.ajax({
                url: "<?php echo Url::toRoute("index/send_vcode");?>",
                data: {phone:phone},
                type:"POST",
                dataType:"json",
                success:function(data){
                    if(data.errorCode ==0) {
                        $("#btn1").removeAttr("disabled");
                        alertmessage("发送成功");
                        tesSetIn();
                    }else if(data.errorCode == -15){
                        alertmessage("参数错误-为空或格式错误");
                    }else if(data.errorCode == -18){
                        alertmessage("您的账号不存在，请重新输入！");

                    }else if(data.errorCode == -24){
                        alertmessage("您的账号未绑定手机号，忘记密码功能无法使用，请重新注册！");
                    }else if(data.errorCode == -34){
                        alertmessage("网络繁忙，请稍候重试");
                    }else if(data.errorCode == -60){
                        alertmessage("目前只有普通会员和创业会员才可以使用忘记密码功能哦！");
                    }else{
                         alertmessage("发送失败");
                         $("#sendcode").removeAttr("disabled");
                         $("#btn1").attr("disabled","disabled");
                    }
                },
                error:function(){
                    alertmessage("网络异常");
                    $("#sendcode").removeAttr("disabled");
//                  $("#btn1").attr("disabled","disabled");
                }
            })
        });
        $("#btn1").click(function(){
        	
            var account = $("#mobile_phone").val();
            var code = $(".code_text").val();
            var password = $("#newPSd").val();
            var rpassword = $("#rePsd").val();
            check_tel();
            validateCode();
            pwdss();
            suremima();
            if( validateCode()&&check_tel()&& pwdss()&&suremima()){
            	$("#btn1").attr("disabled","disabled");
        		$("#btn1").css("background","#dedede;");
            $.ajax({
                url:"<?php echo Url::toRoute("index/findpwd");?>",
                data:{account:account,code:code,password:password,rpassword:rpassword},
                type:"POST",
                dataType:"json",
                success:function(data){
                	$("#btn1").removeAttr("disabled");
//              	$("#btn1").css("background","#f01c1b;");
                	console.log(data);
                    if(data.errorCode == 0){
                        alertmessage1("修改成功,请重新登录");
                    }else if(data.errorCode == -15){
                        alertmessage("参数错误-为空或格式错误");
                    }else if(data.errorCode == -24){
                        alertmessage("您的账号未绑定手机号，忘记密码功能无法使用，请重新注册！");
                    }else if(data.errorCode == -34){
                        alertmessage("网络繁忙，请稍后重试");
                    }else if(data.errorCode == -37){
                        alertmessage("验证码输入不正确！");
                    }else if(data.errorCode == -49){
                        alertmessage("设置密码失败");
                    }else if(data.errorCode == -60){
                        alertmessage("目前只有普通会员和创业会员才可以使用忘记密码功能哦！");
                    }
                },
                error:function(){
                    alertmessage("网络异常");
                    $("#btn1").removeAttr("disabled");
                	$("#btn1").css("background","#f01c1b;");
                }
            })
            }else{
            	
            }
            
        })

       //验证密码
    $("#newPSd").blur(function(){
        pwdss();
    });
    //验证确认密码
    $("#rePsd").blur(function(){
        suremima();
    })

    });
        //验证手机号
    function check_tel() {
        var phone = $("#mobile_phone").val();
        var flag = false;
//        var myreg = /^0?(13|15|17|18|14|19)[0-9]{9}$/;
        if (phone == '') {
            alertmessage("登录账号不能为空");
             $("#btn1").removeAttr("disabled");
             $("#btn1").css("background","#F01C01")
            return false;
//        } else if (phone.length != 11) {
//            alertmessage("请输入有效的手机号码");
//            $("#btn1").attr("disabled", "disabled");
//            return false;
//        } else if (!myreg.test(phone)) {
//            alertmessage("请输入有效的手机号码");
//            $("#btn1").attr("disabled", "disabled");
//            return false;
        } else {
            $("#btn1").removeAttr("disabled");
            return true;
        }
    }

    //验证吗
    function validateCode(){
    	var eCode =$('.code_text').val();
    	if(eCode==''){
    		alertmessage("验证码不能为空");
    		return false;
    	}
    	return true;
    }
    //验证密码
    function pwdss(){
    	var password = $("#newPSd").val();
        var num = 0;
        var number = 0 ;
        var letter = 0 ;
        var bigLetter = 0 ;
        var chars = 0 ;
        if (password== "") {
            alertmessage("密码不能为空");
            return false;
        }
//      if (password.search(/[0-9]/) != -1) {
//          num += 1;
//          number =1;
//           return false;
//      }
//      if (password.search(/[A-Z]/) != -1) {
//          num += 1;
//          bigLetter = 1 ;
//           return false;
//      }
//      if (password.search(/[a-z]/) != -1) {
//          num += 1;
//          letter = 1 ;
//          return false;
//      }
//      if (password.search(/[^A-Za-z0-9]/) != -1) {
//          num += 1;
//          chars = 1 ;
//           return false;
//      }
        else if(password.length < 6 || password.length > 16){
            alertmessage("密码由6-16个字符组成");
             return false;
        }else{
        	return true;
        }
//        else if(num == 1){
//            if(number==1){
//                alertmessage("密码不能为纯数字");
//                $("#btn1").attr("disabled","disabled");
//            }
//            if(letter==1){
//                alertmessage("密码不能为纯字母");
//                $("#btn1").attr("disabled","disabled");
//            }
//            if(bigLetter==1){
//                alertmessage("密码不能为纯字母");
//                $("#btn1").attr("disabled","disabled");
//            }
//            if(chars==1){
//                alertmessage("密码不能为纯字符");
//                $("#btn1").attr("disabled","disabled");
//            }
//        }
    }
    //验证确认密码
    function suremima(){
    	var password = $("#newPSd").val();
        var rePsd1 = $("#rePsd").val();
        if(rePsd1!=password){
            alertmessage("请输入相同的密码");
            return false;
        }else{
            return true;
        }
    }

   function alertmessage(html){
         if(!$('.error_tip').is(":animated")){
            $('.error_tip').show(100, function() {
                $('.error_tip').html(html);//这里输入要提示的内容
                $('.error_tip').animate({
                    opacity: 1
                },100, function() {
                    window.setTimeout(function(){
                        $('.error_tip').animate({
                                opacity: 0
                            },
                            100, function() {
                                $('.error_tip').hide();
                            });
                    }, 2000)
                });
            });
        }
    }
    function alertmessage1(html){
         if(!$('.error_tip').is(":animated")){
            $('.error_tip').show(100, function() {
                $('.error_tip').html(html);//这里输入要提示的内容
                $('.error_tip').animate({
                    opacity: 1
                },100, function() {
                    window.setTimeout(function(){
                        $('.error_tip').animate({
                                opacity: 0
                            },
                            1000, function() {
                               window.location="<?php echo Yii::$app->urlManager->createUrl('index/login');?>";
                            });
                    }, 2000)
                });
            });
        }
    }
        //验证码倒计时
    function tesSetIn(){
        var total=60;
        var timer = setInterval(function(){
            if(total == 0) {
                total="重新发送";
                $("#sendcode").removeAttr("disabled");
                clearInterval(timer);//如果程序在上一行出现错误，这一行代码就无法执行
            }else if(total> 0){
                $("#sendcode").attr("disabled","disabled");
            }
            $("#sendcode").html(total);
            total--;
        },1000);
    }

   // }
</script>
</body>
</html>