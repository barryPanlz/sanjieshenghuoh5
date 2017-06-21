<?php
    use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>登录</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/form.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/slider.css">	
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="screen">
	<header>
		<h1>登录</h1>
		<a class="u_back"  href="javascript:history.go(-1);">返回</a>
	</header>
	<div class="main no_footer_main white_main">
		<div class="logo">
			<img src="../../resources/images/logo.png">
		</div>
		<form action="">
			<ul class="regist_box login_box">
				<li>
					<input type="text" placeholder="输入用户名" name="name" id="Enter_phone" autocomplete="off">
				</li>
				<li>
					<input type="password" placeholder="输入密码" name="password" id="Enter_psd" autocomplete="off">

				</li>
                <li class="Input_box code1" style="display:none">
                    <input type="text" name="co" id="co" placeholder="输入验证码" class="code_text"/>
                    <div class="code">
                        <img id="next" src=""/>
                    </div>
                </li>
                <li class="stage">
					<div class="slider" id="slider">
						<div class="label_b">请向右滑动验证</div>
						<div class="track" id="track">
							<div class="bg-green" id="bg-green">请向右滑动验证</div>
						</div>
						<div class="button" id="btn_b">
							<div class="icon" id="icon"></div>
							<div class="spinner_b">
								<div class="spinner" id="spinner"></div>
							</div>
							
						</div>
					</div>
				</li>               
            </ul>
		</form>
        <div class="u_button regist_button login_btn"><input type="button" class="denglu" id="btn" value="登录"></div>
		<div class="login_bottom">
			<p class="go_login">没有帐号?<a href="register">马上注册</a></p>
			<a class="go_forgetpwd" href="findpwd">忘记密码？</a>
		</div>		
		<p class="version">三界商城v1.0</p>
	</div>
	<!--这里是验证错误时的弹出框-->
	<div class="error_tip"></div>
</div>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
<script>

	 var oBtn = document.getElementById('btn_b');
	    var oW,oLeft;
	    var oSlider=document.getElementById('slider');
	    var oTrack=document.getElementById('track');
	    var oIcon=document.getElementById('icon');
	    var oSpinner=document.getElementById('spinner');
	    var bggreen=document.getElementById('bg-green');
		var flag=1;
	function showx(){
	    oBtn.addEventListener('touchstart',function(e){
			if(flag==1){
				var touches = e.touches[0];
				oW = touches.clientX - oBtn.offsetLeft;
				oBtn.className="button";
				oTrack.className="track";
			}	        
	    },false);
	 
	    oBtn.addEventListener("touchmove", function(e) {
			if(flag==1){
				var touches = e.touches[0];
				oLeft = touches.clientX - oW;
				if(oLeft < 0) {
					oLeft = 0;
				}else if(oLeft > document.documentElement.clientWidth - oBtn.offsetWidth-30) {
					oLeft = (document.documentElement.clientWidth - oBtn.offsetWidth-30);
				}
				oBtn.style.left = oLeft + "px";
				oTrack.style.width=oLeft+ 'px';			
			}
	        
	    },false);	 
	    oBtn.addEventListener("touchend",function() {
	        if(oLeft>=(oSlider.clientWidth-oBtn.clientWidth)){
	            oBtn.style.left = (document.documentElement.clientWidth - oBtn.offsetWidth-30);
	            oTrack.style.width= (document.documentElement.clientWidth - oBtn.offsetWidth-30);
	            oIcon.style.display='none';
	            oSpinner.style.display='block';	
	             bggreen.innerHTML = '验证成功';		
				flag=0;		
	        }else{
	            oBtn.style.left = 0;
	            oTrack.style.width= 0;
	        }
	        oBtn.className="button-on";
	        oTrack.className="track-on"; 
	    },false);
    }	 

    //验证成功进行登录
    $(document).ready(function(){
        $("#next").attr({src:"http://192.168.100.185:7080/code?t="+times()});
        $("#next").click(function(){
            $("#next").attr({src:"http://192.168.100.185:7080/code?t="+times()});
        });
//      $("#Enter_phone").blur(function(){
//      	check_tel();
//      });
     
      	 
        $("#btn").click(function(){
            check_tel(); 
            password1();          
           var stage = $('.stage').is(':visible');       
            if(stage){
              if(flag==1){
            	alertmessage('请滑动验证');
            	return false;         	 
           	 }
            }          
            if(flag==0){
                var vcode = 'yzm';
            }else{
                var vcode = '';
            }            
            $("#btn").attr("disabled", "disabled");
        	$("#btn").css("background","#dedede");
            var name = $("#Enter_phone").val();
            var password = $("#Enter_psd").val();
                    
            //var co = $("#co").val();
            $.ajax({
                url: "<?php echo Url::toRoute('index/login');?>",
                data: {name: name, password: password,vcode: vcode},
                type: "post",
                dataType: "json",
                success:function(data) {
                	 $("#btn").removeAttr("disabled");
                	 $("#btn").css("background","#f01c1b");
                    if (data.errorCode == -15) {
                        alertmessage("密码不能为空");
//                        $(".Do_match").css("display", "block");
//                        setTimeout('history.go()', 1500);
                    }  else if (data.errorCode == -24) {
                        alertmessage("该用户不存在")
                    }  else if (data.errorCode == -34) {
                        alertmessage("网络繁忙，请稍后重试")
                    }else if (data.errorCode == -36) {
                       // $(".code1").css("display", "block");
                       	$(".stage").css("display", "block");
                    } else if (data.errorCode == -37) {                                          
                        alertmessage("验证码错误")
                                            
                    } else if (data.errorCode == 0) {
//                      alertmessage("登录成功");
                        alertmessage1("登录成功");
                       
                        //页面跳转
                        console.log(data.url);
                        if(data.url != ''){
                            location.href=data.url;
                        }else{
                            location.href="<?php echo Yii::$app->urlManager->createUrl('index/index');?>";
                        }
                    }else if (data.errorCode == -48) {
                            alertmessage("密码错误");
//                          oLeft=0;
                            flag=1;
							oBtn.style.left = 0;
	                        oTrack.style.width= 0;
							oIcon.style.display='block';
	                        oSpinner.style.display='none';  
	                        bggreen.innerHTML = '请向右滑动验证';   
                    } else if (data.errorCode == -54) {
                          alertmessage("账号被禁用");
                    } else if (data.errorCode == -82) {
                          alertmessage("您是店铺会员身份,但没有找到您对应的店铺信息,请联系客服为您补全店铺信息！");
                    }
                },
                error:function(){
                	 alertmessage("网络异常!");
                	 $("#btn").removeAttr("disabled");
                	 $("#btn").css("background","#f01c1b");
                }
            })
            
        })
    });
//提示框
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
                },100, function() {
                    window.setTimeout(function(){
                        $('.error_tip').animate({
                                opacity: 0
                            },
                            1000
//                            function() {
//                                //登录成功跳转到首页
//                                window.location="<?php //echo Yii::$app->urlManager->createUrl('index/index');?>//";
//                            }
);
                    }, 1000)
                });
            });
        }
    }

    //手机验证
       function check_tel() {
        var phone = $("#Enter_phone").val();
        var flag = false;
        var myreg = /^0?(13|15|17|18|14|19)[0-9]{9}$/;
        if (phone == '') {
           alertmessage("手机号码不能为空");
//          $("#btn").attr("disabled", "disabled");
//          $("#btn").css("background","#dedede");
			
            return false;
        }else {
            $("#btn").removeAttr("disabled");
            return true;
//          $("#btn").css("background","#f01c1b");

        }
    }

    //密码验证
      function password1(){
    	var password = $("#Enter_psd").val();
        var num = 0;
        var number = 0 ;
        var letter = 0 ;
        var bigLetter = 0 ;
        var chars = 0 ;
        if (password== "") {
            alertmessage("密码不能为空");
            return false;
        }
        if (password.search(/[0-9]/) != -1) {
            num += 1;
            number =1;
        }
        if (password.search(/[A-Z]/) != -1) {
            num += 1;
            bigLetter = 1 ;
        }
        if (password.search(/[a-z]/) != -1) {
            num += 1;
            letter = 1 ;
        }
        if (password.search(/[^A-Za-z0-9]/) != -1) {
            num += 1;
            chars = 1 ;
        }
        if (num >= 2 && (password.length >= 6 && password.length <= 16)) {
            $("#btn").removeAttr("disabled");
        }else if(password.length < 6 || password.length > 16){
            alertmessage("密码由6-16个字符组成");
              var sanci= $('.sanci').val();
			   sanci++;
			   console.log(sanci)
        }
// else if(num == 1){
//            if(number==1){
//                alertmessage("密码不能为纯数字");
//                return false;
//            }
//            if(letter==1){
//                alertmessage("密码不能为纯字母");
//                return false;
//            }
//            if(bigLetter==1){
//                alertmessage("密码不能为纯字母");
//                return false;
//            }
//            if(chars==1){
//                alertmessage("密码不能为纯字符");
//                return false;
//            }else{
//            	return true;
//            }
//        }
    }
    
	    /*fastclick解决移动端点击延迟的问题*/
		if ('addEventListener' in document) {
		    document.addEventListener('DOMContentLoaded', function() {
		        FastClick.attach(document.body);
		    }, false);
		}

    //登录
    function times(){
        var time = new Date();
        return time.getTime();
    }
    showx();
</script>
</body>
</html>