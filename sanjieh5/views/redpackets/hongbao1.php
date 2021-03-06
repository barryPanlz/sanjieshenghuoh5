<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title> 三界生活红包 </title>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/hongbao/reset.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/hongbao/animate.min.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/hongbao/hongbao.css"/>
		<script src="<?php echo $pc_style; ?>js/hongbao/rem.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<style type="text/css">
	.redEnvelope{
		overflow: hidden;
		position: relative;
		background:#FFFFFF;
	}
		.redpai{
			width: 4.39rem;
			height: 3.6rem;
			margin: 1rem auto;
		}
		.redpai img{
			width: 100%;
		}
		.redxiaosu{
			width: 100%;
			height:3rem;
			position: absolute;
			left:0 ;
			top: 0.5rem;
		}
		.redxiaosu img{
			width: 100%;
		}
		.redpack1{
			width: 0.5rem;
			height: 0.5rem;
			position: absolute;
			left:2rem;
			top: 0.75rem;
		}
		.redpack2{
			left:4rem;
		}
		.redpack1 img{
			width: 100%;
		}
		.redpai img{
			animation-delay:1s;
			-webkit-animation-delay:1s;
		}
		 .redpack1 img{
		    animation-duration: 1s;    //动画持续时间
		    animation-delay:2s;
			-webkit-animation-delay:2s;  //动画延迟时间
		    animate-iteration-count: 2;    //动画执行次数
		}
		.redpack2 img{
			  animation-delay:2.5s;
			-webkit-animation-delay:2.5s;
		}
		.envelope{
			animation-delay:3s;
			-webkit-animation-delay:3s;
		}
		@-webkit-keyframes scaleCircle{
				0%{transform:scale(1);}
				100%{transform:scale(0.9);}
		}
		/*======*/
		.snow{
				position:absolute;
				top:-100px;
				z-index:99;
				transform:rotate(0deg);
			}
	</style>
		
	
	<body>
		
		<img class="hbBanner" src="<?php echo $pc_style; ?>images/banner.png"/>
		
		<!--红包来啦宣传图-->
		<div class="redEnvelope" id="redEn">
			<div class="redpai">
				<img src="<?php echo $pc_style; ?>images/jinpai1.png"  class="animated zoomInDown" />
			</div>
			<div class="redxiaosu">
				<img src="<?php echo $pc_style; ?>images/sahua.png"  class="animated zoomIn" />
			</div>
			<div class="redpack1">
				<img src="<?php echo $pc_style; ?>images/hongbao1.png" class="animated bounceInDown" />
			</div>
			<div class="redpack1 redpack2">
				<img src="<?php echo $pc_style; ?>images/hongbao2.png" class="animated bounceInDown" />
			</div>
		</div>
		<!--马上去抢链接a-->
		<a class="envelope animated bounceInDown"></a>
        <input type="hidden" id="luckyId" value="<?php echo $_GET['id'];?>"/>
        <input type="hidden" id="sessionid" value="<?php echo Yii::$app->session->get('sessionid'); ?>"/>
		<!--红包说明文字-->
		<h3 class="hb_h3"> 活动规则 </h3>
		<p class="hb_p">1.先登录，再领红包</p>
		<p>2.每个注册账号只能领取一次</p>
		<p>3.红包金额是随机分配的，每个人领取的数量不同</p>
		<!--登录弹框-->
		<div class="loginBox" style="display: none">
		  <div class="loginKuang">
		  	<h2 class="login_h2"> 登录三界生活 </h2>
		  	<input class="login_txt" type="text" name="" id="Enter_phone" placeholder="请输入三界生活账号" />
		  	<input class="login_txt login_psd" type="password" name="" id="Enter_psd"  placeholder="请输入登录密码" />
		  	<div class="login_span">
		  		<span id="btn"> 确认登录 </span>
		  		<span id="cancel"> 取消 </span>
		  	</div>
		  </div>
		</div>
		<script src="<?php echo $pc_style; ?>js/hongbao/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
            //抢红包
            var user_id = "<?php echo Yii::$app->session->get('sessionid'); ?>";
            $(".envelope").click(function(){

                $(".envelope").attr('disabled','disabled') ;
            	// alert(user_id);
                // if(user_id == ''){
                //     //显示登录的遮罩层
                //     $(".loginBox").css("display","block");
                //     //登录
                //     $("#btn").click(function(){
                //         var name = $("#Enter_phone").val();
                //         var password = $("#Enter_psd").val();
                //         var luckyId = $("#luckyId").val();
                //         $.ajax({
                //             url: "<?php echo Yii::$app->urlManager->createUrl('redpackets/login');?>",
                //             data: {name: name, password: password},
                //             type: "post",
                //             dataType: "json",
                //             success:function(data) {
                //                 $("#btn").removeAttr("disabled");
                //                 $("#btn").css("background","#f01c1b");
                //                 if (data.errorCode == -15) {
                //                     alert("密码不能为空");
                //                 }  else if (data.errorCode == -24) {
                //                     alert("该用户不存在");
                //                 }  else if (data.errorCode == -34) {
                //                     alert("网络繁忙，请稍后重试")
                //                 }else if (data.errorCode == -36) {
                //                     $(".code1").css("display", "block");
                //                 } else if (data.errorCode == -37) {
                //                     alert("验证码错误");
                //                 } else if (data.errorCode == 0) {
                //                    // alert("登录成功");
                //                     user_id =111;
                //                     //页面跳转
                //                     $(".loginBox").css("display","none");
                //                     //location.reload();
                                    

                //                 }else if (data.errorCode == -48) {
                //                     alert("密码错误")
                //                 } else if (data.errorCode == -54) {
                //                     alert("账号被禁用");
                //                 }
                //             },
                //             error:function(){
                //                 alertmessage("网络异常!");
                //                 $("#btn").removeAttr("disabled");
                //                 $("#btn").css("background","#f01c1b");
                //             }
                //         })
                //     })
                // }else{
                    //直接抢红包
                    var luckyId = $("#luckyId").val();
                    $.ajax({
                        type:'POST',
                        data:{'luckyId':luckyId},
                        dataType:'json',
                        url:"<?php echo Yii::$app->urlManager->createUrl('redpackets/moneyred');?>",
                        success:function(data){
                             if(data.errorCode==0){
                                $(".envelope").removeAttr('disabled');
                                alert("抢成功");
                                 //抢成功
                                 location.href = "<?php echo Yii::$app->urlManager->createUrl('redpackets/hongbao');?>?id="+luckyId;
                             }else if(data.errorCode==-86){
                                 $(".envelope").removeAttr('disabled') ;
                                 alert("红包已抢完，抢红包失败！");
                                 location.href = "<?php echo Yii::$app->urlManager->createUrl('redpackets/emptyred');?>?id="+luckyId;
                             }else if(data.errorCode==-85 ){
                                 $(".envelope").removeAttr('disabled') ;
                                 alert("抱歉，您已经抢过了，不能重复抢！");
                                 location.href = "<?php echo Yii::$app->urlManager->createUrl('redpackets/hongbao');?>?id="+luckyId;
                             }else if(data.errorCode==-90){
                                 $(".envelope").removeAttr('disabled') ;
                                 alert("抢红包活动未开始，暂时不可抢红包！");
                             }else if(data.errorCode==-92){
                             	$(".envelope").removeAttr('disabled') ;
                                 alert("抢红包活动已结束，敬请期待下一轮抢红包活动！");
                             } else if(data.errorCode==-93){
                             	$(".envelope").removeAttr('disabled') ;
                                 alert("亲，您来晚了，红包已抢光！敬请期待下一轮抢红包活动！");
                                  location.href = "<?php echo Yii::$app->urlManager->createUrl('redpackets/emptyred');?>?id="+luckyId;
                                 
                             }else if(data.errorCode==-94){
                             	$(".envelope").removeAttr('disabled') ;
                                 alert("您没有参与该轮抢红包活动权限！");
                             }else if(data.errorCode==-2){
                             	 //显示登录的遮罩层
				                    $(".loginBox").css("display","block");
				                    //登录
				                    $("#btn").click(function(){
				                        var name = $("#Enter_phone").val();
				                        var password = $("#Enter_psd").val();
				                        var luckyId = $("#luckyId").val();
				                        $.ajax({
				                            url: "<?php echo Yii::$app->urlManager->createUrl('redpackets/login');?>",
				                            data: {name: name, password: password},
				                            type: "post",
				                            dataType: "json",
				                            success:function(data) {
				                                $("#btn").removeAttr("disabled");
				                                $("#btn").css("background","#f01c1b");
				                                if (data.errorCode == -15) {
				                                    alert("密码不能为空");
				                                }  else if (data.errorCode == -24) {
				                                    alert("该用户不存在");
				                                }  else if (data.errorCode == -34) {
				                                    alert("网络繁忙，请稍后重试")
				                                }else if (data.errorCode == -36) {
				                                    $(".code1").css("display", "block");
				                                } else if (data.errorCode == -37) {
				                                    alert("验证码错误");
				                                } else if (data.errorCode == 0) {
				                                    //alert("登录成功");
				                                    user_id =111;
				                                    //页面跳转
				                                    $(".loginBox").css("display","none");
				                                    //location.reload();
				                                    

				                                }else if (data.errorCode == -48) {
				                                    alert("密码错误")
				                                } else if (data.errorCode == -54) {
				                                    alert("账号被禁用");
				                                }
				                            },
				                            error:function(){
				                                alertmessage("网络异常!");
				                                $("#btn").removeAttr("disabled");
				                                $("#btn").css("background","#f01c1b");
				                            }
				                        })
				                    })
                             }
                        }
                    });
                // }

                
            })

			$('#cancel').click(function(){
				$('.loginBox').css('display','none');
			});
			var redP = document.getElementsByClassName("redpai")[0];
			redP.addEventListener("webkitAnimationEnd",function(){
				this.style.webkitAnimation = "tada 1.5s 0.3s linear infinite alternate";
			},false);
			var oEle = document.getElementsByClassName("redxiaosu")[0];
			oEle.addEventListener("webkitAnimationEnd",function(){
				this.style.webkitAnimation = "scaleCircle 1s 0.3s linear infinite alternate";
			},false);
			var endAvatar1 = document.getElementsByClassName("redpack1")[0].getElementsByTagName("img")[0];
			var endAvatar2 = document.getElementsByClassName("redpack1")[1].getElementsByTagName("img")[0];
			endAvatar1.addEventListener("webkitAnimationEnd",function(){
				this.style.webkitAnimation = "bounce 1.5s 2s linear infinite";
			},false)
			endAvatar2.addEventListener("webkitAnimationEnd",function(){
				this.style.webkitAnimation = "bounce 1.5s 2s linear infinite";
			},false)
			var enveL = document.getElementsByClassName("envelope")[0];
			enveL.addEventListener("webkitAnimationEnd",function(){
				var time = setInterval(function(){
				for(var i=0;i<ranNum(1,3);i++){
					var snowFlower = document.createElement("img");	
					snowFlower.src = "<?php echo $pc_style; ?>images/hongbao1.png";
					var snowSize = ranNum(20,30);
					snowFlower.style.width = snowSize+"px";
					snowFlower.style.height = snowSize + "px";
					snowFlower.className = "snow";
					snowFlower.style.left = ranNum(0,screenWidth-snowSize) + "px";
					snowFlower.style.webkitTransition = "all "+ranNum(3,5)+"."+ranNum(0,9)+"s linear";	
					bg.appendChild(snowFlower);
					fall(snowFlower);
					}
				},1000)
			},false);
			//随机红包雨
			
			var bg = document.getElementById("redEn");
//			var snowLand = document.getElementById("redEn");
			bg.snowNum = 0;
			bg.snowHei = 0;
			var screenWidth = document.documentElement.offsetWidth||document.body.offsetWidth;
			var screenHeight = document.documentElement.offsetHeight||document.body.offsetHeight;
			
//			获取min到max的随机数
			function ranNum(min,max){
				return Math.floor(Math.random()*(max-min+1))+min;
			}
			
			function fall(snowFlower){
				var obj = snowFlower;
				setTimeout(function(){
					obj.style.top = screenHeight+400+"px";
					obj.style.webkitTransform = "rotate("+(360+ranNum(0,360))+"deg)";
					obj.addEventListener("webkitTransitionEnd",function(){
						obj.remove();
						bg.snowNum++;
						if(bg.snowHei<=30){
							if(bg.snowNum>=10){
								bg.snowNum = 0;
								bg.snowHei++;
//								snowLand.style.height = bg.snowHei+"px";
							}
						}
					},false);
				},50)
			}
		</script>
		
	</body>
</html>
