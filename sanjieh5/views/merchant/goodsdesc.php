<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>商家主页</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	<style type="text/css">
		.jieshao{
			/*width: 100%;*/
			font-size: 0.24rem;
			color: #282828;
			padding: 0.3rem;
			background: #f6f6f6;
		}
		.jieshao p{
			background: #f6f6f6 !important;
		}
		.jieshao div{
			background: #f6f6f6 !important;
		}
		.jieshao span{
			background: #f6f6f6 !important;
		}
	/*	header{
			background: #12ac9f;
		}*/
	</style>
</head>
<body>
<div class="screen">
	<header>
		<h1>店铺介绍</h1>
		<a class="u_back" href="javascript:window.history.go(-1);">返回</a>
	</header>
	<div class="main no_footer_main">
		<div class="jieshao">
			<?php echo empty($lists->storeDesc)?"无店铺介绍":$lists->storeDesc; ?>
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
</html>