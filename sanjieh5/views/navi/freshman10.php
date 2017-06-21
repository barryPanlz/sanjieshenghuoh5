<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>未来商城首页</title>
	<link rel="stylesheet" href="<?php echo $pc_style;?>css/navi/wapreset.css">
 	<script src="<?php echo $pc_style;?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
	<div class="w_wrap">
		<div class="w w11">
       		<img src="<?php echo $pc_style;?>images/navi/bai11.png" usemap="#Map"/>
            <map name="Map">
              <area shape="rect" coords="81,180,246,217" href="<?php echo \Yii::$app->urlManager->createUrl(['navi/freshman','page'=>$navi_page]);?>">
              <area shape="circle" coords="260,53,8" href="<?php echo Yii::$app->urlManager->createUrl('index/index')?>">
            </map>
		</div>
	</div>
</body>
</html>	
	
	
	
	
	 
