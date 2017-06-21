<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
		<title>《链金有法》分享图书即奖三界宝</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/app/reset.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/app/common.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/app/lianjin.css"/>
		<script src="<?php echo $pc_style; ?>js/app/rem.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
		<script src="<?php echo $pc_style; ?>js/app/common.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php echo $pc_style; ?>js/app/fastclick.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<div class="main no_footer_main ">
				 <!--<a style="font-size: 0.28rem;" href="<?php echo \Yii::$app->urlManager->createUrl(['goods/newdetails','goodsId'=>'1','catId'=>'72']);?>">点击进入详情页</a>
				<button id="but" style="font-size: 0.28rem;">点击跳转app</button>
				<button id="but1" style="font-size: 0.28rem;">点击跳转详情页</button>-->
				<!--<a href="itms-services://?action=download-manifest&url=https%3A%2F%2Fwww.pgyer.com%2Fapiv1%2Fapp%2Fplist%3FaId%3D689b477498d66c391aa21fb8fa59a281%26_api_key%3De154760d68f0bd05c3cb08927063bed2">sdasdasdasdasdasdasdasd</a>-->
				<div class="lianjin_wrap">
			<div class="lj1"></div>
			<div class="lj2"></div>
			<div class="lj3">
				<div class="shipin">
					<video width="100%" controls>
					    <source src="<?php echo $pc_style; ?>/images/lianjinyoufa/lianjin.mp4" type="video/mp4">
					    <source src="<?php echo $pc_style; ?>/images/lianjinyoufa/.webm" type="video/webm">
					    	您的浏览器不支持 video 标签。
					</video>
				</div>
			</div>
			<div class="lj4"></div>
			<div class="lj5"></div>
			<div class="lj6"></div>
			<div class="lj7"></div>
			<div class="lj8"></div>
			<div class="lj9"></div>
			<div class="lj10"></div>
			<div class="lj11"></div>
			<div class="lj12"></div>
			<div class="lj13"></div>
			<div class="lj14"></div>
			<div class="lj15">
				<div class="li_butt_wrap">
					<a class="li_butt1" href="https://www.vpdax.com/home" target="_blank"></a>
					<a class="li_butt2" href="<?php echo @\Yii::$app->urlManager->createUrl(['goods/newdetails','goodsId'=>'666666',"catId"=>'38']);?>"></a>
				</div>
			</div>
			<div class="lj16"></div>
			<div class="lj17"></div>
			<div class="lj18"></div>
			<div class="lj19"></div>
			<div class="lj20"></div>
			<div class="lj21"></div>
			<div class="lj22">
				<a href="<?php echo @\Yii::$app->urlManager->createUrl(['goods/newdetails','goodsId'=>'666666',"catId"=>'38']);?>"></a>
			</div>
		</div>
			<!--app下载指向弹窗-->
			<div class="mokuai_wrap" id="mokuaiApp" >
				<div class="img_jiantiou_wrap">
					<div class="img_jiantiou">
					</div>
				</div>
				
				<div class="li_wrap">
					<li>
						<span>1</span>点击右上角的<img src="<?php echo $pc_style; ?>img/sangedian@3x.png"/>按钮
					</li>
					<li>
						<span>2</span>选择<img src="<?php echo $pc_style; ?>img/zailiulanqi@3x.png"/>
					</li>
				</div>
			</div>
		</div>
		<script type="text/javascript">
		/*fastclick解决移动端点击延迟的问题*/
			if ('addEventListener' in document) {
			    document.addEventListener('DOMContentLoaded', function() {
			        FastClick.attach(document.body);
			    }, false);
			}
			// 优先存储分享过来的code
			var InvitationCode=window.location.search.split("&")[0].split("=")[1];
			console.log(InvitationCode);
			sessionStorage.setItem("InvitationCode", InvitationCode);
		    //平台、设备和操作系统
		    var system = {
		        win: false,
		        mac: false,
		        xll: false,
		        ipad:false
		    };
		    //检测平台
		    var p = navigator.platform;
		    system.win = p.indexOf("Win") == 0;
		    system.mac = p.indexOf("Mac") == 0;
		    system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);
		    system.ipad = (navigator.userAgent.match(/iPad/i) != null)?true:false;
		    //跳转语句，如果是Pc访问就自动跳转到pc端页面
		    if (system.win || system.mac || system.xll||system.ipad) {
				window.location.href = "http://www.isanjie.com/index/suiyi";
		    } else {
		        
		        
		    }
			
			
			
			
			
			
			
//			$("#but1").click(function(){
//		   		jsBookDetails()
//		   });
//		   function jsBookDetails(){
//				    window.book.details();
//			}
		   
		   
		   
		   
		   $("#but").click(function(){
		  	//判断为那个浏览器
		  		if(is_weixn()||is_weixn()){
		  			 checkApp();
		  		}else{
		  			$("#mokuaiApp").css("display","block");
		  		}
		   });
		       function is_weixn(){
					var ua = navigator.userAgent.toLowerCase();
					if(ua.match(/MicroMessenger/i)=="micromessenger") {
//						alert("是微信");
						return false;
					} else {
						return true;
					}
				} 
		        
		       function is_QQInnerBro(){
		       	var ua = navigator.userAgent.toLowerCase();
					if (ua.match(/QQ/i) == "qq") {
//						alert("是QQ");
					   	return false;
					} else {
						 return true;
					}
				};
		        
		    
			function checkApp() {
				var InvitationCode1="";
				InvitationCode1=sessionStorage.getItem("InvitationCode");
				if(InvitationCode1==""||InvitationCode1==null||InvitationCode1==undefined){
					InvitationCode1="";
				}
				console.log(InvitationCode1);
	            var ua = navigator.userAgent;
	            var isiOS = ua.match(/iPhone|iPod|iPad/i);
	            var isAndroid = ua.match(/Android/i);
	            var isPC = !isiOS && !isAndroid;
	
	            if (isiOS) {
//	            	alert("是ios")
	                setTimeout(function () {
	//              window.location.href = "https://appsto.re/cn/3SMphb.i";
					window.location = 'itms-services://?action=download-manifest&url=https%3A%2F%2Fwww.pgyer.com%2Fapiv1%2Fapp%2Fplist%3FaId%3D689b477498d66c391aa21fb8fa59a281%26_api_key%3De154760d68f0bd05c3cb08927063bed2';
	                }, 3000);
	                window.location = 'sanjieshenghuo://sanjieshenghuo';
	            } else if (isAndroid) {
//	            	alert("是安卓");
	                setTimeout(function () {
	                    window.location = 'http://a.app.qq.com/o/simple.jsp?pkgname=com.dreamtreasure.shop';
	                }, 3000);
	                window.location = 'book://dreamtreasure/test1?code='+InvitationCode;
	            } else {
	                alert('Please open this link via your mobile device instead of computer.');
	            }
	        }


			
			
//		点击图层，隐藏涂层	
	$(".mokuai_wrap").click(function(){
		$(this).css("display","none");
	})
		</script>
	</body>
</html>
