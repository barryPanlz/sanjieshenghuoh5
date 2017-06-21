<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>注册</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/form.css">
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="screen">
	<header>
		<h1>注册</h1>
		<a class="u_back"  href="javascript:history.go(-1);">返回</a>
	</header>
	<div class="main no_footer_main white_main" style=''>
		<div class="logo">
			<img src="../../resources/images/logo.png">
		</div>
		<form action="" method="post" onSubmit="return beforeSubmit(this);">
			<ul class="regist_box">
				<li>
					<input type="number" placeholder="输入手机号" onblur="check_tel();" id="mobile_phone1" name="account" autocomplete="off">
				</li>

				<li>
					<input class="code_text" type="text" placeholder="输入短信验证码"  name="vcode"  id="Veri1" autocomplete="off">
					<button class="code" id="sendcode" attr="0">获取验证码</button>
				</li>
				<li>
					<input type="password" placeholder="输入6-16个字符（包含大小写字母、数字或符号等）"  name="password" id="newPSd1" autocomplete="off">
				</li>
				<li>
					<input type="password" placeholder="再次输入密码"  name="confirmPassword" id="rePsd1" autocomplete="off">
				</li>
				<li>
					<input class="code_text" type="text" placeholder="输入邀请码"  name="parent_usercode" id="syscode" value="<?php echo $usercode; ?>" <?php if(!empty($usercode)){echo 'readonly="true"','style="background:#ece9e9"';}?>  >
					<div class="code code_share">
						<!--<p>没有邀请码？</p>
						<a href="invitationregist">点击获得邀请码</a>-->
					</div>
				</li>
			</ul>
			<div class="agree">
				<label for="u_checkbox">
					<input class="choose_default" id="u_checkbox"  type="checkbox" checked="checked">我同意
					 <a href="<?php echo Yii::$app->urlManager->createUrl('index/registration');?>">《三界生活用户注册协议》</a></label>
			</div>
		</form>
		<div class="u_button regist_button"><input type="button" value="注册" id="btn"/></div>
		<p class="go_login">已有帐号?<a href="<?php echo Yii::$app->urlManager->createUrl('index/login');?>">马上登录</a></p>
		<p class="version">三界商城v1.0</p>
	</div>
	<!--这里是验证错误时的弹出框-->
    <div class="error_tip">手机号码格式不正确</div>
	<!--这里是注册成功时的弹出框-->
<!--	<div class="success_box">-->
<!--		<img src="--><?php //echo $pc_style; ?><!--images/icon23.png" alt="">-->
<!--		<p>恭喜注册成功</p>-->
<!--	</div>	-->
    <div class="success_box">
        <img src="<?php echo $pc_style; ?>images/icon23.png" alt="">
        <p>恭喜注册成功</p>
    </div>
</div>
<div class="">
    	
    </div>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
<script>
	//判断是否为推荐进来的
	var InvitationCode="";
	InvitationCode=sessionStorage.getItem("InvitationCode");
	console.log(InvitationCode)
	if(InvitationCode){
		$("#syscode").val(InvitationCode);
	}
	
	
	
	
	
    //验证手机号
    function check_tel() {
        var phone = $("#mobile_phone1").val();
        var flag = false;
        var myreg = /^0?(13|15|17|18|14|19)[0-9]{9}$/;
        if (phone == '') {
            alertmessage("手机号码不能为空");
//          $("#btn").attr("disabled", "disabled");
            return false;
        } else if (phone.length != 11) {
            alertmessage("请输入有效的手机号码");
//          $("#btn").attr("disabled", "disabled");
            return false;
        } else if (!myreg.test(phone)) {
            alertmessage("手机号格式不正确");
//          $("#btn").attr("disabled", "disabled");
            return false;
        } else {
//          $("#btn").removeAttr("disabled");
            return true;
        }
    }
   	//验证验证码
   	function validataCode(){
   		var code= $('.code_text').val();
   		console.log(code);
   		var reg =/^[0-9]{6}$/;
   		if(code==""){
   		    alertmessage("请输入验证码");
   		    return false;
   		}else if(!reg.test(code)){
   			alertmessage("请输入正确验证码");
   			return false;
   		}
   		return true;
   	}   	
    //验证邀请码
    function yaoqingma(){
    	if($('#syscode').val().length!=6){
    		 alertmessage("请输入6位邀请码");
    		 return false;
    	}else{
    		 return true;
    	}
    }
    //验证密码 
    function password1(){
    	var passwordVal = $("#newPSd1").val();
        var num = 0;
        var number = 0 ;
        var letter = 0 ;
        var bigLetter = 0 ;
        var chars = 0 ;
        if (passwordVal== "") {
            alertmessage("密码不能为空");
            return false;
        }
        if (passwordVal.search(/[0-9]/) != -1) {
            num += 1;
            number =1;
        }
        if (passwordVal.search(/[A-Z]/) != -1) {
            num += 1;
            bigLetter = 1 ;
        }
        if (passwordVal.search(/[a-z]/) != -1) {
            num += 1;
            letter = 1 ;
        }
        if (passwordVal.search(/[^A-Za-z0-9]/) != -1) {
            num += 1;
            chars = 1 ;
        }
        if (num >= 2 && (passwordVal.length >= 6 && passwordVal.length <= 16)) {
            $("#btn").removeAttr("disabled");
        }else if(passwordVal.length < 6){
            alertmessage("密码不能少于6个字符");
        }else if(passwordVal.length > 16){
        	 alertmessage("密码不能超过16个字符");
        }

    }
    //密码验证
    $("#newPSd1").blur(function(){
     password1();
    });
    //验证确认密码
    $("#rePsd1").blur(function(){
       repassword();
    });
    function repassword(){
    	var passwordVal = $("#newPSd1").val();
        var rePsd1 = $("#rePsd1").val();
        if(rePsd1==''){
        	alertmessage("确认密码不能为空");
        	return false;
        }else if(rePsd1!=passwordVal){
            alertmessage("两次输入的密码不一致");
            return false;
        }else{
            $("#btn").removeAttr("disabled");
            return true;
        }
    }

    //发送验证码
    $("#sendcode").click(function(){
        if(check_tel()==false){
            return false;
        }
        $("#sendcode").attr("disabled","disabled");
        $("#sendcode").css("background","#dedede");
        
        var mobile_phone1 = $('#mobile_phone1').val();
        $(this).attr('attr','1');
        $.ajax({
            url:"sendvcode",
            data:{'mobile_phone1':mobile_phone1},
            type:'post',
            success:function(obj){
            	$("#btn").removeAttr("disabled");
                $("#sendcode").css("background","#c0bfbf");
                if(obj == 1){
                    alertmessage("发送成功");
                    tesSetIn();
                }else{
                    alertmessage("发送失败");
                }
            },
            error:function(){
            	 alertmessage("网络繁忙，请稍后重试");
            	 $("#sendcode").removeAttr("disabled");
            	 $("#sendcode").css("background","#c0bfbf");
            }
        });
    });
    
 
    //验证码倒计时
    function tesSetIn(){
        var total=60;
        var timer = setInterval(function(){
            if(total == 0) {
                total="重新发送";
                $("#sendcode").removeAttr("disabled");
                $("#sendcode").css("background","");
                clearInterval(timer);//如果程序在上一行出现错误，这一行代码就无法执行
            }else if(total> 0){
                $("#sendcode").attr("disabled","disabled");
                 $("#sendcode").css("background","");
            }
            $("#sendcode").html(total);
            total--;
        },1000);
    }
    
    //注册
    $("#btn").click(function(){
    	check_tel();
    	validataCode();
    	password1();
    	repassword();
    	yaoqingma();
        var account = $('#mobile_phone1').val();
        var vcode = $('#Veri1').val();
        var password = $('#newPSd1').val();
        var confirmPassword = $('#rePsd1').val();
        var parent_usercode = $('#syscode').val();
        if(account==''||vcode==''||password==''||confirmPassword==''||parent_usercode==''){
            alertmessage("信息填写不完整！");
            return false;
        }
        if($('#u_checkbox').is(':checked')) {
        	$("#btn").attr("disabled","disabled");
        	$("#btn").css("background","#dedede");
            $.ajax({
                url: "<?php echo Yii::$app->urlManager->createUrl('index/register');?>",
                type: 'post',
                data: {
                    'account': account,
                    'vcode': vcode,
                    'password': password,
                    'confirmPassword': confirmPassword,
                    'parent_usercode': parent_usercode
                },
                dataType: 'json',
                success: function (data) {
                    $("#btn").removeAttr("disabled");
                    $("#btn").css("background","#f01c1b")
                    if (data.errorCode == 0) {
                        if(!$('.success_box').is(":animated")){
                            $('.success_box').show(100, function() {
                                $('.success_box').animate({
                                    opacity: 1
                                },1000, function() {
                                    window.setTimeout(function(){
                                    	 window.location = "<?php echo Yii::$app->urlManager->createUrl('index/login');?>" //跳转到商城首页
                                    }, 1500)
                                });
                            });
                        }
                    } else if (data.errorCode == -20) {
                        alertmessage1("已经注册过了");
                    } else if (data.errorCode == -15) {
                        alertmessage("手机号码输入错误");
                    } else if (data.errorCode == -34) {
                        alertmessage("网络繁忙，请稍候重试！");
                    } else if (data.errorCode == -35) {
                        alertmessage("推介人不存在");
                    } else if (data.errorCode == -37) {
                        alertmessage("验证码错误");
                    } else if (data.errorCode == -38) {
                        alertmessage("验证码已失效，请重新获取");
                    } else if (data.errorCode == -46) {
                        alertmessage("推介人没有推介权限");
                    } else if (data.errorCode == -47) {
                        alertmessage("注册失败");
                    } else if(data.errorCode == -60){
                        alertmessage("该邀请码暂不可用，请输入其它邀请码!");
                    }
                },
                error:function(){
                	 alertmessage("网络繁忙，请稍候重试！");
                	 $("#btn").removeAttr("disabled");
                	 $("#btn").css("background","#f01c1b")
                }
            });
        }else{
            alertmessage("请查看三界用户协议！");
             $("#btn").removeAttr("disabled");
             $("#btn").css("background","#f01c1b")
            return false;
        }

    });
    $('#syscode').blur(function(){
    	yaoqingma();
    })
    function alertmessage(html){
         if(!$('.error_tip').is(":animated")){
            $('.error_tip').show(100, function() {
                $('.error_tip').html(html);//这里输入要提示的内容
                $('.error_tip').animate({
                    opacity: 1
                },1000, function() {
                    window.setTimeout(function(){
                        $('.error_tip').animate({
                                opacity: 0
                            },
                            1000, function() {
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
                },1000, function() {
                    window.setTimeout(function(){
                        $('.error_tip').animate({
                                opacity: 0
                            },
                            1000, function() {
                                window.location = "<?php echo Yii::$app->urlManager->createUrl('index/login');?>" //跳转到商城首页
                            });
                    }, 2000)
                });
            });
        }
    }

</script>
</body>
</html>