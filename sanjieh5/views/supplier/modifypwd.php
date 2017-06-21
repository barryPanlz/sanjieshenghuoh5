<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
		<title>修改登录密码</title>
		<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
		<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
		<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/form.css">
		<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	</head>

	<body>
		<div class="screen">
			<header>
				<h1>修改登录密码</h1>
				<a class="u_back" href="javascript:history.go(-1);">返回</a>
			</header>
			<div class="main no_footer_main white_main">
				<div class="logo">
					<img src="../../resources/images/logo.png">
				</div>
				<form action="">
					<ul class="regist_box">
						<li>
							<input type="text" placeholder="输入手机号" id="mobile_phone1" onblur="check_tel();">
						</li>
						<li>
							<input class="code_text" type="text" placeholder="输入短信验证码" id="code">
							<button class="code" id="sendcode">获取验证码</button>
						</li>
						<li>
							<input type="password" placeholder="输入原始密码" id="oldpwd">
						</li>
						<li>
							<input type="password" placeholder="输入6-16个字符（包含大小写字母、数字或符号等）" id="newPSd">
						</li>
						<li>
							<input type="password" placeholder="再次输入密码" id="rePsd">
						</li>
					</ul>
				</form>
				<div id="sure" class="u_button regist_button"><input type="submit" value="确定" class="btn1"></div>
				<p class="version">三界商城v1.0</p>
			</div>
			<div class="error_tip">手机号码格式不正确</div>
			<div class="success_box">
				<img src="../../resources/images/icon23.png" alt="">
				<p>修改成功</p>
			</div>
		</div>
		<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
		<script>
			/*fastclick解决移动端点击延迟的问题*/
			if('addEventListener' in document) {
				document.addEventListener('DOMContentLoaded', function() {
					FastClick.attach(document.body);
				}, false);
			}

			function check_tel() {
				var phone = $("#mobile_phone1").val();
				var flag = false;
				var myreg = /^(((13[0-9]{1})|(14[0-9]{1})|(17[0-9]{1})|(15[0-3]{1})|(15[5-9]{1})|(18[0-9]{1}))+\d{8})$/;
				if(phone == '') {
					alertmessage("手机号码不能为空");
					$("#btn").attr("disabled", "disabled");
					return false;
				} else if(phone.length != 11) {
					alertmessage("请输入有效的手机号码");
					$("#btn").attr("disabled", "disabled");
					return false;
				} else if(!myreg.test(phone)) {
					alertmessage("请输入有效的手机号码");
					$("#btn").attr("disabled", "disabled");
					return false;
				} else {
					$("#btn").removeAttr("disabled");
					return true;
				}
			}
			//验证密码
			$("#newPSd").blur(function() {
				var password = $("#newPSd").val();
				var num = 0;
				var number = 0;
				var letter = 0;
				var bigLetter = 0;
				var chars = 0;
				if(password.search(/[0-9]/) != -1) {
					num += 1;
					number = 1;
				}
				if(password.search(/[A-Z]/) != -1) {
					num += 1;
					bigLetter = 1;
				}
				if(password.search(/[a-z]/) != -1) {
					num += 1;
					letter = 1;
				}
				if(password.search(/[^A-Za-z0-9]/) != -1) {
					num += 1;
					chars = 1;
				}
				if(num >= 2 && (password.length >= 6 && password.length <= 16)) {
					$("#btn").removeAttr("disabled");
				} else if(password.length < 6 || password.length > 16) {
					alertmessage("密码由6-16个字符组成");
				}
//                else if(num == 1) {
//					if(number == 1) {
//						alertmessage("不能全为数字");
//						$("#btn").attr("disabled", "disabled");
//					}
//					if(letter == 1) {
//						alertmessage("不能全为字母");
//						$("#btn").attr("disabled", "disabled");
//					}
//					if(bigLetter == 1) {
//						alertmessage("不能全为字母");
//						$("#btn").attr("disabled", "disabled");
//					}
//					if(chars == 1) {
//						alertmessage("不能全为字符");
//						$("#btn").attr("disabled", "disabled");
//					}
//				}
			});
			//验证确认密码
			$("#rePsd").blur(function() {
				var password = $("#newPSd").val();
				var rePsd1 = $("#rePsd").val();
				if(rePsd1 != password) {
					alertmessage("两次输入的密码不一致");
					$("#btn").attr("disabled", "disabled");
				} else {
					$("#btn").removeAttr("disabled");
					return true;
				}
			});

			$(document).ready(function() {
				$("#sendcode").click(function() {
					if(check_tel() == false) {
						return false;
					}
					 $("#sendcode").attr("disabled","disabled");
					tesSetIn();
					var mobile_phone1 = $('#mobile_phone1').val();
					$(this).attr('attr', '1');
					$.ajax({
						url: "sendvcode",
						data: {
							'mobile_phone1': mobile_phone1
						},
						type: 'post',
						success: function(data) {
							if(data == 1) {
								$("#btn").removeAttr("disabled");
								alertmessage("发送成功");
							} else {
								alertmessage("发送失败");
								$("#btn").attr("disabled", "disabled");
							}
						}
					});
				});
				$(".btn1").click(function() {
					var phone = $("#mobile_phone1").val();
					//alert(phone);
					var code = $("#code").val();
					var oldpwd = $("#oldpwd").val();
					var password = $("#newPSd").val();
					var rpassword = $("#rePsd").val();
                    if(code==''){
                        alertmessage('验证码不能为空');
                        return false;
                    }
                    if(oldpwd == ''){
                       alertmessage('原密码不能为空');
                        return false;
                    }
                    if(password == ''){
                        alertmessage('新密码不能为空');
                        return false;
                    }
                    if(rpassword == ''){
                        alertmessage('确认密码不能为空');
                        return false;
                    }
					$.ajax({
						url: "savepwd",
						data: {
							phone: phone,
							code: code,
							password: password,
							rpassword: rpassword,
							oldpwd: oldpwd
						},
						type: "POST",
						dataType: "json",
						success: function(data) {
							// alert(data);
							if(data.errorCode == 0) {
								if(!$('.success_box').is(":animated")) {
									$('.success_box').show(100, function() {
										$('.success_box').animate({
											opacity: 1
										}, 1000, function() {
											window.setTimeout(function() {
												$('.error_tip').animate({
														opacity: 0
													},
													1000,
													function() {
														$('.success_box').hide();
														location.href = "<?php echo Yii::$app->urlManager->createUrl('index/login');?>";
													});
											}, 1000)
										});
									});
								}
							} else if(data.errorCode == -15) {
								alertmessage("密码设置不符合规范");
							} else if(data.errorCode == -24) {
								alertmessage("手机号未注册");
							} else if(data.errorCode == -34) {
								alertmessage("网络繁忙，请稍后重试");
							} else if(data.errorCode == -37) {
								alertmessage("验证码错误");
							} else if(data.errorCode == -48) {
								alertmessage("原密码错误");
							} else if(data.errorCode == -49) {
                                alertmessage("修改失败");
                            }else if(data.errorCode == -80){
                                alertmessage("新密码不能与旧密码一致");
                            } else if(data.errorCode == -25) {
                                alertmessage("手机号输入有误，请输入当前手机号");
                            }
                        },
						error: function() {
							alert("失败");
						}
					})

				})
			});

			function alertmessage(html) {
				if(!$('.error_tip').is(":animated")) {
					$('.error_tip').show(100, function() {
						$('.error_tip').html(html); //这里输入要提示的内容
						$('.error_tip').animate({
							opacity: 1
						}, 1000, function() {
							window.setTimeout(function() {
								$('.error_tip').animate({
										opacity: 0
									},
									1000,
									function() {
										$('.not_empty').hide();
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

		</script>
	</body>

</html>