<?php
    use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>《链金有法》分享图书即奖三界宝</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/lianjin.css">
		<style type="text/css">
			.hover_wrap{
				z-index: 9999;
				position: fixed;
				top: 4rem;
				right: 0;
			}
			.hover_wrap img{
				width: 1rem;
			}
		</style>
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $pc_style; ?>js/lib/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>
</head>	
<body>
<div class="screen">
	  <!--商城首页头部-->
	  <header>
		<h1>链金有法</h1>
		<a class="u_back"  href="javascript:history.go(-1);">返回</a>
	</header>
	<div class="main no_footer_main ">
		 <!--<a style="font-size: 0.28rem;" href="<?php echo \Yii::$app->urlManager->createUrl(['goods/newdetails','goodsId'=>'666666','catId'=>'38']);?>">点击进入详情页</a>
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
				<!--<div class="li_butt_wrap">
					<a class="li_butt1" href="https://www.vpdax.com/home" target="_blank"></a>
					<a class="li_butt2" href="<?php echo @\Yii::$app->urlManager->createUrl(['goods/newdetails','goodsId'=>'666666',"catId"=>'38']);?>"></a>
				</div>-->
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
	</div>
	
	<!--分享弹窗-->
	<div class="mokuai_wrap" id="mokuaiFen">
		<!--<img src="<?php echo $pc_style; ?>images/lianjinyoufa/jiantou@3x.png"/>-->
		<div class="img_jiantiou_wrap">
			<div class="img_jiantiou">
			</div>
		</div>
		<div class="li_wrap" >
			<li>
				<span>1</span>点击右上角的<img src="<?php echo $pc_style; ?>images/lianjinyoufa/sangedian@3x.png" alt="" />按钮
			</li>
			<li id="liWrap">
				<span>2</span>选择<img src="<?php echo $pc_style; ?>images/lianjinyoufa/fageipengyou.png" alt="" />或<img src="<?php echo $pc_style; ?>images/lianjinyoufa/pengyouquan.png" alt="" />
			</li>
		</div>
	</div>
	<!--app下载指向弹窗-->
	<div class="mokuai_wrap" id="mokuaiApp" >
		<!--<img src="<?php echo $pc_style; ?>images/lianjinyoufa/jiantou@3x.png"/>-->
		<div class="img_jiantiou_wrap">
			<div class="img_jiantiou">
			</div>
		</div>
		<div class="li_wrap">
			<li>
				<span>1</span>点击右上角的<img src="<?php echo $pc_style; ?>images/lianjinyoufa/sangedian@3x.png" alt="" />按钮
			</li>
			<li>
				<span>2</span>选择<img src="<?php echo $pc_style; ?>images/lianjinyoufa/zailiulanqi@3x.png" alt="" />
			</li>
		</div>
	</div>
	<div class="xiala_wrap">
		<span>用APP查看效果更好哦！</span>
		<b id="but">打开APP</b>
		<img id="chaColse" src="<?php echo $pc_style; ?>images/lianjinyoufa/nebookcha.png"/>
	</div>
</div>
<div class="hover_wrap">
	<a href="<?php echo @\Yii::$app->urlManager->createUrl(['goods/newdetails','goodsId'=>'666666',"catId"=>'38']);?>">
		<img src="<?php echo $pc_style; ?>/images/lianjinyoufa/ljgoumai.png"/>
	</a>
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
	// 优先存储分享过来的code
	var InvitationCode=window.location.search.split("&")[0].split("=")[1];
	console.log(InvitationCode);
	if(InvitationCode==undefined||InvitationCode==""||InvitationCode==null){
			InvitationCode="";
	}
	sessionStorage.setItem("InvitationCode", InvitationCode);
	InvitationCode=sessionStorage.getItem("InvitationCode")
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
		window.location.href = "http://www.isanjie.com/index/suiyi?code="+InvitationCode;
    } else {
        
    }
	
		if(InvitationCode==undefined||InvitationCode==""){
			// 如果获取不到session 这是头一次进入
			$("#mokuaiFen").css("display","none");
		}else{
			var biaoji=sessionStorage.getItem("biaoji");
			console.log(biaoji)
			if(biaoji==undefined||biaoji==""){
				// 如果获取不到biaoji 就说明不是通过点击分享进来的，是通过微信分享页面进来的，也是头一次进入
				$("#mokuaiFen").css("display","none");
			}else{
				// 如果获取到biaoji 就说明是通过点击分享进来的
				$("#mokuaiFen").css("display","block");
				// 将标记去除，下一次在次进入时重新创建
				sessionStorage.setItem("biaoji", "");
			}
					
		}
		

		  
		  $("#but").click(function(){
		  	//判断为那个浏览器
		  		if(is_weixn()&&is_QQInnerBro()){
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
	                window.location = 'com.isanjie.com://sanjieshenghuo?code='+InvitationCode1;
	            } else if (isAndroid) {
//	            	alert("是安卓");
	                setTimeout(function () {
	                    window.location = 'http://a.app.qq.com/o/simple.jsp?pkgname=com.dreamtreasure.shop';
	                }, 3000);
	                window.location = 'book://dreamtreasure/test1?code='+InvitationCode1;
	            } else {
	                alert('Please open this link via your mobile device instead of computer.');
	            }
	        }


			
			
//		点击图层，隐藏涂层	
	$(".mokuai_wrap").click(function(){
		$(this).css("display","none");
	})
	window.setTimeout(function(){
		$(".xiala_wrap").slideDown();
	},3000);
		//点击叉关闭app提示弹窗
		$("#chaColse").click(function(){
			$(".xiala_wrap").slideUp();
		})	
				
</script>


</body>
</html>	
	
	
	
	
	 
