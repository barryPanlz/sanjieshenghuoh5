<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>账户设置</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/centerlist.css">
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="screen">
	<header>
		<h1>账户设置</h1>

<!--		<a class="u_back" href="javascript:history.go(-1);">返回</a>-->
        <a class="u_back" href="<?php echo Yii::$app->urlManager->createUrl('user/usercenter'); ?>">返回</a>
	</header>
	<div class="main no_footer_main">
		<div class="as_top">
			<div class="as_left">
				<p>安全等级：<span>低</span></p>
				<div class="grade">
					<span class="red"></span>
					<span></span>
					<span></span>
				</div>
<!--                <div class="photo_naodai">-->
<!--                    <img src="--><?php //echo $pc_style; ?><!--images/lvyou5.png" alt="" width="100px">-->
<!--                </div>-->
			</div>
			<ul class="as_right">
				<li>
					<div><img src="<?php echo $pc_style; ?>images/icon29.png" alt=""></div>
					<p class="not_certified">手机未认证</p>
				</li>
				<li>
					<div><img class="email_icon" src="<?php echo $pc_style; ?>images/icon27.png" alt=""></div>
					<p>邮箱未认证</p>
				</li>
				<li>
					<div><img src="<?php echo $pc_style; ?>images/icon28.png" alt=""></div>
					<p>身份未认证</p>
				</li>
			</ul>
		</div>
		<div class="list">
			<ul>
				<li>
					<a href="<?php echo Yii::$app->urlManager->createUrl('supplier/safecenter');?>">
						<div class="icon"><img src="<?php echo $pc_style; ?>images/icon32.png" alt=""></div>
						<p class="name">安全中心</p>
						<span class="arrow"><img src="<?php echo $pc_style; ?>images/back.png" alt=""></span>
					</a>
				</li>
				<!--<li>
					<a href="#">
						<div class="icon"><img src="<?php //echo $pc_style; ?>images/icon30.png" alt=""></div>
						<p class="name">基本信息</p>
						<span class="arrow"><img src="<?php //echo $pc_style; ?>images/back.png" alt=""></span>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="icon"><img src="<?php //echo $pc_style; ?>images/icon33.png" alt=""></div>
						<p class="name">头像管理</p>
						<span class="arrow"><img src="<?php //echo $pc_style; ?>images/back.png" alt=""></span>
					</a>
				</li>-->
<!--				<li>-->
<!--					<a class="save_cookie" href="--><?php //echo Yii::$app->urlManager->createUrl('user/useraddresslist'); ?><!--">-->
<!--						<div class="icon"><img src="--><?php //echo $pc_style; ?><!--images/address.png" alt=""></div>-->
<!--						<p class="name">地址管理</p>-->
<!--						<span class="arrow"><img src="--><?php //echo $pc_style; ?><!--images/back.png" alt=""></span>-->
<!--					</a>-->
<!--				</li>-->
			</ul>
		</div>		
	</div>
</div>

</body>
</html>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script>
<script>
//    $(".save_cookie").click(function(){
//        //保存当前url
//        var url = self.location.href;
//        document.cookie = "url="+url+";path=/";
//        location.href = "<?php //echo Yii::$app->urlManager->createUrl('user/useraddresslist'); ?>//";
//    })
</script>