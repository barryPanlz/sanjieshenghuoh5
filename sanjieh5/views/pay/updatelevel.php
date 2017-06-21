<!DOCTYPE html>
<html lang="zh-CN"> 
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
		<title>升级创业会员</title>
		<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
		<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/upgrade.css" />
		<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	</head>

	<body>
		<div class="screen">
			<header>
				<h1>升级创业会员</h1>
				<a class="u_back" href="javascript:history.go(-1)">返回</a>
			</header>

			<div class="main no_footer_main">

				<!--升级创业会员说明文字-->
				<p class="upgrade_diamond_p">
					普通会员可以推荐普通会员注册，但不享有推荐带来的奖励（系统会自动记录奖励金额明细），当累计金额达到1000元时，您就可以免费自动升级为创业会员了；如果您等不及了，也可以通过直接支付1000元马上升级为创业会员<!--【您当前累计推荐奖励金额为：￥<span>899.00</span>】-->
				</p>

				<!--升级创业会员升级费用-->
				<div class="upgrade_diamond_cost">
					<div class="upgrade_diamond_fee">
						<span> 升级费用 </span>
						<strong> ￥1000 </strong>
						<!--<font> （升级后，您将获得三界宝奖励） </font>-->
					</div>
					<ul class="upgrade_diamond_way">
						<p> 支付方式 </p>
					<!-- 	<li> <img id="upgrade_diamond_way_img1" src="<?php echo $pc_style; ?>images/icon_checkbox_red.png" /> <img src="<?php echo $pc_style; ?>images/zhifubao.png" /> </li> -->
						<li> <img id="upgrade_diamond_way_img2" src="<?php echo $pc_style; ?>images/icon_checkbox.png"/> <img src="<?php echo $pc_style; ?>images/wechat_payment.png"/> <font> 更快更安全 </font> </li>
					</ul>
				</div>

				<div class="u_link_button upgrade_suc_return">
					<a href="<?php echo \Yii::$app->urlManager->createUrl(['wechat/makeorder']);?>">确认升级</a>
				</div>

				<!--会员操作权限-->
				<ul class="upgrade_suc_permis">
					<li> 操作权限 </li>
					<li> 普通会员 </li>
					<li> 创业会员 </li>
				</ul>
				<!-- <ul class="upgrade_suc_odd">
					<li> 充值比例 </li>
					<li> ￥25:100三界石 </li>
					<li> ￥22:100三界石 </li>
				</ul> -->
				<ul class="upgrade_suc_even">
					<li>
						<p> 转账权限 <br />（将三界石转账给平台上其他的账户） </p>
					</li>
					<li> <img src="<?php echo $pc_style; ?>images/red-shibai.png" /> </li>
					<li> <img src="<?php echo $pc_style; ?>images/green-chenggong.png" /> </li>
				</ul>
				<ul class="upgrade_suc_odd">
					<li> 推荐供应商权限 </li>
					<li> <img src="<?php echo $pc_style; ?>images/red-shibai.png" /> </li>
					<li> <img src="<?php echo $pc_style; ?>images/green-chenggong.png" /> </li>
				</ul>
				<ul class="upgrade_suc_even">
					<li>
						<p> 推荐的供应商销售业绩奖励 </p>
					</li>
					<li> <img src="<?php echo $pc_style; ?>images/red-shibai.png" /> </li>
					<li> <img src="<?php echo $pc_style; ?>images/green-chenggong.png" /> </li>
				</ul>
				<ul class="upgrade_suc_odd">
					<li> 推荐店铺权限 </li>
					<li> <img src="<?php echo $pc_style; ?>images/red-shibai.png" /> </li>
					<li> <img src="<?php echo $pc_style; ?>images/green-chenggong.png" /> </li>
				</ul>
				<ul class="upgrade_suc_even">
					<li>
						<p> 推荐的店铺充值时的奖励 </p>
					</li>
					<li> <img src="<?php echo $pc_style; ?>images/red-shibai.png" /> </li>
					<li> <img src="<?php echo $pc_style; ?>images/green-chenggong.png" /> </li>
				</ul>
				<ul class="upgrade_suc_odd">
					<li>
						<p>推荐的普通会员升级为创业会员时的奖励</p>
					</li>
					<li> <img src="<?php echo $pc_style; ?>images/red-shibai.png" /> </li>
					<li> <img src="<?php echo $pc_style; ?>images/green-chenggong.png" /> </li>
				</ul>

				<div class="motai_lose upgrade_diamond_fail" style="display: none;">
					升级失败，请重新操作
				</div>

			</div>

			<!--<footer>
		<ul>
			<li class="nowpage">
				<a href="#">
					<div><img src="<?php echo $pc_style; ?>images/shouye-xuanzhong.png" alt=""></div>
					<p>三界商城</p>
				</a>				
			</li>
			<li>
				<a href="#">
					<div><img src="<?php echo $pc_style; ?>images/weilaishenghuo-ct.png" alt=""></div>
					<p>三界本地</p>
				</a>				
			</li>
			<li>
				<a href="#">
					<div><img src="<?php echo $pc_style; ?>images/kefu-ct.png" alt=""></div>
					<p>商家</p>
				</a>				
			</li>
			<li>
				<a href="#">
					<div><img src="<?php echo $pc_style; ?>images/gouwuche-ct.png" alt=""></div>
					<p>购物车</p>
				</a>				
			</li>
			<li>
				<a href="#">
					<div><img src="<?php echo $pc_style; ?>images/gerenzhongxin-ct.png" alt=""></div>
					<p>我的</p>
				</a>				
			</li>
		</ul>
	</footer>-->

		</div>
		<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script>
		<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
		<script>
			/*fastclick解决移动端点击延迟的问题*/
			if('addEventListener' in document) {
				document.addEventListener('DOMContentLoaded', function() {
					FastClick.attach(document.body);
				}, false);
			}

			//选择支付方式
			// $('.upgrade_diamond_way li').eq(1).click(function() {
			// 	$('#upgrade_diamond_way_img1').attr('src', '<?php echo $pc_style; ?>images/ico1_checkbox_red.png');
			// 	$('#upgrade_diamond_way_img2').attr('src', '<?php echo $pc_style; ?>images/icon_checkbox.png');
   //              //var url = '<?php echo \Yii::$app->urlManager->createUrl(['pay/updatepay']);?>';
   //              var url = '<?php echo \Yii::$app->urlManager->createUrl(['wechat/makeorder/','pay_order'=>'upgrade']);?>'; 
   //              $('.u_link_button a').attr("href", url);
			// });
			$('.upgrade_diamond_way li').eq(0).click(function() {
				$('#upgrade_diamond_way_img1').attr('src', '<?php echo $pc_style; ?>images/icon_checkbox.png');
				$('#upgrade_diamond_way_img2').attr('src', '<?php echo $pc_style; ?>images/icon_checkbox_red.png');
                var url = '<?php echo \Yii::$app->urlManager->createUrl(['wechat/makeorder/','pay_order'=>'upgrade']);?>';
                $('.u_link_button a').attr("href", url);
			});
			$(".u_link_button ").click(function(){
				var imgsrc=$("#upgrade_diamond_way_img2").attr("src");
				console.log(imgsrc);
				if(imgsrc=="../../resources/images/icon_checkbox.png"){
					alert("请选择支付方式");
					return false;
				}
				
			})
		</script>
	</body>

</html>