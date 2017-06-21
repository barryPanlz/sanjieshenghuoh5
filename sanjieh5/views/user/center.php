<?php
    use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="format-detection" content="telephone=no" />	
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>个人中心</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/centerlist.css">
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	<style type="text/css">
		.user_money_bottom1 li {
		    width: 49%;
		    font-size: 0; 
		}
		.user_money_bottom1 #zhuangzhang{
			border: 0;
		}
		.user_money_bottom1 li img {
		    left: 2.3rem;
		}
	</style>
</head>
<body>
<div class="screen">
	<header>
		<h1>个人中心</h1>
<!--		<a class="u_back" href="javascript:history.go(-1)">返回</a>-->
        <a class="u_back" href="<?php echo Yii::$app->urlManager->createUrl('index/index'); ?>">返回</a>
	</header>
	<div class="main">
		<div class="img centert_top">
			<div class="photo">
                <?php if(!empty($data->user_img)){ ?>
                   <img src="<?php echo $data->user_img; ?>" alt="">
                <?php }else{ ?>
                    <img src="<?php echo $pc_style; ?>images/Tel-moren.png" alt="" />
                <?php  }?>
            </div>
			<div class="user_info">
				<h2>
					<?php if(!empty($data->user_name)){ 
					 	echo $data->user_name;
					 }else{ 
	               		echo $data->mobile_phone;
					 }?>
				</h2>
				<p><?php if($data->user_type == '1') { ?>
                      <?php  echo "普通会员"; ?>
                   <?php }else if($data->user_type == '2'){
                        echo "创业会员";
                    }else if($data->user_type == '3'){
                        echo "店铺";
                    }else if($data->user_type == '4'){
                        echo "供应商";
                    }else if($data->user_type == '5'){
                        echo "代理商";
                    }?></p>
                <!--<?php if($data->user_type == '1'){ ?>
                    <a href="<?php echo \Yii::$app->urlManager->createUrl(['pay/updatelevel']);?>">[升级创业会员]</a>
                <?php } ?>-->
			
			</div>
			<div class="qr_code">
				<img src="<?php echo $rcode.$data->rcode;?>" alt="">
				<p>邀请码：<?php echo empty($data->usercode)?" 999999":$data->usercode; ?></p>
			</div>
		</div>
		<?php if($data->user_type == '1'){ ?>
			<div class="list">
				<ul>
					<li>
						<a href="<?php echo \Yii::$app->urlManager->createUrl(['pay/updatelevel']);?>">
							<div class="icon"><img src="<?php echo $pc_style; ?>images/chuangyehuiyuan.png" alt=""></div>
							<p class="name">升级为创业会员</p>
							<span class="arrow"><img src="<?php echo $pc_style; ?>images/back.png" alt=""></span>
						</a>
					</li>
				</ul>
			</div>
			<div class="user_money_warp">
				<div class="user_money_top">
					<div class="user_money_top_top fun_money_nub">
						<?php if(!empty($data)){
							echo $data->future_currency ;
						}?>
					</div>
					<div class="user_money_top_top user_money_top_top1">
						三界石
					</div>
				</div>
				<div class="user_money_bottom">
					<a href="<?php echo Yii::$app->urlManager->createUrl('pay/centerpay');?>">
						<li class="rig" style="margin-left:25% ;border: 0;">
							充值
						</li>
					</a>
					<!-- <a href="<?php //echo Yii::$app->urlManager->createUrl('physical/index');?>">
						<li class="">
							实体店消费付款
						</li>
					</a> -->
				</div>
			</div>
		<?php }else if($data->user_type == '2'){ ?>
			<div class="user_money_warp">
				<div class="user_money_top">
					<div class="user_money_top_warp1">
						<div class="user_money_top_top fun_money_nub">
							<?php if(!empty($data)){
								echo $data->future_currency ;
							}?>
						</div>
						<div class="user_money_top_top user_money_top_top1">
							三界石
						</div>
					</div>
					<div class="user_money_top_warp1">
						<div class="user_money_top_top fun_money_nub">
							<?php if(!empty($data)){
								echo $data->future_treasure ;
							}?>
						</div>
						<div class="user_money_top_top user_money_top_top1">
							三界宝
						</div>
					</div>
				</div>
				<div class="user_money_bottom user_money_bottom1">
					<a href="<?php echo Yii::$app->urlManager->createUrl('pay/centerpay');?>">
						<li class="rig">
							<span>充值</span>
						</li>
					</a>
				<!-- 	user/treasure 宝
					user/transfer 石 -->
				<!-- 	<div class="">
							<a href="<?php //echo \Yii::$app->urlManager->createUrl(['user/treasure']);?>">转三界宝</a>
							<a href="<?php //echo \Yii::$app->urlManager->createUrl(['user/transfer']);?>">转三界石</a>
						</div> -->
						<li id="zhuangzhang">
							<span>转账</span>
							<img src="<?php echo $pc_style; ?>images/downarrow.png"/>
							<ul>
								<a href="<?php echo \Yii::$app->urlManager->createUrl(['user/transfer']);?>">转三界石</a>
								<a href="<?php echo \Yii::$app->urlManager->createUrl(['user/treasure']);?>">转三界宝</a>
							</ul>
						</li>

					<!-- <a href="<?php //echo Yii::$app->urlManager->createUrl('physical/index');?>">
						<li class="">
							<span>实体店消费付款</span>
						</li>
					</a> -->
				</div>
			</div>
		<?php } ?>
		
		<div class="list">
			<ul>
				<li>
					<a href="<?php echo Yii::$app->urlManager->createUrl('user/genacc');?>">
						<div class="icon"><img src="<?php echo $pc_style; ?>images/icon13.png" alt=""></div>
						<p class="name">我的账单</p>
						<span class="arrow"><img src="<?php echo $pc_style; ?>images/back.png" alt=""></span>
					</a>
				</li>
				<li>
					<a href="<?php echo Yii::$app->urlManager->createUrl('user/shoporder');?>">
						<div class="icon"><img src="<?php echo $pc_style; ?>images/dingdan.png" alt=""></div>
						<p class="name">我的订单</p>
						<span class="arrow"><img src="<?php echo $pc_style; ?>images/back.png" alt=""></span>
					</a>
				</li>
				<li>
					<a href="<?php echo Yii::$app->urlManager->createUrl('user/genrecom');?>">
						<div class="icon"><img src="<?php echo $pc_style; ?>images/icon15.png" alt=""></div>
						<p class="name">我的推荐</p>
						<span class="arrow"><img src="<?php echo $pc_style; ?>images/back.png" alt=""></span>
					</a>
				</li>
				<!--<li>
					<a href="<?php echo Yii::$app->urlManager->createUrl('user/accountset');?>">
						<div class="icon"><img src="<?php echo $pc_style; ?>images/icon14.png" alt=""></div>
						<p class="name">账户设置</p>
						<span class="arrow"><img src="<?php echo $pc_style; ?>images/back.png" alt=""></span>
					</a>
				</li>-->
			</ul>
		</div>
		<div class="list">
			<ul>
				<li>
					<a href="<?php echo Yii::$app->urlManager->createUrl('user/useraddresslist');?>">
						<div class="icon"><img src="<?php echo $pc_style; ?>images/dizhi.png" alt=""></div>
						<p class="name">收货地址</p>
						<span class="arrow"><img src="<?php echo $pc_style; ?>images/back.png" alt=""></span>
					</a>
				</li>
				<li>
					<a href="<?php echo Yii::$app->urlManager->createUrl('user/safecenter');?>">
						<div class="icon"><img src="<?php echo $pc_style; ?>images/anquan.png" alt=""></div>
						<p class="name">安全中心</p>
						<span class="arrow"><img src="<?php echo $pc_style; ?>images/back.png" alt=""></span>
					</a>
				</li>
				<!-- <li>
					<a href="<?php //echo Url::toRoute("aboutus");?>">
						<div class="icon"><img src="<?php //echo $pc_style; ?>images/icon16.png" alt=""></div>
						<p class="name">关于我们</p>
						<span class="arrow"><img src="<?php //echo $pc_style; ?>images/back.png" alt=""></span>
					</a>
				</li> -->
				<!--<li class="quite">
					<a href="#">
						<div class="icon"><img src="<?php //echo $pc_style; ?>images/icon18.png" alt=""></div>
						<p class="name">退出登录</p>
						<span class="arrow"><img src="<?php //echo $pc_style; ?>images/back.png" alt=""></span>
					</a>
				</li>-->
			</ul>
		</div>	
		<div class="tuichudenglu quite">
			<a href="###">
				退出登录
			</a>
		</div>	
	</div>
	<footer>
		<ul>
			<li class="nowpage">
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['index/index']);?>">
					<div><img src="<?php echo $pc_style; ?>images/shouye-ct.png" alt=""></div>
					<p>三界商城</p>
				</a>				
			</li>
			
			<!--<li>
				<a class="aaa" attr="shang">
					<div><img src="<?php echo $pc_style; ?>images/kefu-ct.png" alt=""></div>
					<p>商家</p>
				</a>
			</li>-->
			<li >
				<a class="aaa" attr="huo">
					<div><img src="<?php echo $pc_style; ?>images/kefutwo.png" alt=""></div>
					<p>发现</p>
				</a>				
			</li>
			<li>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['user/usercenter']);?>">
					<div><img src="<?php echo $pc_style; ?>images/gerenzhongxin-xz.png" alt=""></div>
					<p class="active_t">我的</p>
				</a>
			</li>
			
		</ul>
	</footer>
	<div class="shade"></div>
	<div class="qr_code_box">
		<h3>邀请好友注册，丰厚奖励等你拿</h3>
		<img src="<?php echo $rcode.$data->rcode;?>" alt="">
		<p>微信扫一扫，好友即可注册</p>
		<h4>分享方法：</h4>
		<p>点击微信右上角的【 】按钮，选择【发送给朋友】、【分享到朋友圈】、【分享到手机QQ】或【分享到QQ空间】等均可。</p>
	</div>
	<div class="quite_box">
		<p>你确定要退出吗？</p>
		<div class="quite_button">
			<input class="quite_cansole" type="button" value="取消">
			<input class="quite_sure" type="button" value="确定">
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
<script>
$(".aaa").click(function(){
	if($(this).attr("attr")=='ben'){
		document.cookie = "url="+"<?php echo \Yii::$app->urlManager->createUrl(['life/life_index']);?>"+";path=/";
		location.href = "<?php echo \Yii::$app->urlManager->createUrl(['life/life_index']);?>";
	}else if($(this).attr("attr")=='shang'){
		document.cookie = "url="+"<?php echo \Yii::$app->urlManager->createUrl(['merchant/mindex']);?>"+";path=/";
		location.href = "<?php echo \Yii::$app->urlManager->createUrl(['merchant/mindex']);?>";
	}else if($(this).attr("attr")=='huo'){
		document.cookie = "url="+"<?php echo \Yii::$app->urlManager->createUrl(['help/huodong']);?>"+";path=/";
		location.href="<?php echo \Yii::$app->urlManager->createUrl(['help/huodong']);?>";
	}
})

	/*fastclick解决移动端点击延迟的问题*/
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	}
	/*点击二维码区域*/
	$('.qr_code').click(function(event) {
		$('.shade').show();
		$('.qr_code_box').show();
	});
	$('.qr_code_box').click(function(event) {
		$('.qr_code_box').hide();
		$('.quite_box').hide();
		$('.shade').hide();
	});
	/*点击退出*/
	$(".quite").click(function(event) {
		$('.shade').show();
		$('.quite_box').show();
	});
	$('.quite_cansole').click(function(event) {
		$('.quite_box').hide();
		$('.shade').hide();
	});
    //退出登录
    $('.quite_sure').click(function(event) {
        location.href="<?php echo \Yii::$app->urlManager->createUrl(['user/out']);?>";
    });
 	//超过10000显示w
	$(document).ready(function(){
		obj=$(".fun_money_nub");
		$.each(obj, function() {
			console.log($(this).text()) 
			if($(this).text()>=100000000)  {
				objnub=$(this).text()/100000000;
				$(this).text(objnub.toFixed(4)+"E")
			} 
			 if($(this).text()>=10000){
			 	objnub=$(this).text()/10000;
			 	console.log(objnub)
			 	$(this).text(objnub.toFixed(4)+"w")
			 }                                                     
		});
	});
	//转账点击事件
	 var clickCount = 0;
	$("#zhuangzhang").click(function(){
		if(clickCount==0){
			$("#zhuangzhang").find("ul").show();
			clickCount=1;
			return false;
		}
		if(clickCount==1){
			$("#zhuangzhang").find("ul").hide();
			clickCount=0;
			return false;
		}
	})
	$(document).ready(function(){
		$("#zhuangzhang").find("ul").find("a").eq(0).click(function(){
			window.location.href="<?php echo \Yii::$app->urlManager->createUrl(['user/transfer']);?>"; 
			return false;
		});
		$("#zhuangzhang").find("ul").find("a").eq(1).click(function(){
			window.location.href="<?php echo \Yii::$app->urlManager->createUrl(['user/treasure']);?>"; 
			return false;
		});
	})
//	$("#bar").toggle(
//		  function () {//点击第一次
//		    $.get("__URL__/Index/jajax",function(d){
//		        $("ul.news-list").after(d);
//		    });
//		  },
//		  function () {//点击第二次
//		    $.get("__URL__/Index/jajax",function(d){
//		        $("ul.news-list").after(d);
//		    });
//		  },
//		  function () {//点击第三次
//		    location.href="其他页面.html";    
//		  }
//		);
</script>
</body>
</html>