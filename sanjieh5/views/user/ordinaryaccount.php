<!DOCTYPE html>
<html> 
	<head>
		<meta charset="UTF-8">
		<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>我的账单</title>
		<link rel="stylesheet" type="text/css" href="../../resources/css/common/reset.css" />
		<link rel="stylesheet" type="text/css" href="../../resources/css/common/common.css" />
		<link rel="stylesheet" type="text/css" href="../../resources/css/private/myaccount.css" />
		<script src="../../resources/js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
		<style>
			.page_book {
			    width: 60%;
			    margin: .2rem auto;
			    display: block;
			    font-size: 0;
			    clear: both;
			}
			.page_book a:first-child {
                float: left;
            }
			.page_book a {
				float: left;
			    height: .4rem;
			    width: 1.2rem;
			    font-size: .20rem;
			    color: #db210c;
			    border: 1px solid #db210c;
			    border-radius: 3px;
			    background: #fff;
			    text-align: center;
			    line-height: .4rem;
			    float: left;
			    margin-left:0.6rem ;
			}
			.store_tranfer_box  .store_border{
				border: 1px solid #dedede;;
			}
		</style>
	</head>
	<body>
		<header>
			<h1>我的账单</h1>
			<a class="u_back" href="<?php echo Yii::$app->urlManager->createUrl('user/usercenter');?>">返回</a>
		</header>
		<div class="main no_footer_main">
			<div class="main_tit">
				<h3>账单合计</h3>
			</div>
			<div class="money_box">
			<?php if($details1->data->user_type == '1'){ ?>
				<ul >
					<li>
						<p>三界石</p>
						<span class="oonub"><?php echo empty($subTotal->wlbi_amnt_total) ? "0" : $subTotal->wlbi_amnt_total?></span>
					</li>
					<li>
						<p>人民币</p>
						<span class="oonub"><?php echo empty($subTotal->rmb_amnt_total) ? "0" : $subTotal->rmb_amnt_total?></span>
					</li>
				</ul>
			<?php }else if($details1->data->user_type == '2'){ ?>
				<ul >
					<li>
						<p>三界石</p>
						<span class="oonub"><?php echo empty($subTotal->wlbi_amnt_total) ? "0" : $subTotal->wlbi_amnt_total?></span>
					</li>
					<li>
						<p>三界宝</p>
						<span class="oonub"><?php echo empty($subTotal->wlbao_amnt_total) ? "0" : $subTotal->wlbao_amnt_total?></span>
					</li>
					<li>
						<p>人民币</p>
						<span class="oonub"><?php echo empty($subTotal->rmb_amnt_total) ? "0" : $subTotal->rmb_amnt_total?></span>
					</li>
				</ul>
			<?php }?>
				
			</div>
		    <?php if(!empty($acc_data1)){ foreach($acc_data1 as $key=>$val){ ?>
			<div class="main_tit">
				<h3><?php echo $key; ?></h3>
				<!-- 2017-01-09 14:43:57 -->
			</div>
			<div class="info_box">
			<?php if(!empty($val)){ foreach($val as $key=>$v){ ?>
				<ul class="info_item">
					<li class="one">
						<span><?php echo $v->md_time; ?></span>
						<span><?php echo $v->hi_time; ?></span>
					</li>
					<li class="two">
						<p><?php echo $v->acc_name; ?></p>
						<span><?php if(!empty($v->remark1)){echo $v->remark1;}  ?></span>
					</li>
					<li class="three">
					<?php if($v->wlbao_amnt != '0'){ ?>
						<span class="oonub"><?php echo $v->wlbao_amnt; ?></span><span>三界宝</span>
					<?php }else if($v->rmb_amnt != '0'){ ?>
					<!-- <span>-</span><span>￥</span><span>2000.00</span> -->
						<span>￥</span><span><?php echo $v->rmb_amnt; ?></span>
					<?php }else if($v->wlbi_amnt != '0'){ ?>
						<span class="oonub"><?php echo $v->wlbi_amnt; ?></span><span>三界石</span>
					<?php }?>
					</li>
				</ul>
			<?php } }?>
			</div>
			<?php } }?>
			<div class="page_book">
                <?php if($page->currentPage >1){ ?>
                    <a href="<?php echo \Yii::$app->urlManager->createUrl(['user/genacc','currentPage' =>$page->currentPage - 1])?>">上一页</a>
                <?php } ?>
                <?php if($page->currentPage < $page->totalPage){ ?>
                    <a href="<?php echo \Yii::$app->urlManager->createUrl(['user/genacc','currentPage' =>$page->currentPage +1])?>">下一页</a>
                <?php }?>
			</div>
			
		</div>
		<script src="<?php echo $pc_style; ?>js/lib/zepto.min.js" type="text/javascript" charset="utf-8"></script>
		<script>
           if($('.money_box ul li').length == 2){
              $('.money_box ul li').css( 'width','50%' );   
           }else{
           	  $('.money_box ul li').css( 'width','33.33%' );   
           };
           var oonub=$(".oonub");
           $.each(oonub, function() {   
           		if($(this).text()>=10000){
           			var onubo=$(this).text()/10000;
           			console.log(onubo.toFixed(4)+"万");
           			$(this).text("+"+onubo.toFixed(4)+"万");
           		}
           		if($(this).text()<=-10000){
           			var onubo=$(this).text()/10000;
           			console.log(onubo.toFixed(4)+"万");
           			$(this).text(-onubo.toFixed(4)+"万");
           		}
           		if($(this).text()>=100000000){
           			var onubo=$(this).text()/100000000;
           			console.log(onubo.toFixed(4)+"亿");
           			$(this).text("+"+onubo.toFixed(4)+"亿");
           		}
           		if($(this).text()<=-100000000){
           			var onubo=$(this).text()/100000000;
           			console.log(onubo.toFixed(4)+"亿");
           			$(this).text(-onubo.toFixed(4)+"亿");
           		}                                            
           });
           
		</script>
	</body>

</html>