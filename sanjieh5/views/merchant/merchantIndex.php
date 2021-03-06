<?php
    use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>商家首页</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css"> 
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/merchant/merchantIndex.css"> 
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $pc_style; ?>js/lib/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script> 
	<style>
		.site {
		    position: absolute;
		    top: 0.2rem;
		    right: 0.3rem;
		    color: #FFFFFF;
		    font-size: 0.26rem;
		}
		.site span{
			color: #FFFFFF;
		}
	</style>
</head> 
<body>
<div class="screen">
	  <!--三界生活首页头部-->
	<header>
		<a class="u_search u_search_special" href="<?php echo Yii::$app->urlManager->createUrl(['merchant/sousuo']);?>">搜索</a> 
		<h1>商家</h1>
		<!-- <a class="add_merchant" href="<?php //echo Yii::$app->urlManager->createUrl('merchant/submitdata');?>"> <img src="<?php echo $pc_style; ?>images/jia.png" alt=""> 商家入驻 </a> -->
		<a class="site" id="city" attr="chosecity"> 
			[<span id="address">城市</span> ]  
	    </a>
	</header>
	<div class="main">
	
	   <!--大分类导航-->
	  <div class="big_classificate"> 
	  		<input type="hidden" id="tagId"  name="tagId"> 
		  	<?php if(!empty($lists)){ foreach ($lists as $key => $value) { 
		  		if($key == 0){ ?><li class="big_classificate_li"><?php }else{?>
		  		<li><?php }echo $value->tag_name; ?><input class="input" type="hidden" value="<?php echo $value->id; ?>"></li>
		  	<?php } }?>  
	  </div>
	  	  
	  
	  <!--子商品列表-->
	  <div class="subclass">
		 <div class="sk_center_ul_wrap"> 
		</div>
		
		<!--非空列表-->

		<div class="empty_list">
			
		</div>
		
		
	  </div>
     
	</div>
	
	<footer>
		<ul>
			<li>
				<a href="<?php echo Yii::$app->urlManager->createUrl('index/index');?>">
					<div><img src="<?php echo $pc_style; ?>images/shouye-ct.png" alt=""></div>
					<p>三界商城</p>
				</a>				
			</li>
			 
		<li class="nowpage">
				<a class="aaa" attr="shang">
					<div><img src="<?php echo $pc_style; ?>images/kefu-xz.png" alt=""></div>
					<p class="active_t">商家</p>
				</a>
			</li>
			<li>
				<a class="aaa" attr="huo">
					<div><img src="<?php echo $pc_style; ?>images/kefutwo.png" alt=""></div>
					<p>发现</p>
				</a>				
			</li>
			<li>
				<a href="<?php echo Yii::$app->urlManager->createUrl('user/usercenter');?>">
					<div><img src="<?php echo $pc_style; ?>images/gerenzhongxin-ct.png" alt=""></div>
					<p>我的</p>
				</a>				
			</li>
		</ul>
	</footer>
</div>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
<script>
//切换城市
  var cityname = localStorage.getItem("cityname");
   if(cityname != null){
   	  cityname = cityname.split("·");
	  if( cityname[1].length >= 5 ){
	  	$('#address').html( cityname[1].slice(0,4) );
	  }else{
	  	$('#address').html( cityname[1] );
	  }
	}

  $("#city").click(function(){
	if($(this).attr("attr")=='chosecity'){
		document.cookie = "url="+"<?php echo \Yii::$app->urlManager->createUrl(['merchant/mindex']);?>"+";path=/";
		location.href = "<?php echo \Yii::$app->urlManager->createUrl(['merchant/chosecity']);?>";
	}
});


//大分类导航的宽度 
var lth = $('.big_classificate li').length ;
var  total_width = lth * 1.7 + 0.3 + 'em';
$('.big_classificate_nav').css('width',total_width);

$(".aaa").click(function(){
	if($(this).attr("attr")=='ben'){
		document.cookie = "url="+"<?php echo \Yii::$app->urlManager->createUrl(['life/life_index']);?>"+";path=/";
		location.href = "<?php echo \Yii::$app->urlManager->createUrl(['life/life_index']);?>";
	}else if($(this).attr("attr")=='shang'){
		document.cookie = "url="+"<?php echo \Yii::$app->urlManager->createUrl(['merchant/mindex']);?>"+";path=/";
		location.href = "<?php echo \Yii::$app->urlManager->createUrl(['merchant/mindex']);?>";
	}else if($(this).attr("attr")=='huo'){
		document.cookie = "url="+"<?php echo \Yii::$app->urlManager->createUrl(['help/huodong']);?>"+";path=/";
		location.href="<?php echo \Yii::$app->urlManager->createUrl(['help/huodong']);?>";
	}
})

	/*fastclick解决移动端点击延迟的问题*/
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	};
	//默认加载
	window.onload=function(){
		 //var tagId = $(".big_classificate").find("li").eq(0).find("input").val();
		 var tagId = 1;
         $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo Yii::$app->urlManager->createUrl('merchant/index1');?>",
            data: {'tagId': tagId,},
            success: function (message) {
            	console.log(message);
                if (message.errorCode == 0) {
                    console.log(message.data.unionQueryByCity['length']);
                    if(message.data.unionQueryByCity['length'] == 0 ){
                    	var kong = "";
                    	var alianjie="<?php echo $pc_style; ?>";
	                    kong +='<img class="identity_img" src="'+alianjie+'images/shangpinzhanweitu.png"/>';
	                    kong +='<p> 抱歉，该页面无内容 </p>';
	                   $('.empty_list').html(kong);
      //               	<img class="identity_img" src="<?php echo $pc_style; ?>images/shangpinzhanweitu.png"/>
						// <p> 抱歉，该页面无内容 </p>
                    }else{
                    	var attrobj = "";
                    	var url = 'http://futureshop.oss-cn-qingdao.aliyuncs.com';
	                    $.each(message.data.unionQueryByCity,function(k,v){
	                    	var alianjie="<?php echo \Yii::$app->urlManager->createUrl(['merchant/goodslist']);?>?storeId="+v.store_id;
	                        attrobj +='<li>';
	                        attrobj += '<a href='+alianjie+'>';
	                        attrobj += '<img src=http://futureshop.oss-cn-qingdao.aliyuncs.com'+v.store_img+' />';
	                        attrobj += '<div class="li_right">';
	                        attrobj += '<p class="cont_title">'+v.store_name+'</p >';
	                        attrobj += '<p class="cont_bott"><em>'+v.address+'</em></p>';
	                        attrobj += '</div>';
	                        attrobj +='</a>';
	                   });
	                   $('.sk_center_ul_wrap').html(attrobj);
                    }
                    
                } else if (data.errorCode == -46) {
                    alert("查询失败，请稍后！");
                }
            },
            error: function(data) {
                alert("网络繁忙！");
            }
        });
}
   //大分类导航切换
   $('.big_classificate li').click(function(){
	   	var num = $(this).index();
	   	$(this).addClass('big_classificate_li')
	   	.siblings().removeClass('big_classificate_li');
   		$("#tagId").val($(this).find('.input').val())
   		var tagId = $("#tagId").val();
   		$.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo Yii::$app->urlManager->createUrl('merchant/index1');?>",
            data: {'tagId': tagId,},
            success: function (message) {
            	console.log(message);
                if (message.errorCode == 0) {
                    console.log(message.data.unionQueryByCity);
                    var attrobj = "";
                    $.each(message.data.unionQueryByCity,function(k,v){
                    	var alianjie="<?php echo \Yii::$app->urlManager->createUrl(['merchant/goodslist']);?>?storeId="+v.store_id;
                        attrobj +='<li>';
                        attrobj += '<a href='+alianjie+'>';
                        attrobj += '<img src=http://futureshop.oss-cn-qingdao.aliyuncs.com'+v.store_img+' />';
                        attrobj += '<div class="li_right">';
                        attrobj += '<p class="cont_title">'+v.store_name+'</p >';
                        attrobj += '<p class="cont_bott"><em>'+v.address+'</em></p>';
                        attrobj += '</div>';
                        attrobj +='</a>';
                   });
                   $('.sk_center_ul_wrap').html(attrobj);
                } else if (data.errorCode == -46) {
                    alert("查询失败，请稍后！");
                }
            },
            error: function(data) {
                alert("网络繁忙！");
            }
        });

   });

	
</script>

 

</body>
</html>	
	
	
	
	
	 
