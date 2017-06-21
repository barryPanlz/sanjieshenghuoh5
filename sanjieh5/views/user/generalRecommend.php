<?php
    use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
			<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>普通会员我的推荐</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/common.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/myaccountant.css" />
		<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	</head>

	<body>
		<header>
			<h1>我的推荐</h1>
			<a class="u_back" href="javascript:history.go(-1)">返回</a>
		</header>
		<div class="main no_footer_main">
			<div class="b_box b_box1">
				<ul>
					<li  class="border_active">
						<p class="txt">一级推荐</p>
<!--						<p class="num"><span>--><?php //echo empty($refnum->myRefNum->aNum) ? "0" : $refnum->myRefNum->aNum ?><!--</span>人</p>-->
                        <p class="num"><span><?php echo empty($refnum->myRefNum->aNum)?"0":$refnum->myRefNum->aNum; ?></span>人</p>
					</li>
					<li class="border_active">
						<p class="txt">二级推荐</p>
<!--						<p class="num"><span>--><?php //echo empty($refnum->myRefNum->bNum) ? "0" : $refnum->myRefNum->bNum?><!--</span>人</p>-->
                        <p class="num"><span><?php echo empty($refnum->myRefNum->bNum)?"0":$refnum->myRefNum->bNum; ?></span>人</p>
					</li>
					<li>
						<p class="txt">三级推荐</p>
<!--						<p class="num"><span>--><?php //echo empty($refnum->myRefNum->cNum) ? "0" : $refnum->myRefNum->cNum?><!--</span>人</p>-->
                        <p class="num"><span><?php echo empty($refnum->myRefNum->cNum)?"0":$refnum->myRefNum->cNum; ?></span>人</p>
					</li>
				</ul>
			</div>

			<div class="acc_box">
				<div class="z_d">
					<p>推荐记录：&nbsp; (累计贡献值<span><?php echo empty($details1->data->score) ? "0" : $details1->data->score?></span>)</p>
				</div>
				<div class="z_list z_list2">
					<ul class="z_tit">
						<li class="t1">推荐对象</li>
						<li class="j1 z_type">
							<span>身份类型</span>
							<img src="../../resources/images/downarrow.png" />
							<div class="mark">
								<div class="m_box m_type">
<!--									<span></span>-->
<!--									<div>全部</div>-->
<!--									<div>普通会员</div>-->
<!--									<div>创业会员</div>-->
<!--									<div>店铺会员</div>-->
<!--									<div>供应商</div>-->
								</div>
							</div>
						</li>
						<li class="s1 li_rank">
							<span>推荐等级</span>
							<img src="../../resources/images/downarrow.png" />
							<div class="mark" >
<!--								<div class="m_box m_rank">-->
<!--									<span></span>-->
<!--									<div attr="A" class="join">一级</div>-->
<!--									<div attr="B" class="join">二级</div>-->
<!--									<div attr="C" class="join">三级</div>-->
<!--								</div>-->
							</div>
						</li>
						<li class="s2">注册时间</li>
					</ul>
				</div>
			    <?php if(!empty($gen_data)){ foreach($gen_data as $key=>$value){ ?>
				<div class="z_li g_li">
                    <ul>
                        <!-- <li class="">
                            <?php //echo empty($data->user_name)?$value->mobile_phone:$data->user_name; ?>
                        </li> -->
                        <li class=""><?php echo $value->account; ?></li>
                        <li class=""><?php echo $value->user_type; ?></li>
                        <li class=""><?php echo $value->level; ?></li>
                        <li class=""><?php echo substr($value->reg_time,0,10); ?></li>
                    </ul>
				</div>
                <?php  } }?>
			</div>
			<!--            分页-->
			<div class="page_book">
<!--                <a href="">上一页</a>-->
<!--                <a href="">下一页</a>-->
                <?php if($page->currentPage >1){ ?>
                    <a href="<?php echo \Yii::$app->urlManager->createUrl(['user/genrecom','currentPage' =>$page->currentPage - 1])?>">上一页</a>
                <?php } ?>
                <?php if($page->currentPage < $page->totalPage){ ?>
                    <a href="<?php echo \Yii::$app->urlManager->createUrl(['user/genrecom','currentPage' =>$page->currentPage +1])?>">下一页</a>
                <?php }?>
			</div>
		</div>
		<script src="<?php echo $pc_style; ?>js/lib/zepto.min.js" type="text/javascript" charset="utf-8"></script>
		<script>


            	$('.z_type span').click(function() {
				$('.m_type').show();
				$('.m_rank').hide();

			   })


				$('.li_rank span').click(function() {
				$('.m_rank').show();
				$('.m_type').hide();
			  })

			$('.m_type,.m_rank').children('div').click(function() {
				$('.m_box').hide();
			})

		</script>
	</body>

</html>