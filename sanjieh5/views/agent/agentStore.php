<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>我辖区的店铺</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/common.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/myaccountant.css" />
		<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>

	</head>

	<body>
		<header>
			<h1>我辖区的店铺</h1>
			<a class="u_back" href="javascript:history.go(-1)">返回</a>
		</header>
		<div class="main no_footer_main">
			<div class="b_box store_box">
				<ul>
					<li class="border_active">
						<p class="txt">辖区店铺数</p>
						<p class="num"><span><?php echo empty($res->areaStoreNum) ? "0" : $res->areaStoreNum?></span></p>
					</li>
					<li>
						<p class="txt">销售业绩（三界石）</p>
						<p class="num"><span><?php echo empty($res->areaStoreSalesAmount) ? "0" : $res->areaStoreSalesAmount?></span></p>
					</li>
				</ul>
			</div>

			<div class="acc_box">
				<div class="z_list z_list2">
					<ul class="z_tit">
						<li class="t1">店铺信息</li>
						<li class="j1 z_type">
							<span>所在城市</span>
							<img src="<?php echo $pc_style; ?>images/downarrow.png" />
							<div class="m_box m_type" id="m_type">
<!--								<span></span>-->
<!--								<div class="all">全部</div>-->
<!--								<div>普通会员</div>-->
<!--								<div>钻石会员</div>-->
<!--								<div>店铺会员</div>-->
<!--								<div>供应商</div>-->
							</div>
						</li>
						<li class="s1 li_rank">
							销售业绩
						</li>
						<li class="s2">注册时间</li>
					</ul>
				</div>

				<div class="z_li g_li">
                    <?php foreach($storelist as $key=>$val){ ?>
					<ul>
						<li class=""><?php echo empty($val->store_name) ? "无" : $val->store_name?></li>
						<li class=""><?php echo empty($val->city) ? "无" : $val->city?></li>
						<li class=""><?php echo empty($val->total_amount) ? "0" : $val->total_amount?></li>
						<li class=""><span><?php echo empty($val->reg_time) ? "0" : substr($val->reg_time,0,10);?></span></li>
					</ul>
                    <?php } ?>
				</div>

			</div>
		</div>
		<script src="<?php echo $pc_style; ?>js/lib/zepto.min.js" type="text/javascript" charset="utf-8"></script>
		<!--<script src="../../js/lib/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>-->

		<script>
			$(function() {
				$('.z_type span').click(function() {
					$('.m_type').show();
				})
				$('.m_type').children('div').click(function() {
					$(this).parent('.m_type').hide();
				})
			})
		</script>
	</body>

</html>