<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title> 红包被抢光了页面 </title>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/hongbao/reset.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/hongbao/hongbao.css"/>
		<script src="<?php echo $pc_style; ?>js/hongbao/rem.js" type="text/javascript" charset="utf-8"></script>
	</head>

	<body>
		
		<img class="hbBanner" src="<?php echo $pc_style; ?>images/banner.png"/>
		
		<img class="none_img" src="<?php echo $pc_style; ?>images/none.png"/>
		
		<h2 class="get_h2"> 红包被抢光了，感谢您的参与 </h2> 
		
		<p class="none_p none_p1"> 亲，别气馁，我们准备 </p>
		<p class="none_p"> 了秒杀活动，更多优惠等着您哦 </p>
		
		<a class="get_a1" href="<?php echo Yii::$app->urlManager->createUrl('index/index');?>"> 去买东西 </a>
		
		<!--红包领取情况-->
		<ul class="situation">
			<li> 已领取<span><?php echo empty($redlist1)?" 0":$redlist1->total_assign_num - $redlist1->lucky_num; ?></span>/<strong><?php echo empty($redlist1)?" 0":$redlist1->total_assign_num; ?></strong>个，
                共<span><?php echo empty($redlist1)?" 0":$redlist1->total_money - $redlist1->remain_money; ?></span>/<strong><?php echo empty($redlist1)?" 0":$redlist1->total_money; ?></strong>个三界石 </li>
			<li>

			<?php if(!empty($goodslist)){ foreach ($goodslist as $key => $v) { ?>
			
				<font><?php echo substr_replace($v->mobile_phone,'****',3,4)?></font>
				<i> 已领取 </i> 
				<em> <?php echo $v->lucky_amnt; ?>个三界石  </em> 
			<?php } }?>
				
			</li> 
		</ul>
		
		 
		
		<script src="<?php echo $pc_style; ?>js/hongbao/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			 
            var phone = $(".situation_font").html(); 
            var mphone =phone.substr(3,4);
            var lphone = phone.replace(mphone,"****");
             $(".situation_font").html(lphone); 
             
             
             
		</script>
		
	</body>
</html>
