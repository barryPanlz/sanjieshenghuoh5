<?php
    use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>商家入驻提交资料</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css"> 
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/merchant/recruitment.css"> 
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $pc_style; ?>js/lib/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>  
</head> 
<body>
	<div class="screen">
		<header>
			<h1>商家入驻</h1>
			<a class="u_back" href="javascript:history.go(-1)">返回</a>
	        <!--<a class="u_back"">返回</a>-->
		</header>
		<div class="main no_footer_main">		 
		 
	      <li class="identity"> 
	      	<span> 申请身份 </span> 
	      	<div class="species"> <div id="species_content"> 请选择申请身份</div>
	      		  <div class="variety">
	      		  	<span data-type='3'> 实体店铺 </span>
	      		  	<span data-type='4'> 产品供应商 </span>
	      		  	<span data-type='5'> 代理商 </span>
	      		  	<!-- <span> 实体店铺 </span>
	      		  	<span> 产品供应商 </span>
	      		  	<span> 代理商 </span> -->
	      		  </div> 
	        </div>
	      	<img class="identity_img" src="<?php echo $pc_style; ?>images/open.png"/>
	      </li>
	      
	      <ul class="merchant_details">
	      	<li class="vendor_name "> <span> 商家名称 </span> <input type="text" name="" id="topic" placeholder="输入您的公司营业执照名称或店铺名称" /> </li>
	      	<li class="in_city"> <span> 所在城市 </span> 
	      	<select name="province" attr="add" id="province">
                <?php foreach($prolist as $v){ ?>
                    <option value="<?php echo $v['provinceid']; ?>"><?php echo $v['province']; ?></option>
                <?php } ?>
            </select>
            <select name="city" attr="add" id="city">
                <?php foreach($city_list as $v){ ?>
                    <option value="<?php echo $v['cityid']; ?>"><?php echo $v['city']; ?></option>
                <?php } ?>
            </select>
            <select name="district" id="district">
                <?php foreach($area_list as $v){ ?>
                    <option value="<?php echo $v['areaid']; ?>"><?php echo $v['area']; ?></option>
                <?php } ?>
            </select>
	      		<!-- <select name="选择省份" >选择省份
	      	    <option value=""> 内蒙古</option>
	      		<option value=""> 上海 </option> 
	      	    </select> 
	      	    <select name="选择省份" value="选择省份">选择省份
	      		<option value=""> 鄂尔多斯 </option>
	      		<option value=""> 上海 </option>
	      	    </select> 
	      	    <select name="选择省份" value="选择省份" >选择省份
	      		<option value=""> 北京 </option>
	      		<option value=""> 上海 </option>
	      	    </select>  -->
	      	</li>
	      	<li> <span> 联系人 </span> <input type="text" name="" id="username" placeholder="输入您的姓名，以便客服联系您"  /> </li>
	      	<li> <span> 电话 </span> <input type="number" name="" id="phone" placeholder="输入手机号" /> </li>
	      	<li> <span> 邀请码 </span> <input type="number" name="" id="parent_usercode" placeholder="输入邀请您注册的朋友的邀请码" /> </li>
	      </ul>
	      
	      <p class="merchant_p"> 邀请码是注册账户时的必填内容，为了保障您的推荐人的权益，请您认真、准确填写他的邀请码，关于会员推荐的具体介绍可参考：<a href="<?php echo Yii::$app->urlManager->createUrl('user/share');?>">《分享邀请》</a> </p>
	      
	      <div class="u_link_button merchant_btn"> 
	      	<!-- <a href="<?php //echo Yii::$app->urlManager->createUrl('merchant/datacomplete');?>" >提交资料</a> -->
	      	<a id="tijiao">提交资料</a>
	      </div>
	      
	      <p class="hotline"> 招商热线：13718649545 </p>
	      <p class="hotline"> 客服热线：010-57210185 </p>
	     
		</div>
		
		 
	</div>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
<script>
	/*fastclick解决移动端点击延迟的问题*/
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	}; 
</script>

<script type="text/javascript">
//获取城市以及城市的第一个区县
    $('select[name="province"]').change(function(e){
   
        var val = $(this).children('option:selected').val();
        var get_type = $(this).attr("attr");
        $.ajax({
            url: "<?php echo Yii::$app->urlManager->createUrl('merchant/get_location');?>",
            data:{parent_id:val,parent_type:'province'},
            type: "post",
            dataType:'json',
            success: function (data) {
                console.log(data);
                if(data.errno=='0'){
                    //console.log(data.errno);
                    var html = '';
                    $.each(data.data,function(i){
                        html += "<option value='"+this.cityid+"'>"+this.city+"</option>";
                    });
                    //添加第一个的区县
                    var area_html = '';
                    $.each(data.area,function(i){
                        area_html += "<option value='"+this.areaid+"'>"+this.area+"</option>";
                    });
                    if(get_type =="update"){
                        $('#update_city').html(html);
                        $('#update_district').html(area_html);
                    }else{
                        $('#city').html(html);
                        $('#district').html(area_html);
                    }
                }else{
                    alert(data.error);
                }
            },
            error:function(error){
                alert("异常！");
            }
        });
    })
    $('#city').change(function(e){
        var val = $(this).children('option:selected').val();
        var get_type = $(this).attr("attr");
        $.ajax({
            url: "<?php echo Yii::$app->urlManager->createUrl('merchant/get_location');?>",
            data:{parent_id:val,parent_type:'city'},
            type: "post",
            dataType:'json',
            success: function (data) {
                if(data.errno=='0'){
                    //添加城市
                    var html = '';
                    $.each(data.data,function(i){
                        html += "<option value='"+this.areaid+"'>"+this.area+"</option>";
                    });
                    if(get_type =="update"){
                        $('#update_district').html(html);
                    }else{
                        $('#district').html(html);
                    }

                }else{
                    alert(data.error);
                }
            },
            error:function(error){
                alert("error!");
            }
        });
    })
    
    
    
   //正则判断
   var switching = 1;  
   $('#topic').blur(function(){ 
   	if( $('#topic').val() == '' ){
  		alert( '公司营业执照或店铺名称为必填项' );
  		switching = 2;
 	}else{
 		switching = 1;
 	};
   });
   
   $('#username').blur(function(){ 
   	if( $('#username').val() == '' ){
  		alert( '你的姓名为必填项' );
  		switching = 2;
 	}else{
 		switching = 1;
 	};
   });
   
   $('#phone').blur(function(){ 
   	if( $('#phone').val() == '' ){
  		alert( '手机号为必填项' );
  		switching = 2;
 	}
 	else if( !/^1(3|4|7|5|8)([0-9]{9})/.test($('#phone').val()) ){
 		alert( '手机号格式不对' );
 		switching = 2;
 	}
 	else{
 		switching = 1;
 	}
   });
   
   $('#parent_usercode').blur(function(){ 
   	if( $('#parent_usercode').val() == '' ){
  		alert( '邀请码为必填项' );
  		switching = 2;
 	}else{
 		switching = 1;
 	};
   });
   
   
   
   
  	//	选择类型
	var user_type;
	var figure = 1;
    $('.identity').on('click',function(){
    	if( $('.variety').css('display') == 'none' ){
    		$('.variety').css('display','block');
    	    $('.variety span').click(function(){
    	    figure = 2;
    	    user_type = $(this).attr('data-type'); 
    	    var index =$(this).index();
            // 判断是否是代理商相应样式改变 
    	    if( index == 2 ){
    	    	$('.vendor_name').css('display','none');
    	    	$('.in_city span').html('代理城市')
    	    }else{
    	    	$('.vendor_name').css('display','block');
    	    	$('.in_city span').html('所在城市')
    	    }
    	    
    	    
    	    
    	     $('#species_content').html( $(this).html() ); 
//  	     $('.variety').css('display','block');
    	   });
    	}else{
    		$('.variety').css('display','none');
    	};
    	
    });
    
    
    //提交资料
    $("#tijiao").click(function(){
//  	 console.log(user_type); 
    if( user_type != 5 ){
    
         if( figure == 2 ){
    	  if( $('#topic').val() != '' ){
    	   if( $('#username').val() != '' ){
    	   	if( $('#phone').val() != '' ){
    	   	 if( $('#parent_usercode').val() != '' ){  
                if( switching == 1){ 
    	   	 	
    	   	    $("#tijiao").attr('disabled','disabled');
		        var topic = $('#topic').val();
		        var provinceid = $('#province').val();
		        var cityid = $('#city').val();
		        var areaid = $('#district').val();
		        var username = $('#username').val();
		        var phone = $('#phone').val();
		        var parent_usercode = $('#parent_usercode').val();
		    	$.ajax({
		            type: "POST",
		            dataType: "json",
		            url: "<?php echo Yii::$app->urlManager->createUrl('merchant/datacomplete');?>",
		            data: {
		                'user_type': user_type,
		                'topic': topic,
		                'provinceid': provinceid,
		                'cityid': cityid,
		                'areaid': areaid,
		                'username': username,
		                'phone': phone,
		                'parent_usercode': parent_usercode,
		            },
		            success: function (data) {
		                if (data.errorCode == 0) {
		                    alert("申请成功");
		                     $("#tijiao").removeAttr('disabled');
		                    location.href="<?php echo Yii::$app->urlManager->createUrl('merchant/datacomplete');?>";
		                } else if (data.errorCode == -15) {
		                    alert("参数有误，为空或格式不正确");
		                     $("#tijiao").removeAttr('disabled');
		                }else if (data.errorCode == -35) {
		                    alert("推介人不存在");
		                     $("#tijiao").removeAttr('disabled');
		                }else if (data.errorCode == -34) {
		                    alert("网络繁忙，请稍候重试");
		                     $("#tijiao").removeAttr('disabled');
		                }else if (data.errorCode == -46) {
		                    alert("推介人没有推介权限！");
		                    $("#tijiao").removeAttr('disabled');
		                }
		            },
		            error: function(data) {
		                alert("网络繁忙！");
		                 $("#tijiao").removeAttr('disabled');
		            }
		        });
		        
		        
		       } 
		        
		        
    	   	 }else{
    	   	 	alert( '邀请码为必填项' );
    	   	 } 
    	   	}else{
    	   		alert( '手机号为必填项' );
    	   	} 
    	   }else{
    	   	  alert( '你的姓名为必填项' );
    	   }
    	  }else{
    	  	alert( '公司营业执照或店铺名称为必填项' );
    	  } 
    	 }else{
        	alert( '请选择申请身份' );
        }
    
    
    
    	
    }else{
    	
    	
    	
    	if( figure == 2 ){ 
    	   if( $('#username').val() != '' ){
    	   	if( $('#phone').val() != '' ){
    	   	 if( $('#parent_usercode').val() != '' ){  
                if( switching == 1){ 
    	   	 	
    	   	    $("#tijiao").attr('disabled','disabled');
		        var topic = $('#topic').val();
		        var provinceid = $('#province').val();
		        var cityid = $('#city').val();
		        var areaid = $('#district').val();
		        var username = $('#username').val();
		        var phone = $('#phone').val();
		        var parent_usercode = $('#parent_usercode').val();
		    	$.ajax({
		            type: "POST",
		            dataType: "json",
		            url: "<?php echo Yii::$app->urlManager->createUrl('merchant/datacomplete');?>",
		            data: {
		                'user_type': user_type,
		                'topic': topic,
		                'provinceid': provinceid,
		                'cityid': cityid,
		                'areaid': areaid,
		                'username': username,
		                'phone': phone,
		                'parent_usercode': parent_usercode,
		            },
		            success: function (data) {
		                if (data.errorCode == 0) {
		                    alert("申请成功");
		                     $("#tijiao").removeAttr('disabled');
		                    location.href="<?php echo Yii::$app->urlManager->createUrl('merchant/datacomplete');?>";
		                } else if (data.errorCode == -15) {
		                    alert("参数有误，为空或格式不正确");
		                     $("#tijiao").removeAttr('disabled');
		                }else if (data.errorCode == -35) {
		                    alert("推介人不存在");
		                     $("#tijiao").removeAttr('disabled');
		                }else if (data.errorCode == -34) {
		                    alert("网络繁忙，请稍候重试");
		                     $("#tijiao").removeAttr('disabled');
		                }else if (data.errorCode == -46) {
		                    alert("推介人没有推介权限！");
		                    $("#tijiao").removeAttr('disabled');
		                }
		            },
		            error: function(data) {
		                alert("网络繁忙！");
		                 $("#tijiao").removeAttr('disabled');
		            }
		        });
		        
		        
		       } 
		        
		        
    	   	 }else{
    	   	 	alert( '邀请码为必填项' );
    	   	 } 
    	   	}else{
    	   		alert( '手机号为必填项' );
    	   	} 
    	   }else{
    	   	  alert( '你的姓名为必填项' );
    	   }
    	  
    	 }else{
        	alert( '请选择申请身份' );
        }
    
    	
    }
 
        
        
        
        
    })



    
    
    
	
</script>
 

</body>
</html>	
	
	
	
	
	 
