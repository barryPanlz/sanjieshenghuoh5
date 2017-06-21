<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
		<title> 代理商提现 </title>
		<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
		<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/withdrawal.css" />
		<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<div class="screen">
			<header>
				<h1> 提现 </h1>
				<a class="u_back" href="javascript:history.go(-1);">返回</a>
			</header>

			<div class="main no_footer_main">
				<!--供应商信息-->
				<div class="u_list">
					<ul>
						<li>
							<div><img src="<?php echo $pc_style; ?>images/icon13.png" alt=""></div>
							<h4>账户余额</h4>
                            <span ><span>￥</span><span id="zh_money"><?php echo empty($details1)?'':$details1->data->money;?></span></span>
						</li>
						<li>
							<div><img src="<?php echo $pc_style; ?>images/icon16.png" alt=""></div>
							<h4>我的身份</h4>
							<span class="u_degree">
                                <?if(!empty($details1->data->user_type)){
                                    if($details1->data->user_type ==1){
                                        echo "普通会员";
                                    }elseif($details1->data->user_type ==2){
                                        echo "创业会员";
                                    }elseif($details1->data->user_type ==3){
                                        echo "店铺";
                                    }elseif($details1->data->user_type ==4){
                                        echo "供应商";
                                    }elseif($details1->data->user_type ==5){
                                        echo "代理商";
                                    }
                                }?>
                            </span>
						</li>
                        <li>
                            <div><img src="<?php echo $pc_style; ?>images/icon19.png" alt=""></div>
                            <h4>提现额度</h4>
                            <span>￥<?php echo $details1->data->lowlimit ;?>-￥<?php echo $details1->data->uplimit ;?>/次</span>
                        </li>
					</ul>
				</div>
<!--供应商提现方式-->
                <div class="supplier_withdrawal_style">
                    <h5 class="supplier_withdrawal_style_h5"> 提现金额 </h5>
                    <input class="supplier_withdrawal_style_num" type="number" name=""  id="money" placeholder="输入金额(元)"/>
                    <h5 class="supplier_withdrawal_style_h5"> 提现账号 </h5>
                    <li style="margin-top: 0">
                        <select name="revorgname" id="names" style="float:left;width:5.7rem;">
                            <option value="">请选择账号</option>
                            <?php if(!empty($details2->withdrawalAcclist)){
                                foreach($details2->withdrawalAcclist as $re){ ?>
                                    <option value="<?php echo $re->pay_type ;?>"><?php echo $re->acc_name?></option>
                                <?php } } ?>
                        </select>
                    </li>
                </div>

				<div class="u_button supplier_withdrawal_btn"><input type="button" value="确认提现" id="acOrder"></div>
				<p class="supplier_withdrawal_p supplier_withdrawal_p1"> 提现流程：用户发起——>填写提现账号信息——>平台审核——>平台打款——>资金到账。 </p>
				<p class="supplier_withdrawal_p"> 到账时间：1-2个工作日，遇周末、节假日则自动顺延。 </p>
				<p class="supplier_withdrawal_p supplier_withdrawal_p2"> 客服咨询：400-0680-1628 </p>
                <ul class="store_tranfer_list">
                    <li class="list_title">
                        <p>提现时间</p>
                        <p>金额（元）</p>
                        <p>状态</p>
                    </li>
                    <?php if(!empty($datalist->withDrawalList)){ foreach ($datalist->withDrawalList as $key => $list) { ?>
                        <li>
                            <p><?php echo empty($list->txdate) ? "0" : substr($list->txdate,0,10); ?></p>
                            <p><?php echo empty($list->txamnt) ? "0" : $list->txamnt; ?></p>
                            <p><?php echo empty($list->status) ? "0" : $list->status; ?></p> 
                        </li>
                    <?php } }?>
                  </ul>
                  <div class="page_book">   
                    <?php if($page->currentPage >1){ ?>
                        <a href="<?php echo \Yii::$app->urlManager->createUrl(['user/withdrawal','currentPage' =>$page->currentPage - 1])?>">上一页</a>
                    <?php } ?>
                    <?php if($page->currentPage < $page->totalPage){ ?>
                        <a class="two_child" href="<?php echo \Yii::$app->urlManager->createUrl(['user/withdrawal','currentPage' =>$page->currentPage +1])?>">下一页</a>
                    <?php }?>
                 </div>

			</div>
		</div>
		<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script>
		<!-- <script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script> -->
		<script>
            <?php if(empty($details2->withdrawalAcclist)){ ?>
            alert("请先保存提现账户");
            location.href="<?php echo \Yii::$app->urlManager->createUrl(['agent/withdrawalset'])?>";

            <?php  }?>
            // 确认提现
            $("#acOrder").click(function(){
                var money = $("#money").val();
                if(money == ''){
                    alert("请输入提现金额！");
                    // $("#acOrder").attr("disabled", "disabled");
                    return false;
                }
                var paytype = $('#names').val();
                if(paytype == '1'){
                    <?php if(!empty($details2->withdrawalAcc->alipay_account)) { ?>
                    var revbankaccno = "<?php echo $details2->withdrawalAcc->alipay_account;?>";

                    <?php } ?>
                    //   var name = $("#name1").val();
                }else if(paytype == '3'){
                    <?php if(!empty($details2->withdrawalAcc->bank_account)) { ?>
                    var revbankaccno = "<?php echo $details2->withdrawalAcc->bank_account;?>";
                    <?php } ?>
                    var revorgname = "<?php echo empty($details2->withdrawalAcc->bank_name) ? '' : $details2->withdrawalAcc->bank_name ;?>";
                }else if(paytype == '2'){
                    <?php if(!empty($details2->withdrawalAcc->wechat_account)) { ?>
                    var revbankaccno = "<?php echo $details2->withdrawalAcc->wechat_account;?>";
                    <?php } ?>
                }
                $.ajax({
                    url:"<?php echo \Yii::$app->urlManager->createUrl(['agent/withdrawal']);?>",
                    data:{
                        "money":money,
                        "revorgname":revorgname,
                        "revbankaccno":revbankaccno,
                        "paytype":paytype
                    },
                    type:"post",
                    dataType:"json",
                    success:function(data){
                        if(data.errorCode == 0){
                            location.href="<?php echo Yii::$app->urlManager->createUrl('supplier/withdrawalsuc');?>";
                        }else if(data.errorCode == -2){
                            alert("登录超时，请重新登录");
                            location.href('<?php echo \Yii::$app->urlManager->createUrl(['index/login'])?>');
                        }else if(data.errorCode ==-15){
                            alert(data.message);
                        }else if(data.errorCode ==-34){
                            alert("网络繁忙，请稍后重试");
                        }else if(data.errorCode ==-41){
                            alert("无提现权限");
                        }else if(data.errorCode ==-43){
                            alert("提现金额超出单次上限，请重新输入");
                        }else if(data.errorCode ==-50){
                            alert("余额不足,无法提现");
                        }else if(data.errorCode ==-44){
                            alert("提现金额低于单次下限，请重新输入");
                        }else if(data.errorCode ==-100){
                            alert("您的上笔提现订单火速处理中，请等待处理完毕再进行此操作！");
                        }
                    },
                    error:function(){
                        alert("1错误");
                    }
                });
            });
		</script>
	</body>

</html>