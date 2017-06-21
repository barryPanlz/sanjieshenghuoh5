<?php
    use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>选择城市</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css"> 
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/merchant/recruitment.css"> 
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $pc_style; ?>js/lib/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script> 
 
</head> 
<body>
<div class="screen">
	
	<div class="chooseTotal">
	<!-- <form action="<?php //echo Yii::$app->urlManager->createUrl(['merchant/index']);?>" method="post" id="tijiao"> -->
		<div class="cityBox">
			<div class="citys">
				<p><span>您当前所在的城市:</span> <span id="thisCity"><img src="<?php echo $pc_style; ?>images/jiazaizhong1.gif"/></span></p>
				<p class="citysp2"><span>建议选择分站:</span></p>
				<!-- <li> <img src="<?php //echo $pc_style; ?>images/icon_radio_red.png" alt="">  <span> 河北·邢台 </span>  </li>
				<li> <img src="<?php //echo $pc_style; ?>images/icon_radio.png" alt="">  <span> 江西·抚州 </span>  </li>
				<li> <img src="<?php //echo $pc_style; ?>images/icon_radio.png" alt="">  <span> 河南·商丘 </span>  </li> -->
				<input type="hidden" id="cityid"  name="city">
					<ul class="citys_ul">
						<?php $i = 1; if(!empty($lists)){ foreach ($lists->getDistributeStoreInfo as $key => $v) { ?>
							<li> <img src="<?php echo $pc_style; ?>images/<?php if($i == 1){ echo "icon_radio_red";}else{ echo "icon_radio";}?>.png" alt="">  <span> <?php echo $v->province; ?>·<?php echo $v->city_name; ?></span>  <input class="input" type="hidden" value="<?php echo $v->city; ?>"></li>
						<?php $i++;} } ?>
					</ul>
			</div>
			<div class="btns">
				<span id="btns_cancel"> 取消 </span>
				<span class="btns_confirm"> 确认 </span>
			</div>
		</div>
	<!-- </form> -->
	</div>
</div>
<!--<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>-->
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
<!--<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/gaode.js" type="text/javascript" charset="utf-8"></script>-->
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=dacf2d4d06a04949e4b9a1ec337c78ef"></script>
<script src="http://pv.sohu.com/cityjson?ie=utf-8"></script>
<script>
	/*fastclick解决移动端点击延迟的问题*/
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	};
	var Num;
	//点击确认
	//点击切换城市
    $('.citys_ul li span').eq(0).css('color','#f01c1c');
   $('.citys_ul li').click(function(){
   	 $('.citys_ul li').find('span').css('color','#333');
   	 $(this).find('span').css('color','#f01c1c');
   	 var index = $(this).index();
   	 Num = $(this).index();
// 	 console.log(Num);
   	 $(this).find('img').attr('src','../../resources/images/icon_radio_red.png');
   	 $(this).siblings().find('img').attr('src','../../resources/images/icon_radio.png');
   	 $("#cityid").val($(this).find('.input').val())
// 	 console.log($(this).find('.input').val())
   });
   //点击确定
   var city,cityname;
	$(".btns_confirm").click(function(){
		 city = $("#cityid").val();
		if(city == ''){
//			获取高亮的城市id和名称
			 var city_obj=$('.citys li');
			 $.each(city_obj, function() {  
			 	if($(this).find("img").attr("src")=="../../resources/images/icon_radio_red.png"){
			 		city =$(this).find('.input').val();
			 		cityname = $(this).find('span').html();
			 	}                                                        
			 });
		}else{
			 city = $("#cityid").val();
			 cityname = $('.citys li').eq(Num).find('span').html();
		}
		localStorage.setItem("cityname", cityname);
		// document.cookie = "city="+city+";path=/";
		 $.ajax({
            url:"<?php echo Yii::$app->urlManager->createUrl(['merchant/index']);?>",
            data:{city:city},
            type:"POST",
            dataType:"json",
            success:function(obj){
                if(obj.url == ''){
                      location.href="<?php echo Yii::$app->urlManager->createUrl(['index/index']);?>";
                }else{
                	location.href=obj.url;
                }
            },
            error:function(){
                alert("网络异常！");
            }
        })
	})

   //点击切换城市
    $('.citys li span').eq(0).css('color','#f01c1c');
   $('.citys li').click(function(){
   	 $('.citys li').find('span').css('color','#333');
   	 $(this).find('span').css('color','#f01c1c');
   	 var index = $(this).index();
   	 Num = $(this).index();
   	 // console.log(Num);
   	 $(this).find('img').attr('src','../../resources/images/icon_radio_red.png');
   	 $(this).siblings().find('img').attr('src','../../resources/images/icon_radio.png');
   	 $("#cityid").val($(this).find('.input').val())
   	 // console.log($(this).find('.input').val())
   });
	//点击取消
	$('#btns_cancel').click(function(){
		var cityname = localStorage.getItem("cityname");
		
				city = $("#cityid").val();
				if(city == ''){
//					 获取高亮的城市id和名称
					 var city_obj=$('.citys li');
					 $.each(city_obj, function() {  
					 	if($(this).find("img").attr("src")=="../../resources/images/icon_radio_red.png"){
					 		city =$(this).find('.input').val();
					 		cityname = $(this).find('span').html();
					 	}                                                        
					 });
					 localStorage.setItem("cityname", cityname);
				}
				
				// return false;
				$.ajax({
			            url:"<?php echo Yii::$app->urlManager->createUrl(['merchant/index']);?>",
			            data:{city:city},
			            type:"POST",
			            dataType:"json",
			            success:function(obj){
			                if(obj.url == ''){
			                      location.href="<?php echo Yii::$app->urlManager->createUrl(['index/index']);?>";
			                }else{
			                	location.href=obj.url;
			                }
			            },
			            error:function(){
			                alert("网络异常！");
			            }
		        })
	
		// window.reload();
	});
	//获取城市信息
		$(function(){
			  //点击切换城市
		   var datacityid="";
		   var dataArea="";
			datacityid = sessionStorage.getItem("dataCitykey");
			dataArea = sessionStorage.getItem("dataArea");
			//初次登录定位
			if( datacityid&&dataArea){
				sessionEach();
			}else{
				gaoDeoLocation();
			}	
			function gaoDeoLocation(){
				var map, geolocation;
				map = new AMap.Map('', {
					resizeEnable: true
				});
				map.plugin('AMap.Geolocation', function(){
					geolocation = new AMap.Geolocation({
						enableHighAccuracy: true, //是否使用高精度定位，默认:true
						timeout: 10000, //超过10秒后停止定位，默认：无穷大
						buttonOffset: new AMap.Pixel(10, 20), //定位按钮与设置的停靠位置的偏移量，默认：Pixel(10, 20)
						zoomToAccuracy: true, //定位成功后调整地图视野范围使定位位置及精度范围视野内可见，默认：false
						buttonPosition: 'RB',
						convert: true
					});
					map.addControl(geolocation);
					geolocation.getCurrentPosition();
					AMap.event.addListener(geolocation, 'complete', onComplete); //返回定位信息
					AMap.event.addListener(geolocation, 'error', onError); //返回定位出错信息
				});
				//解析定位结果
				function onComplete(data){
					var location = data.position.getLng() + "," + data.position.getLat();
//					console.log(location)
					$.ajax({  
						type:"get",  
						async:true,
						url : 'http://restapi.amap.com/v3/geocode/regeo',  	
						dataType:"json",
						data : {
							'key' : "dacf2d4d06a04949e4b9a1ec337c78ef",
							'output' : "JSON",
							'batch' : false,
							'location' : location
						},
						success  : function(data){
//							console.log(data);
							var addres = data.regeocode.addressComponent.adcode;
							javaajax(addres);
//							var data = data.regeocode.addressComponent;
//							var stree = data.streetNumber.street?data.streetNumber.street:"";
//							var number =  data.streetNumber.number?data.streetNumber.number:"";
//							var name =  data.building.name?data.building.name:"";
//							alert( stree+number+name );
//							var addres = stree+number+name;
							$("#addres").html( addres );
							sessionStorage.setItem("index_addres",addres);
						},
						error : function(data){	
							alert("获取定位失败");
							$("#thisCity").html("获取定位失败");
						}
						
					});	
				}
				//解析定位错误信息
				function onError(data) {
					alert("获取定位失败");
					$("#thisCity").html("获取定位失败");
 				}
				function javaajax(addres){
					$.ajax({  
						type:"post",  
						url : "<?php echo \Yii::$app->urlManager->createUrl(['merchant/getareabyid']);?>", 
						data:{"areaId":addres},
						success  : function(msgg){
							var msg=jQuery.parseJSON(msgg)
							// console.log(msg);
							datacityid=msg.data.area.cityid;
							dataArea=msg.data.area.area;
//							console.log(datacityid);
//							console.log(dataArea);
							sessionStorage.setItem("dataCitykey",datacityid);
 							sessionStorage.setItem("dataArea",dataArea);
							sessionEach();
						},
						error : function(data){
							alert("获取定位失败");
							$("#thisCity").html("获取定位失败");
						}
					});	
				}
			}
		//根据获取城市id和城市名遍历判断
				function sessionEach(){
					// console.log(dataArea)
					$("#thisCity").html(dataArea);
						var objj=$('.citys_ul li');
						$.each(objj, function() {    
							// console.log($(this).find("input").val());
							if($(this).find("input").val()==datacityid){
								$(this).find('img').prop('src','../../resources/images/icon_radio_red.png');
	   	 						$(this).siblings().find('img').prop('src','../../resources/images/icon_radio.png');
	   	 						$('.citys_ul li').find('span').css('color','#333');
 								$(this).find('span').css('color','#f01c1c');
 								return false;
							}
						});
				}
		})
</script>
 
</body>
</html>	
	
	
	
	
	 
