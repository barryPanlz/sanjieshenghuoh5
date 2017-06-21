<!DOCTYPE html>
<html>
	<head>  
		<meta charset="UTF-8">
			<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>我的账房</title>
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
			<div class="b_box re_box re_box_d">
				<ul>
					<li class="border_active border_active_d">
						<p class="txt">三界石（余额）</p>
						<p class="num"><?php echo empty($details1)?'':$details1->data->future_currency;?></p>
						<!--<a class="why" href="<?php echo Yii::$app->urlManager->createUrl('user/whatsanjieshi');?>">商城积分</a>-->
						<a class="why" href="<?php echo Yii::$app->urlManager->createUrl('user/exchange');?>">兑换人民币</a>
					</li>
					<li>
						<p class="txt">人民币（余额）</p>
						<p class="num"><?php echo empty($details1)?'':$details1->data->money;?></p>
						<!--<a class="why" href="<?php echo Yii::$app->urlManager->createUrl('user/whatsanjiebao');?>">推广奖励SAN</a>-->
						<a class="why" href="<?php echo Yii::$app->urlManager->createUrl('user/exchange1');?>">兑换三界石</a>
					</li>
				</ul>
			</div>
			<div class="z_box">
				<ul>
					<li>
						<a href="<?php echo Yii::$app->urlManager->createUrl('pay/centerpay');?>">充值</a>
					</li>
					<li>

                        <a href="<?php echo Yii::$app->urlManager->createUrl('user/transfer');?>">转账</a>

					</li>
					<li>
						<a href="<?php echo Yii::$app->urlManager->createUrl('user/withdrawal');?>">提现</a>
					</li>
				</ul>
			</div>
			<div class="acc_box">
				<div class="z_d">
					<p>明细账单</p>
				</div>
                <form action="" method='post'>
				<div class="z_list">
					<ul class="z_tit z_tit_store fix">
						<li class="t1">时间</li>
						<li class="j1 z_type">
							<span>交易类型</span>
							<img src="../../resources/images/downarrow.png" />
							<div class="mark">
								<div class="m_box">
									<span></span>
<!--									--><?php //foreach($type_data as $key => $v) { ?>
<!--										<div class="des">--><?php //echo $v->description; ?><!--</div>-->
<!--									--><?php //}?>
								</div>

							</div>
						</li>
						<li class="s1">三界石</li>
						<li class="s3">人民币</li>
					</ul>
				</div>
                </form>
                <?php foreach($acc_data1 as $key=>$val){ ?>
				<div class="z_li z_store_t">
                    <ul>
                        <li class=""><span><?php echo empty($val->caldate) ? "0" : substr($val->caldate,0,10);?></span></li>
                        <li class=""><?php echo empty($val->acc_name) ? "0" : $val->acc_name?></li>
                        <li class="z"><?php echo empty($val->wlbi_amnt) ? "0" : $val->wlbi_amnt?></li>
                        <li class=""><?php echo empty($val->rmb_amnt) ? "0" : $val->rmb_amnt?></li>
                    </ul>
				</div>
				<?php }?>

			</div>
			<div class="page_book">
<!--                <a href="">上一页</a>-->
<!--                <a href="">下一页</a>-->
                <?php if($page->currentPage >1){ ?>
                    <a href="<?php echo \Yii::$app->urlManager->createUrl(['user/genacc','currentPage' =>$page->currentPage - 1])?>">上一页</a>
                <?php } ?>
                <?php if($page->currentPage < $page->totalPage){ ?>
                    <a href="<?php echo \Yii::$app->urlManager->createUrl(['user/genacc','currentPage' =>$page->currentPage +1])?>">下一页</a>
                <?php }?>
			</div>
		</div>
		<footer>
			<div class="z_li z_heji g_lione">
				<ul>
					<li class=""></li>
					<li class="z_li_h">合计</li>
					<li class="z_num "><?php echo empty($subTotal->wlbi_amnt_total) ? "0" : $subTotal->wlbi_amnt_total?></li>
					<!-- <li class="z_num  z_num1"><?php //echo empty($subTotal->wlbao_amnt_total) ? "0" : $subTotal->wlbao_amnt_total?></li> -->
					<li class="z_num z_num1"><?php echo empty($subTotal->rmb_amnt_total) ? "0" : $subTotal->rmb_amnt_total?></li>
				</ul>
			</div>
		</footer>

		<script src="<?php echo $pc_style; ?>js/lib/zepto.min.js" type="text/javascript" charset="utf-8"></script>
		<script>
            //三界时转账
//            $("#sanjieshi").click(function(){
//                $.ajax({
//                    url:"<?php //echo \Yii::$app->urlManager->createUrl(['user/transfer']);?>//",
//
//                    type:'post',
//                    success:function(data){
//                        alert(data);
////                        if(data == 1){
////                            history.go(0);
////                        }else{
////                            alert("网络繁忙，请稍候重试");
////                        }
//                    }
//                });
//            });
            $(".des").click(function(){
                var des = $('.des').text();
                $.ajax({
                    url:"genacc",
                    data:{'des':des},
                    type:'post',
                    success:function(data){
                      //  alert(data);
                        if(data == 1){
                           // history.go(0);
                        }else{
                            alert("网络繁忙，请稍候重试");
                        }
                    }
                });
            });

			$('.z_type span').click(function() {
				$('.m_box').toggle();
			})

			$('.m_box div').click(function() {
				$('.mark .m_box').hide();
			})
		</script>
	</body>

</html>