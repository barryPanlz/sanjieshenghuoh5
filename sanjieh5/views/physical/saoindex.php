<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>实体店铺消费</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>/css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/physical_store.css">
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script> 
</head>
<body>
<div class="screen">
	<header>
		<h1>实体店消费付款</h1>
		<!-- <a class="u_back" href="#" onclick="window.history.go(-1);return false;">返回</a> -->
		<a class="u_back" href="<?php echo \Yii::$app->urlManager->createUrl(['index/index']);?>">返回</a>
	</header>
	<div class="main no_footer_main">
		<div class="shiti_box">
			<p><?php echo $_GET['store_name'];?></p>
		</div>
		<form action="<?php echo \Yii::$app->urlManager->createUrl(['wechat/makeorder']);?>" method="post" id="payform">
		<div  class="form_box">
			<div class="form_in">
				<div >
					<img class="money" src="<?php echo $pc_style; ?>images/yang_icon.png" alt="" />
					<input type="text" class="txamnt" name="txamnt"  placeholder="请输入消费金额" />
					<!-- <button class="sure" >确认</button> -->
				</div>
				<ul class="address_box">
					<p id="addr_store"></p>
				</ul>
			</div>
		</div>
		<div class="sel_tit">
			选择支付方式
		</div>
		<div class="sel_way">
            <div class="weixin">
                <input type="radio" name="pay_type" value="2" checked="checked"/>
                <div>
                    <img  src="<?php echo $pc_style; ?>images/wechat_payment.png" alt="" />
                </div>
            </div>
		<!-- 	<div class="zhifubao">
				<input type="radio" name="pay_type" value="1"/>
				<div>
					<img  src="<?php //echo $pc_style; ?>images/zhifubao.png" alt="" />
				</div>				
			</div> -->
		</div>
		<input type="hidden" name="store_id" class="store_id1" value="<?php echo $_GET['store_id']?>" />
		
		<input type="hidden" name="pay_order" value="storeline" />
		<div class="sure_box">
			<button type="button" id="btn">确认支付</button>
		</div>
        </form>
	</div>	
</div>
<script src="<?php echo $pc_style; ?>js/lib/zepto.min.js" type="text/javascript" charset="utf-8"></script>
<script>
		

var url = self.location.href;
url = document.cookie = "url="+url+";path=/";
$(document).ready(function() {
	//转账前 确认获取到了店铺id
	// $('.sure').click(function(){
	// 	store_id = $('.store_id1').val();
	// 	$.ajax({
	// 		url:'<?php //echo \Yii::$app->urlManager->createUrl(['physical/storeinfo']);?>',
	// 		type:'post',
	// 		data:{'store_id':store_id},
	// 		dataType:'json',
	// 		success:function(d){
	// 			if(d.errorCode == 0){
	// 				$('#addr_store').html('可以消费');

	// 			}else if(d.errorCode == -15){
	// 				$('#addr_store').html('参数错误-为空或格式错误');
	// 				return false;
	// 			}else if(d.errorCode == -18){
	// 				$('#addr_store').html('店铺信息不存在！');
	// 				return false;
	// 			}else if(d.errorCode == -34){
	// 				$('#addr_store').html('网络繁忙，请稍候重试');
	// 				return false;
	// 			}else if(d.errorCode == -91){
	// 				$('#addr_store').html('店铺已关闭，无法支付！');
	// 				return false;
	// 			}
	// 		},error:function(aa,bb,cc){
	// 			console.log(aa);
	// 			console.log(bb);
	// 			console.log(cc);
	// 		}
	// 	});
	// })
    //点击按钮修改提交的方法
    $("input[name='pay_type']").click(function(){
        //支付宝 1  微信  2
        if($(this).val() == '1'){
            var url = '<?php echo \Yii::$app->urlManager->createUrl(['physical/pay']);?>';
        }else if($(this).val() == '2'){ 
            var url = '<?php echo \Yii::$app->urlManager->createUrl(['wechat/makeorder/']);?>';
        }
        $('#payform').attr("action", url);
    })
})


        //光标失去判断验证有两位小数的正实数的金额格式可对
   //      $(".txamnt").blur(function () {
   //       if( (!(/^[0-9]+(.[0-9]{2})?$/.test($(".txamnt").val())) ){
			// 		alert("请输入正确金额格式！");
			// 		return false;
			// } 
   //      })
        $("#btn").click(function(){
        	var money = $(".txamnt").val();
        	if(money == ''){
        		alert("请输入金额！");
        		return false;
        	}
        	var exp = /^([1-9][\d]{0,7}|0)(\.[\d]{1,2})?$/;
		    if(!exp.test(money)){
		   		alert("请输入正确金额格式！");
		   		return false;
		    }
        	$("#payform").submit();
        })


		// function initAddFormListen(){
		// 	$('#payform').on('submit',function(ev){
				 
		// 		var money = $(".txamnt").val();
				
		// 		if(money == ''){
		// 			alert("请输入付款金额！");
		// 			return false;
		// 		}
				
		// 		var store_id = $('.store_id1').val();
		// 		// if(store_id <= 0){
		// 		// 	alert('没有该店铺');
		// 		// 	return false;
		// 		// }
  //               $('#payform').submit();
		// 	});
		// }

		// //页面加载完毕 , 添加一个监听form提交事件
		// initAddFormListen();

</script>
</body>
</html>