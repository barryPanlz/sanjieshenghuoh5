<?php 
use frontend\assets\LayoutsLib;
$new = new LayoutsLib();
$pc_style = $new->pc_style;
?>

<footer>
		<ul>
			<li class="nowpage">
				<a href="#">
					<div><img src="<?php echo $pc_style; ?>images/shouye-xuanzhong.png" alt=""></div>
					<p class="active_t">三界商城</p>
				</a>				
			</li>
			<li>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['life/life_index']);?>">
					<div><img src="<?php echo $pc_style; ?>images/weilaishenghuo-ct.png" alt=""></div>
					<p >三界本地</p>
				</a>				
			</li>
			<li>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['merchant/chosecity']);?>">
					<div><img src="<?php echo $pc_style; ?>images/kefu-ct.png" alt=""></div>
					<p>商家</p>
				</a>
			</li>
			<li>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['help/huodong']);?>">
					<div><img src="<?php echo $pc_style; ?>images/kefutwo.png" alt=""></div>
					<p>发现</p>
				</a>				
			</li>
			<li>

				<a href="<?php echo \Yii::$app->urlManager->createUrl(['user/usercenter']);?>">
					<div><img src="<?php echo $pc_style; ?>images/gerenzhongxin-ct.png" alt=""></div>
					<p>我的</p>
				</a>				
			</li>
		</ul>
	</footer>

 			