<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>兑换</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/storetransfer.css"/>
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	<style>
            .page_book {
                width: 60%;
                margin: .2rem auto;
                display: block;
                font-size: 0;
                clear: both;
                margin-bottom: 2.2rem;
            }
            .page_book a {
                float: left;
            }
            .page_book .two_child{
                margin-left: 0.4rem;
            }
            .page_book a {
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
			    margin-left:0.2rem
            }

        </style>
</head>
<body>
<div class="screen">
	<header>
		<h1>兑换</h1>
		<a class="u_back" href="javascript:history.go(-1);">返回</a>
	</header>
	<div class="main no_footer_main">
		<!--普通会员信息--> 
	   <div class="u_list">
		<ul>
			<li>
				<div><img src="<?php echo $pc_style; ?>images/icon13.png" alt=""></div>
				<h4>账户余额</h4>
				<span><?php echo empty($oneuser->money)?'0':$oneuser->money; ?></span><span class="b">元</span>
			</li>
			<li>
				<div><img src="<?php echo $pc_style; ?>images/icon16.png" alt=""></div>
				<h4>我的身份</h4>
				<span >
					<?php if($user_data->user_type == '1') { 
                  	    echo "普通会员"; 
                    }else if($user_data->user_type == '2'){
                        echo "创业会员";
                    }else if($user_data->user_type == '3'){
                        echo "店铺";
                    }else if($user_data->user_type == '4'){
                        echo "供应商";
                    }else if($user_data->user_type == '5'){
                        echo "代理商";
                    }?>
				</span>
			</li>
			<li>
				<div><img src="<?php echo $pc_style; ?>/images/icon19.png" alt=""></div>
				<h4>兑换比例</h4>
				<span>￥19.8=100个三界石</span> 
				<!--<span><?php echo empty($oneuser->exchange_rate)?'0':$oneuser->exchange_rate; ?></span>-->
			</li>
		</ul>
	 </div>
	  
	  <!--店铺转账金额-->
	  <div class="store_tranfer_sum" >
	  	<div class="store_tranfer_box cash_box">
	  		<span> 原始货币</span>
	  		<input type="text" name=""  value="人民币" readonly="readonly"/>
	  	</div>
	  	<div class="store_tranfer_box cash_box">
	  		<span> 兑换数额</span>
	  		<input type="number" name="" id="money" class="store_border"  placeholder="输入你要兑换的币种数额" />
	  	</div>
	  	<div class="store_tranfer_box cash_box">
	  		<span> 目标货币</span>
	  		<input type="text" name="" value="三界石" readonly="readonly"/>
	  	</div>	  	
	  	<div class="store_tranfer_box cash_box">
	  		<span> 可兑换</span>
	  		<input type="text" name="" id="revbankaccno" placeholder="输入兑换数额后显示" readonly="readonly" style="border:0"/>
	  	</div>
	  </div>
	  
	  <div class="u_button store_tranfer_btn"><input type="button" value="兑换" id="btn"></div>
	  <ul class="store_tranfer_list store_tranfer_list1">
		<li class="list_title list_title1">
			<p>兑换时间</p>
			<p>目标货币</p>
			<p>兑换数额</p>
		</li>
		
		<?php foreach ($exchange_list->listExchageRecode as $key => $v) { ?>
		<li>
			<p><?php echo empty($v->create_time) ? "0" : substr($v->create_time,0,10);?></p>
			<p><?php echo empty($v->original_currency) ? "0" : $v->original_currency;?></p>
			<p><?php echo empty($v->exchange_num) ? "0" : $v->exchange_num;?></p>
		</li>
		<?php }?>
		
	  </ul>
	  <div class="page_book">
            <!-- <a href="">上一页</a>
            <a href="">下一页</a> -->
            <?php if($page->currentPage >1){ ?>
                <a href="<?php echo \Yii::$app->urlManager->createUrl(['user/exchange1','currentPage' =>$page->currentPage - 1])?>">上一页</a>
            <?php } ?>
            <?php if($page->currentPage < $page->totalPage){ ?>
                <a href="<?php echo \Yii::$app->urlManager->createUrl(['user/exchange1','currentPage' =>$page->currentPage +1])?>">下一页</a>
            <?php }?>
		</div>
	  <div class="motai_succe store_tranfer_suc" style="display:none">
		转账成功
	  </div>

	  <div class="motai_lose store_tranfer_suc" style="display: none;">
		抱歉 当前余额不足
	  </div>
	</div>

</div>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
<script>
    $("#btn").click(function(){
    	var exchange_num = $("#money").val();
    	var result_num = $("#revbankaccno").val();
    	if(exchange_num == ''){
    		alert("请输入兑换数额！");
    		return false;
    	}
    	$.ajax({
            url:"<?php echo Yii::$app->urlManager->createUrl(['user/exchange1']);?>",
            data:{exchange_num:exchange_num,result_num:result_num},
            type:"POST",
            dataType:"json",
            success:function(obj){
                if(obj.errorCode == 0){
                    alert('兑换成功!');
                    window.location.reload();
                }else if(obj.errorCode == -15){
                	alert(obj.message);
                }else if(obj.errorCode == -34){
                	alert('网络繁忙，请稍候重试!');
                }else if(obj.errorCode == -49){
                	alert('兑换失败！');
                }else if(obj.errorCode == -50){
                	alert('余额不足!');
                }else if(obj.errorCode == -60){
                	alert('对不起，只有店铺会员才有此项特权哦!');
                }
            },
            error:function(){
                alert("网络异常");
            }
        })
    	// $("#payform").submit();
    })


	/*fastclick解决移动端点击延迟的问题*/
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	}
	$('#money').blur(function(){
		var money =$('#money').val();
		console.log(money)
		var cont = 100/19.8;
		var jsuan = parseFloat(money*cont).toFixed(4);
		$('#revbankaccno').val(jsuan);
	})
</script>
</body>
</html>