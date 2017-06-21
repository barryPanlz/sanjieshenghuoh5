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
	<style>
	.border_active{
		border: 1px solid #f3001d;
	}
	 p{
		border: 1px solid #ffffff;
	}
	</style>
</head>
<body>
<div class="screen">
	<header>
		<h1>实体店消费付款</h1>
		<a class="u_back" href="#" onclick="window.history.go(-1);return false;">返回</a>
	</header>
	<div class="main no_footer_main">
		<div class="shiti_box">
			<p>当您在与我们有合作的实体店铺消费时，可以通过此页面付款，即可获得与您消费人民币等额的三界石奖励哦！</p>
		</div>
		<form action="<?php echo \Yii::$app->urlManager->createUrl(['wechat/makeorder']);?>" method="post" id="payform">
		<div  class="form_box">
			<div class="form_in">
                <div>
                    <input class="storeName" type="text" name="phone" placeholder="请输入商家信息"/>
                    <div class="sure" style="top: -0.28rem; text-align: center;line-height: 0.74rem;">确认</div>
                </div>
				<div >
					<img class="money" src="<?php echo $pc_style; ?>images/yang_icon.png" alt="" />
					<input type="text" class="txamnt"  placeholder="请输入消费金额"/>
				</div>
				<ul class="address_box">
					<img src="<?php echo $pc_style; ?>images/address_icon1.png" alt="" />
					<p id="addr_store">  </p>
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
		<input type="hidden" name="store_id" id="store_idjun" class="store_id" value=""/>
		<input type="hidden" name="txamnt"  id="txamnt" value=" "/>
		<input type="hidden" name="pay_order" value="storeline" />
		<div class="sure_box">
			<button type="button">确认支付</button>
		</div>
        </form>
	</div>	
</div>
<script src="<?php echo $pc_style; ?>js/lib/zepto.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $pc_style; ?>js/jQuery.js" type="text/javascript" charset="utf-8"></script>
<script>
		$('.sel_way div input').click(function(){
			$('.sel_way div div').removeClass('choose');
			$(this).siblings().addClass('choose');
		})
$(document).ready(function() {
	//转账前 确认获取到了店铺id
    $(".txamnt").blur(function(){
        $('#txamnt').val($('.txamnt').val());
    });
	$('.sure').click(function(){
		storeName = $('.storeName').val();
		$.ajax({
			url:"<?php echo \Yii::$app->urlManager->createUrl(['physical/getstore']);?>",
			type:'post',
			data:{'storeName':storeName},
			dataType:'json',
			success:function(d){
				if(d.data.storeInfo.length == 0){
					$('#addr_store').html('暂无店铺信息');
					return false;
				}
				if(d.data.storeInfo.length != 0){
					// $('#addr_store').html(d.address+d.store_name);
				//	var objs = jQuery.parseJSON( d.data.storeInfo );
					console.log(d.data.storeInfo);
                    var attrobj = "";
                    $.each(d.data.storeInfo,function(k,v){
                        attrobj += '<p class="junjun"><span>'+v.store_name+'</span><input type="hidden" name="store_id" class="store_id" value='+v.store_id+'></p>';
                        // attrobj += ;
                   });
                    $('#addr_store').html(attrobj);
				}else{
					$('#addr_store').html('');
				}
			},error:function(aa,bb,cc){
				console.log(aa);
				console.log(bb);
				console.log(cc);
			}
		});
	})
    //点击按钮修改提交的方法
    $("input[name='pay_type']").click(function(){
        //支付宝 1  微信  2
        if($(this).val() == '1'){
            var url = "<?php echo \Yii::$app->urlManager->createUrl(['wechat/makeorder']);?>";
        }else if($(this).val() == '2'){
            var url = "<?php echo \Yii::$app->urlManager->createUrl(['wechat/makeorder']);?>";
        }
        $('#payform').attr("action", url);
    })
    //点击选中
    $("#addr_store").delegate(".junjun","click",function(){
    	$(".storeName").val($(this).find("span").html());
		  $(this).addClass("border_active");
		  $(this).siblings().removeClass("border_active");
		 $("#store_idjun").val($(this).find("input").val());
		});
})

			$('.sure_box').click(function(){
				var store_id = $('#store_idjun').val();
				if(store_id == ''){
					alert('请选择店铺名称！');
					return false;
				}
                $('#payform').submit();
			});
		
    	//页面加载完毕 , 添加一个监听form提交事件
    	//initAddFormListen();

</script>
</body>
</html>