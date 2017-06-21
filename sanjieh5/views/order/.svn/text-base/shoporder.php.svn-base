<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>我的订单</title>
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/shoporder.css"/>

</head>
<body>
<div class="screen">
	<header>
		<a class="u_back" href="javascript:history.go(-1);">列表</a>
		<h1>我的订单</h1>
<!--		<a class="u_search u_shuaxin" href="dianpuorder.html">搜索</a>-->
	</header>
	<div class="main no_footer_main">
		<div class="sor_top">
			<a class="color_red" href=""><span>全部（</span><span><?php echo !empty($order_num)?$order_num['total']:0; ?></span><span>）</span></a>
			<a href=""><span>待付款（</span><span><?php echo !empty($order_num)?$order_num['wait_pay']:0; ?></span><span>）</span></a>
			<a href=""><span>待收货（</span><span><?php echo !empty($order_num)?$order_num['wait_receipt']:0; ?></span><span>）</span></a>
			<a href=""><span>已完成（</span><span><?php echo !empty($order_num)?$order_num['complete']:0; ?></span><span>）</span></a>
		</div>
		<div class="sor_center">
            <?php if(!empty($goodslist)) {
                foreach($order as $v){ ?>
                    <div class="sor_ce_order">
                        <div class="sor_ce_order_top">
                            <span>订单号：</span>
                            <span><?php echo $$v['order_no']; ?></span>
                            <span><?php echo $$v['add_time']; ?></span>
                        </div>
                        <ul class="sor_ce_order_ul">
                            <?php $num = 0;$money=0;
                            foreach($v['goodlist'] as $g){ ?>
                                <li>
                                    <a href="#">
                                        <img src="<?php echo $g['goods_name'];?>"/>
                                        <div class="sor_ce_li_right">
                                            <p><?php echo $g['goods_name'];?></p>
                                            <p class="sor_ce_li_p2">
                                                <span>颜色：</span>
                                                <span>白色</span>
                                                <span>尺码</span>
                                                <span>38</span></p>
                                            <p class="sor_ce_li_p3">
                                                <span><?php echo $g['pay_price'];?></span>
                                                <span>三界石</span>
                                                <span>数量 x<i><?php echo $g['goods_number'];?></i></span>
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <?php
                                $num += $g['goods_number']; // 计算总数量
                                $money += $g['pay_price']*$g['goods_number']; // 计算总数量
                                ?>
                            <?php } ?>
                        </ul>
                        <div class="sor_ce_order_bottom">
                            <p>
                                <span>共</span>
                                <i><?php echo $num; ?></i>
                                <span>件商品，合计：</span>
                                <i class="big_i"><?php echo $money; ?></i>
                                <span>三界石</span>
                            </p>
                            <li>
    						<span>
    							<i>待付款</i>
    							<button>付款</button>
    						</span>
                            </li>
                        </div>
                    </div>
                <?php } } ?>

		</div>
	</div>
</div>
<div class="sr_model_wrap">
	<div class="sr_model_wrap1">
		<div class="sr_model">
			<li>确定发货？</li>
			<li class="sr_model_li">
				<span>快递公司</span>
				<select name="">
					<option value="">请输入快递公司</option>
					<option value="">圆通</option>
					<option value="">申通</option>
					<option value="">韵达</option>
				</select>
			</li>
			<li class="sr_model_li">
				<span>快递单号</span>
				<input type="number" name="" id="" value="" placeholder="请输入快递单号" />
			</li>
		</div>
		<li class="sr_model_sub_wrap">
			<button>
				取消
			</button>
			<button>
				确定
			</button>
		</li>
	</div>
</div>
<script type="text/javascript" src="../../js/lib/zepto.min.js"></script>
<script type="text/javascript" src="../../js/lib/fastclick.js"></script>
<script>
	/*fastclick解决移动端点击延迟的问题*/
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	}

	$(".sor_top").find("a").click(function(){
		$(this).addClass("color_red");
		$(this).siblings().removeClass("color_red");
		return false;
	})
</script>
</body>
</html>