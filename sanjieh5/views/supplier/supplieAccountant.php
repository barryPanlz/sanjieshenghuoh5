<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>供应商我的账房</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/common.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/myaccountant.css" />
		<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	</head>

	<body>
		<header>
			<h1>我的账房</h1>
			<a class="u_back" href="javascript:history.go(-1)">返回</a>
		</header>
		<div class="main">
			<div class="b_box g_box">
				<ul>
					<li>
						<p class="txt">人民币（余额）</p>
						<p class="num">￥<?php echo empty($details1->money) ? "0" : $details1->money?></p>
					</li>
				</ul>
			</div>
			<div class="z_box g_withdraw">
				<li>
					<a href="<?php echo Yii::$app->urlManager->createUrl('supplier/withdrawal');?>">提现</a>
				</li>
			</div>

			<div class="acc_box">
				<div class="z_d">
					<p>明细账单<span></span></p>
				</div>
				<div class="z_list s_list sup_list">
					<ul class="z_tit">
						<li class="t1">时间</li>
						<li class="j1 z_type">
							<span>交易类型</span>
							<img src="<?php echo $pc_style; ?>images/downarrow.png" />
							<div class="mark">
<!--								<div class="m_box sup_type">-->
<!--									<span></span>-->
<!--									<div>全部</div>-->
<!--									<div>销售业绩</div>-->
<!--									<div>提现</div>-->
<!--								</div>-->
							</div>
						</li>
						<li class="s2">人民币</li>
					</ul>
				</div>
				<div class="z_li s_li">
                    <?php if(!empty($res->data)){foreach($res->data->listPageAcc as $k=>$val){ ?>
					<ul>
						<li class=""><span><?php echo empty($val->caldate) ? "0" : substr($val->caldate,0,10);?></span></li>
						<li class=""><?php echo empty($val->acc_name) ? "0" : $val->acc_name?></li>
						<li class=""><?php echo empty($val->rmb_amnt) ? "0" : $val->rmb_amnt?></li>
					</ul>
                    <?php } }?>
				</div>
			</div>

		</div>
		<footer>
			<div class="z_li z_heji s_li sup_li">
				<ul>
					<li class=""></li>
					<li class="z_li_h">合计</li>
					<li class="z_num "><?php echo empty($res->data->subTotal->rmb_amnt_total) ? "0" : $res->data->subTotal->rmb_amnt_total; ?></li>
				</ul>
			</div>
		</footer>

		<script src="<?php echo $pc_style; ?>js/lib/zepto.min.js" type="text/javascript" charset="utf-8"></script>
		<script>
			$('.z_type span').click(function() {
				$('.sup_type').show();
			})
			$('.li_rank').click(function() {
				$('.m_rank').show();
			})
			$('.sup_type').children('div').click(function() {
				$('.sup_type').hide();
			})
		</script>
	</body>

</html>