<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>物流状态</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	<style type="text/css">
		.wuliu_top{
			width: 100%;
			min-height:1.6rem;
			overflow: hidden;
			margin-top:0.1rem ;
			background: #FFFFFF;
			padding: 0.1rem 0;
		}
		.wuliu_top li{
			width: 100%;
			padding: 0.1rem 0;
			overflow: hidden;
		}
		.wuliu_top li span{
			display: block;
			width: 25%;
			float: left;
			font-size: 0.22rem;
			text-align: center;
			color: #848484;
			text-indent:0.1rem ;
		}
		.wuliu_top li i{
			font-style: normal;
			display: block;
			width: 70%;
			font-size: 0.22rem;
			color: #2828282;
			margin-left:3% ;
			float: left;
		}
		.wuliu_top li .wu_color_red{
			color: #F3001D;
		}
		.wuliu_center{
			width: 100%;
			min-height: 100%;
			height: auto;
			overflow: hidden;
			background: #FFFFFF;
			margin-top: 0.24rem;
			padding: 0.15rem 0;
			position: relative;
		}
		.wuliu_center li{
			width: 90%;
			height: auto;
			overflow: hidden;
			margin: 0 auto;
			border-bottom: 1px solid #DEDEDE;
			padding: 0.15rem 0;
		}
		.wuliu_center li:nth-last-child(1){
			border-bottom:0;
		}
		.wuliu_center li span{
			display: block;
			width: 100%;
			height: auto;
			overflow: hidden;
			color: #848484;
			line-height: 0.42rem;
			font-size: 0.22rem;
		}
		.wuliu_center li i{
			font-style: normal;
			display: block;
			width: 100%;
			height: auto;
			overflow: hidden;
			color: #848484;
			line-height: 0.42rem;
			font-size: 0.22rem;
		}
		/*颜色*/
		.wuliu_center li .wuliu_color_red{
			color: #F3001D;
		}
		.wuliu_center li .wuliu_color_green{
			color: #00ba63;
		}
		.empty_info{
			position: absolute;
			top: 50%;
			margin-top: -50%;
			z-index: 999;
			font-size: 0.22rem;
			width: 100%;
			text-align: center; 
		}
	</style>
</head>
<body>
<div class="screen">
	<header>
		<h1>物流状态</h1>
		<a class="u_back" href="javascript:history.go(-1);">返回</a>
	</header>
	<div class="main no_footer_main">

		<div class="wuliu_top">
			<li>
				<span>物流公司</span>
				<i>
					<?php if(!empty($logistics_name)){
						echo $logistics_name;
					}?>
				</i>
			</li>
			<li>
				<span>快递单号</span>
				<i>
					<?php if(!empty($orderlist)){
						echo $orderlist->nu;
					}?>
				</i>
			</li>
			<li>
				<span>物流状态</span>
				<i class="wu_color_red">
					<?php if(!empty($orderlist)){
						if($orderlist->state == 0){
							echo "在途中";
						}else if($orderlist->state == 1){
							echo "已揽收";
						}else if($orderlist->state == 2){
							echo "疑难";
						}else if($orderlist->state == 3){
							echo "已签收";
						}else if($orderlist->state == 4){
							echo "退签";
						}else if($orderlist->state == 5){
							echo "同城派送中";
						}else if($orderlist->state == 6){
							echo "退回";
						}else if($orderlist->state == 7){
							echo "转单";
						}
					}?>
				</i>
			</li>
		</div>
		<div class="wuliu_center">
		<?php if(!empty($orderlist)){ foreach ($orderlist->data as $key => $v) { ?>
			<li>
				<span><?php echo $v->context; ?></span>
				<i><?php echo $v->time; ?></i>
			</li>
		<?php } }else{ ?>
			<div class="empty_info">
	            该单号暂无物流消息。
	        </div>
		<?php }?>
		</div>
		
		
        

	</div>
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
</script>
</body>
