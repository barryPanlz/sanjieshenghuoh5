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
		<a class="u_back" href="#" onclick="window.history.go(-1);return false;">返回</a>
	</header>
	<div class="main no_footer_main">
		<div class="succ_top1">
			<p class="tit1"> 抱歉，扫码失败 </p> 
			<p class="text">亲，有可能是网络原因哦 ，重新连一下网络试试呗</p>
		</div>
	    
		<div class="sure_box">
			
			<button type="submit">重新扫码</button>
		</div>
       
	</div>	
</div>
<script src="<?php echo $pc_style; ?>js/lib/zepto.min.js" type="text/javascript" charset="utf-8"></script>
<script>
		$('.sel_way div input').click(function(){
			$('.sel_way div div').removeClass('choose');
			$(this).siblings().addClass('choose');
		})

$(document).ready(function() {
	//转账前 确认获取到了店铺id

	$('.sure').click(function(){
		alert(111);
		return false;

		phone = $('.phone').val();
		$.ajax({
			url:'<?php echo \Yii::$app->urlManager->createUrl(['physical/getstore']);?>',
			type:'post',
			data:{'phone':phone},
			dataType:'json',
			success:function(d){
				$('#txamnt').val($('.txamnt').val());
				if(parseInt(d.errorCode) == 0){
					console.log(d.store_name);
					if(d.store_name==null){
						$('#addr_store').html('暂无店铺信息');
						return false;
					}
					if(parseInt(d.store_id)>0){
						$('#addr_store').html(d.address+d.store_name);
					}else{
						$('#addr_store').html('');
					}
					$('.store_id').val(d.store_id);


				}else{
					$('#addr_store').html('暂无店铺信息');
					$('.store_id').val(0);
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
            var url = '<?php echo \Yii::$app->urlManager->createUrl(['physical/pay']);?>';
        }else if($(this).val() == '2'){ 
            var url = '<?php echo \Yii::$app->urlManager->createUrl(['wechat/makeorder/']);?>';
        }
        $('#payform').attr("action", url);
    })
})

        
		function initAddFormListen(){
			$('#payform').on('submit',function(ev){
				var store_id = $('.store_id').val();
				if(store_id <= 0){
					alert('没有该店铺');
					return false;
				}
                $('#payform').submit();
			});
		}

		//页面加载完毕 , 添加一个监听form提交事件
		initAddFormListen();

</script>
</body>
</html>