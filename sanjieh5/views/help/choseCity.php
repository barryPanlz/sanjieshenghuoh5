<?php
    use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>选择城市</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css"> 
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/merchant/recruitment.css"> 
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $pc_style; ?>js/lib/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script> 
 
</head> 
<body>
<div class="screen">
	
	<div class="chooseTotal">
	<form action="<?php echo Yii::$app->urlManager->createUrl(['help/huodong']);?>" method="post" id="tijiao">
		<div class="cityBox">
			<div class="citys">
				<p> 选择您当前所在的城市，其他城市的朋友可以选择任意一个进入体验。 </p>
				<!-- <li> <img src="<?php //echo $pc_style; ?>images/icon_radio_red.png" alt="">  <span> 河北·邢台 </span>  </li>
				<li> <img src="<?php //echo $pc_style; ?>images/icon_radio.png" alt="">  <span> 江西·抚州 </span>  </li>
				<li> <img src="<?php //echo $pc_style; ?>images/icon_radio.png" alt="">  <span> 河南·商丘 </span>  </li> -->
				<input type="hidden" id="cityid"  name="city">
				<?php $i = 1; if(!empty($lists)){ foreach ($lists->getDistributeStoreInfo as $key => $v) { ?>
					<li> <img src="<?php echo $pc_style; ?>images/<?php if($i == 1){ echo "icon_radio_red";}else{ echo "icon_radio";}?>.png" alt="">  <span> <?php echo $v->province; ?>·<?php echo $v->city_name; ?></span>  <input class="input" type="hidden" value="<?php echo $v->city; ?>"></li>
					
				<?php $i++;} } ?>
			</div>
			<div class="btns">
				<span id=""> 取消 </span>
				<span class="btns_confirm"> 确认 </span>
			</div>
		</div>
	</form>
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
	};
	//点击确认
	$(".btns_confirm").click(function(){
		$('#tijiao').submit();
	})
	
	
   //点击切换城市
   $('.citys li').click(function(){
   	 var index = $(this).index();
   	 $(this).find('img').attr('src','../../resources/images/icon_radio_red.png');
   	 $(this).siblings().find('img').attr('src','../../resources/images/icon_radio.png');
   	 $("#cityid").val($(this).find('.input').val())
   	 console.log($(this).find('.input').val())
   });
	
	
	
	
	
	
	
</script>
 
</body>
</html>	
	
	
	
	
	 
