<?php
    use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>个人中心</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/centerlist.css">
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
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
				<h2><?php echo empty($data->user_name)?" 用户昵称":$data->user_name; ?></h2>
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
                <?php if($data->user_type == '1'){ ?>
                    <a href="<?php echo \Yii::$app->urlManager->createUrl(['pay/updatelevel']);?>">[升级创业会员]</a>
                <?php } ?>
			
			</div>
			<div class="qr_code">
				<img src="<?php echo $rcode.$data->rcode;?>" alt="">
				<p>邀请码：<?php echo empty($data->usercode)?" 999999":$data->usercode; ?></p>
			</div>
		</div>
		<div class="menu">
			<ul>
				<li>
					<a href="#">
						<div class="menu_icon">
							<img src="<?php echo $pc_style; ?>images/icon10.png" alt="">
                            <?php if(empty($shop_order->wait_deliver) ){ ?>
                                <i class="tip" style="display:none"></i>
                            <?php }else{ ?>
                                <i class="tip"><?php echo $shop_order->wait_deliver; ?></i>
                            <?php } ?>
						</div>
						<p>待发货</p>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="menu_icon">
							<img src="<?php echo $pc_style; ?>images/icon9.png" alt="">
                            <?php if(empty($shop_order->wait_receipt) ){ ?>
                                <i class="tip" style="display:none"></i>
                            <?php }else{ ?>
                                <i class="tip"><?php echo $shop_order->wait_receipt; ?></i>
                            <?php }?>
						</div>
						<p>已发货</p>
					</a>					
				</li>
			
				<li>
					<a href="<?php echo Yii::$app->urlManager->createUrl('supplier/shoporder');?>">
						<div class="menu_icon">
							<img src="<?php echo $pc_style; ?>images/icon11.png" alt="">
                            <?php if(!empty($shop_order )){ ?>
                                <i class="tip"><?php echo $shop_order->total; ?></i>
                            <?php }?>
						</div>
						<p>我的订单</p>
					</a>
				</li>
			</ul>
		</div>
		<div class="list">
			<ul>
				<li>
					<a href="<?php echo Yii::$app->urlManager->createUrl('supplier/genacc');?>">
						<div class="icon"><img src="<?php echo $pc_style; ?>images/icon13.png" alt=""></div>
						<p class="name">我的账房</p>
						<span class="arrow"><img src="<?php echo $pc_style; ?>images/back.png" alt=""></span>
					</a>
				</li>
				<li>
					<a href="<?php echo Yii::$app->urlManager->createUrl('supplier/accountset');?>">
						<div class="icon"><img src="<?php echo $pc_style; ?>images/icon14.png" alt=""></div>
						<p class="name">账户设置</p>
						<span class="arrow"><img src="<?php echo $pc_style; ?>images/back.png" alt=""></span>
					</a>
				</li>
			</ul>
		</div>
		<div class="list">
			<ul>
				<li>
					<a href="<?php echo Url::toRoute("aboutus");?>">
						<div class="icon"><img src="<?php echo $pc_style; ?>images/icon16.png" alt=""></div>
						<p class="name">关于我们</p>
						<span class="arrow"><img src="<?php echo $pc_style; ?>images/back.png" alt=""></span>
					</a>
				</li>
				<li class="quite">
					<a href="#">
						<div class="icon"><img src="<?php echo $pc_style; ?>images/icon18.png" alt=""></div>
						<p class="name">退出登录</p>
						<span class="arrow"><img src="<?php echo $pc_style; ?>images/back.png" alt=""></span>
					</a>
				</li>
			</ul>
		</div>		
	</div>
	<footer>
		<ul>
			<li>
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
			<li>

				<a class="aaa" attr="huo">
					<div><img src="<?php echo $pc_style; ?>images/kefutwo.png" alt=""></div>
					<p>发现</p>
				</a>				
			</li>
			<li class="<?php echo \Yii::$app->urlManager->createUrl(['user/usercenter']);?>">
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
        location.href="<?php echo \Yii::$app->urlManager->createUrl(['supplier/out']);?>";
    });
</script>
</body>
</html>