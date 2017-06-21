<?php
    use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
		<title> 商城-收货地址 </title>
		<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
		<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/shippingaddress.css"/>
		<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>		
		<header>
			<h1>收货地址</h1>
			<!-- <a class="u_back" href="<?php //echo Yii::$app->urlManager->createUrl(['user/usercenter']);?>">返回</a> -->
            <a class="u_back">返回</a>
		</header>
		<div class="main no_footer_main white_main">
			<div class="add_box">		
				<?php if(!empty($lists)){foreach($lists as $key=>$v ){ ?>
		            <div class="address_details">
                    <?php if($v->default == 1){ ?>
                        <p class="address_details_p1" attr="<?php echo $v->address_id; ?>">
                            <img src="<?php echo $pc_style; ?>images/icon_checkbox_red.png" id="u_checkbox" attr="<?php echo $v->address_id; ?>"/>
                            <span> <?php echo $v->consignee; ?> </span> <em> <?php echo $v->mobile; ?> </em>
                        </p>
                    <?php }else{ ?>
                        <p class="address_details_p1" attr="<?php echo $v->address_id; ?>">
                            <img src="<?php echo $pc_style; ?>images/icon_checkbox.png" id="u_checkbox" attr="<?php echo $v->address_id; ?>"/>
                            <span> <?php echo $v->consignee; ?> </span> <em> <?php echo $v->mobile; ?> </em>
                        </p>
                    <?php }?>
		                
		                <p class="address_details_p2"> <?php echo $v->address; ?> </p>
		            </div>
		            <div class="address_amend">
		                <a href="" class="address_delete">  <img src="<?php echo $pc_style; ?>images/icon31.png"/> <span attr="<?php echo $v->address_id; ?>"> 删除 </span> </a>
		                <a href="<?php echo \Yii::$app->urlManager->createUrl(['user/getaddressbyid','address_id' => $v->address_id]);?>" class="update" arrr_id="<?php echo $v->address_id?>"> <img src="<?php echo $pc_style; ?>images/edit.png"/> <span> 修改 </span> </a>
		                <input type="hidden" value="<?php echo $v->address_id; ?>" id="address_id"/>
		            </div>
		        <div class="address_amend">
		            <li class="default_address"><?php if($v->default == 1){echo"默认地址";}else{echo "";}?> </li>
		        </div>
                <?php } } ?>
		     </div>
	         <div class="u_link_button address_btn"><a href="address"> <img src="<?php echo $pc_style; ?>images/add_white.png"/> 添加地址</a></div>
	    </div>
	   
		
        <div class="error_tip" style="display:none; ">删除成功</div>
	    <!--删除框-->
	    <div class="remove_background" style="display: none;" id="hide">
	    	<div class="remove_box">
		    	<div class="remove_box_content">
		    		确定要删除地址吗？
		    	</div>
		    	<ul class="remove_box_ul">
		    		<li class="call_off"> 取消 </li>
		    		<li class="remove_box_ul_li" id="del"> 确认 </li>
		    	</ul>
		    </div>
	    </div>
        <!--删除成功-->
        <div class="delete_suc_kuang">
           	 删除成功
        </div>
	<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script>
	<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
	<script>
        //保存cookie
        $(".u_back").click(function(){
            //保存当前url
            $.ajax({
                url:"<?php echo Yii::$app->urlManager->createUrl('user/back');?>",
                type:'post',
                dataType:'json',
                success:function(data){
//                        alert(data);
                        if(data.url != ''){
                            location.href=data.url;
                        }else{
//                            history.go(0);
                              location.href="<?php echo Yii::$app->urlManager->createUrl('user/usercenter');?>";
                        }
                },
                error:function(error){
                    alert("error!");
                }
            });
        })
        // 获取修改的收获地址
//        $('.update').click(function(){
//            $.ajax({
//                type: "POST",
//                dataType: "json",
//                url: "<?php //echo Yii::$app->urlManager->createUrl('user/getaddressbyid');?>//",
//                data: {address_id:$(this).attr("arrr_id")},
//                success: function (result) {
//                    if (result.errno ==0){
//                        alret(1);
//                    } else {
//                        alert(result.error);
//                    }
//                }
//            });
//        })
        //修改收货地址
        $('.btn-updateaddress').click(function(){
            var form_ajax = $('.updateaddress').serialize();
            if(regName( $("#update_consignee"),"update")==false){
                return false;
            }
            if(regPhone( $("#update_mobile"),"update")==false){
                return false;
            }
            //console.log(form_ajax);return false;
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?php echo Yii::$app->urlManager->createUrl('user/updateaddress');?>",
                data: form_ajax,
                success: function (result) {
                    if (result.errno ==0)
                    {
                        alert(result.error);
                        location.reload();
                    } else {
                        alert(result.error);
                    }
                },
                error: function(data) {
                    alert("error!");
                }
            });
        });


        //删除
        $("#del").click(function(){
        	$("#del").css("background","#dedede");
            var address_id = $(this).attr("attr");
            $.ajax({
                url:"deladdress",
                data:{'address_id':address_id},
                type:'post',
                dataType:'json',
                success:function(data){
                    if(data.errorCode == 0){
//                      $('#hide').css('display','none');
                        //删除框两秒小时
                        window.setTimeout(function(){
                            $('.delete_suc_kuang').css('display','none');
                            location.href="useraddresslist";//跳转到列表页面
                        }, 2000);
                    }else if(data.errorCode == -15){
                        alert("参数有误");
                        $("#del").css("background","#F01C1C");
                    }else if(data.errorCode == -34){
                        alert("网络繁忙，请稍候重试");
                        $("#del").css("background","#F01C1C");
                    }else if(data.errorCode == -52){
                        alert("地址删除失败");
                        $("#del").css("background","#F01C1C");
                    }
                },
                error:function(error){
                	 $("#del").css("background","#F01C1C");
                    alert("error!");
                }
            });
        });

	    //	fastclick解决移动端点击延迟的问题
		if ('addEventListener' in document) {
		    document.addEventListener('DOMContentLoaded', function() {
		        FastClick.attach(document.body);
		    }, false);
		}
        //删除成功弹框
        function alertmessage(html){
            if(!$('.error_tip').is(":animated")){
                $('.error_tip').show(100, function() {
                    $('.error_tip').html(html);//这里输入要提示的内容
                    $('.error_tip').animate({
                        opacity: 1
                    },1000, function() {
                        window.setTimeout(function(){
                            $('.error_tip').animate({
                                    opacity: 0
                                },
                                1000, function() {
                                    $('.not_empty').hide();
                                });
                        }, 2000)
                    });
                });
            }
        }
		//图片改变
		$('.address_details').click(function(){
    		 if( $(this).find('img').attr('src') == '<?php echo $pc_style; ?>images/icon_checkbox.png' ){
    			$(this).find('img').attr('src','<?php echo $pc_style; ?>images/icon_checkbox_red.png');
                 $(this).siblings().find('.address_details_p1').find('img').attr('src','<?php echo $pc_style; ?>images/icon_checkbox.png');
             }else{
    		 	$(this).find('img').attr('src','<?php echo $pc_style; ?>images/icon_checkbox.png');
    		 }
            //修改默认地址
            if( $(this).find('img').attr('src') == '../../resources/images/icon_checkbox_red.png' ){
                //alert(1);
                var address_id = $(this).find('p img').attr("attr");
                //alert(address_id);
                $.ajax({
                    url:"<?php echo Yii::$app->urlManager->createUrl('user/moren');?>",
                    data:{'address_id':address_id},
                    type:'post',
                    dataType:'json',
                    success:function(data){
                        //alert(data);
                        if(data.errorCode == 0){
                            if(data.url != ''){
                                location.href=data.url;
                            }else{
                                alert("设置默认地址成功");
                                history.go(0);
//                                location.href="<?php //echo Yii::$app->urlManager->createUrl('user/useraddresslist');?>//";
                            }
                        }
                    },
                    error:function(error){
                        alert("error!");
                    }
                });
            };
            //默认地址结束
	   });


        //点击删除按钮
        $('.address_delete').click(function(){
            $('.remove_background').css('display','block');
            //点击取消按钮
            $("#del").attr("attr",$(this).find("span").attr("attr"));
            $('.call_off').click(function(){
                $('.remove_background').css('display','none');
            });
            return false;
        });
 
		
	</script>
	  
		
	</body>
</html> 
