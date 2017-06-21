<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>爆款</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/miaosha.css"/>
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	<style>
	  	.empty_list{
			width: 100%;
		}
		.empty_list img{
			display: block;
			width: 1.7rem;
			height: 1.48rem;
			margin: 0 auto;
			margin-top: 1.16rem;
		}
		.empty_list p{
			width: 100%;
			text-align: center;
			font-size: 0.2rem;
			color: #999999;
			margin-top: 0.16rem;
		}		
	</style>
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
		 $('.cl_center').html(attrobj);
                    .empty_list{
			width: 100%;
		}
		.empty_list img{
			display: block;
			width: 1.7rem;
			height: 1.48rem;
			margin: 0 auto;
			margin-top: 1.16rem;
		}
		.empty_list p{
			width: 100%;
			text-align: center;
			font-size: 0.2rem;
			color: #999999;
			margin-top: 0.16rem;
		}
	</style>

</head>
<body>
<div class="screen">
	<header class="u_live_header">
		<h1>爆款抢购</h1>
		<!-- <a class="site" id="city" attr="chosecity"> 
			[<span id="address">城市</span> ]  
	    </a> -->
		<a class="u_back" href="<?php echo \Yii::$app->urlManager->createUrl(['help/huodong']); ?>">返回</a>
	</header>
	<div class="main no_footer_main">
		
		<div class="hot_time"> 
			<span> <?php if(!empty($activityInfo)){ echo $activityInfo[0]['start_time']?> 至 <?php echo $activityInfo[0]['end_time'];} ?> </span>
		</div>
		
		<!-- <form action="<?php //echo \Yii::$app->urlManager->createUrl(['help/search']); ?>" method="post" id="sousuo"> -->
		<div class="baokuan_s">
			<div>
			    <input type="hidden" name="activityId" class="activityId" value="<?php echo $_GET['activityId']?>">
				<input type="text"  class="serach_text" placeholder="搜索商品名称关键词" name="keyworlds"/>
				<input class="serach_btn" type="button" value="查询" />
			</div>			
		</div>
		<!-- </form> -->
		<ul class="cl_center">
			<?php if(!empty($hotgoods)){ foreach($hotgoods as $k=>$v){?>
	            <li>
		            <a href="<?php echo \Yii::$app->urlManager->createUrl(['life/goodsdetails','id'=>$v['store_goods_id'],'is_hot'=>$v['is_hot']])?>">
		            	<div class="cl_li_left">
		            		<img src="<?php echo $pic_host,$v['goods_img']; ?>" >
		            		<img class="cl_li_left_posi" src="<?php echo $pc_style; ?>images/qianggou.png"/>
		            	</div>
						<div class="cl_center_right">
							<p><?=$v['goods_name']?></p>
							<p class="cl_center_rig_p2"><span><?=$v['promote_price']?></span><span>三界石</span>
								<button>
									马上抢购
								</button>
							</p>
						</div>
					</a>
				</li>
			<?php }; }else{ ?>
				<div class="empty_list">
					<img class="identity_img" src="<?php echo $pc_style; ?>images/shangpinzhanweitu.png"/>
					<p> 抱歉，没有搜索到内容 </p>
				</div>
			<?php }?>
		</ul>
	</div>
</div>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>

<script>
//切换城市
//   var cityname = localStorage.getItem("cityname");  
//   cityname = cityname.split("·");
//   if( cityname[1].length >= 5 ){
//   	$('#address').html( cityname[1].slice(0,4) );
//   }else{
//   	$('#address').html( cityname[1] );
//   }
//   $("#city").click(function(){
// 	if($(this).attr("attr")=='chosecity'){
// 		document.cookie = "url="+"<?php //echo \Yii::$app->urlManager->createUrl(['help/baokuan']);?>"+";path=/";
// 		location.href = "<?php //echo \Yii::$app->urlManager->createUrl(['merchant/chosecity']);?>";
// 	}
// })

// var cityname = localStorage.getItem("cityname");  
//   cityname = cityname.split("·");
//   if( cityname[1].length >= 5 ){
//   	$('#address').html( cityname[1].slice(0,4) );
//   }else{
//   	$('#address').html( cityname[1] );
//   }


$(".serach_btn").click(function(){
	var keyworlds = $(".serach_text").val();
	var activityId = $(".activityId").val();
	if(keyworlds == ''){
		return false;
	}
	$.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo Yii::$app->urlManager->createUrl('help/search');?>",
            data: {'keyworlds': keyworlds,"activityId": activityId},
            success: function (message) {
                if (message != '') {
                    console.log(message);
                    var attrobj = "";
                    $.each(message,function(k,v){
                    	var alianjie="<?php echo \Yii::$app->urlManager->createUrl(['life/goodsdetails']);?>?id="+v.store_goods_id+"&is_hot="+v.is_hot;
                    	attrobj +='<li>';
                        attrobj += '<a href='+alianjie+'>';
                        attrobj += '<div class="cl_li_left"><img src=http://futureshop.oss-cn-qingdao.aliyuncs.com'+v.goods_img+' /><img class="cl_li_left_posi" src="../../resources/images/qianggou.png"/></div>';

                        attrobj += '<div class="cl_center_right">';
                        attrobj += '<p>'+v.goods_name+'</p >';
                        attrobj += '<p class="cl_center_rig_p2"><span>'+v.promote_price+'</span><span>三界石</span><button>马上抢购</button></p>';
                        attrobj += '</div>';
                        attrobj +='</a>';
                        attrobj +='</li>';
                   });
                   $('.cl_center').html(attrobj);
                } else {
                	var kong = "";
                	kong += '<div class="empty_list">';
                	var alianjie="<?php echo $pc_style; ?>";
                    kong +='<img class="identity_img" src="'+alianjie+'images/shangpinzhanweitu.png"/>';
                    kong +='<p> 抱歉，该页面无内容 </p>';
                    kong += '</div>';
                    $('.cl_center').html(kong);
                }
            },
            error: function(message) {
                alert("网络繁忙！");
            }
        });
})


	/*fastclick解决移动端点击延迟的问题*/
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	}
	 
 
//   $(".main").scroll(function(){
//       var $this =$(this),
//       viewH =$(this).height(),//可见高度
//       contentH =$(this).get(0).scrollHeight,//内容高度
//       scrollTop =$(this).scrollTop();//滚动高度
//       console.log(viewH);
//       console.log(contentH);
//       console.log(scrollTop);
//      //if(contentH - viewH - scrollTop <= 100) { //到达底部100px时,加载新内容
//      if(scrollTop/(contentH -viewH)>=0.95){ //到达底部100px时,加载新内容
//      // 这里加载数据..
//      alert(1);
//      }
//   });
 
	
	
</script>
</body>
</html>