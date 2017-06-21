<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>团购订单</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/shoporder.css"/>
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	<style type="text/css">
		 .sor_bootom{
        	width: 100%;
        	height: 0.5rem;
        	text-align: center;
        }
        .sor_bootom img{
        	display: inline;
        }
        .sor1_top .color_green span{
        	color: #12aca0;
        }
        .sor_ce_order_bottom li .bag_green{
        	background: #12aca0;;
        }
        .sor_ce_order_bottom li span .col_green{
        	color: #12aca0;
        }
        .sor_ce_order_bottom p .col_green{
        	color: #12aca0;
        }
       .sor_ce_li_right .sor_ce_li_p3 .col_green{
        	color: #12aca0;
        }
        .xiala_chi{
        	position: absolute;
        	width: 100%;
        	height: 7.5rem;
        	z-index: -1;
        }
        .sor_headtop{
        	width: 100%;
        	height: 0.78rem;
        	border: 1px solid #DEDEDE;
        }
       /* .main{
        	top: 1.56rem;
        }*/
        .sor_top{
        	margin-top:0 ;
        }
        .sor_headtop li{
        	width: 49%;
        	height: 0.76rem;
        	float: left;
        	font-size: 0.26rem;
        	color: #282828;
        	text-align: center;
        	line-height: 0.78rem;
        	font-weight: 400;
        }
        .sor_headtop .top_active{
        	color: #12aca0;
        	border-left:1px solid #e5e5e5 ;
        	border-bottom:3px solid #12aca0 ;
        }
        /*取消订单*/
       .shade {
		    background: rgba(0,0,0,0.5);
		    width: 100%;
		    height: 100%;
		    position: absolute;
		    top: 0;
		    left: 0;
		    z-index: 100;
		    display: none;
		}
       .quite_box{
			width: 5.3rem;
			border-radius: 10px;
			background: #fff;
			position: absolute;
			top: 20%;
			left: 50%;
			/*transform: translate(-50%,-50%);*/
			margin-left: -2.65rem;
			z-index: 100;
			display: none;
		}
		.quite_box p{
			text-align: center;
			margin: .6rem;
			font-size: .28rem;
		}
		.quite_button{
			overflow: hidden;
			border-top: 1px solid #ccc;
		}
		.quite_button input{
			height: .76rem;
			float: left;
			width: 50%;
			background: #fff;
			color: #282828;
			font-size: .28rem;
		}
		.quite_button input.quite_cansole{
			box-sizing:border-box;
			border-right: 1px solid #ccc;
			border-bottom-left-radius: 10px;
		}
		.quite_button input.quite_sure{
			background: #12aca0;
			color: #fff;
			border-bottom-right-radius: 10px;
		}
		/*消费码*/
		.xiaoffa{
			width: 100%;
			height: 0.56rem;
			line-height: 0.56rem;
			text-indent:0.25rem ;
			font-size: 0.26rem;
			background: #fefafa;
			border-bottom:1px solid #DEDEDE ;
		}
		.xiaoffa span{
			font-size: 0.26rem;
			color: #848484;
    		float: left;
    		color: #F3001D;
		}
		.sk_top_bot{
			width: 6rem;
			padding: 0.2rem 0.13rem;
			overflow: hidden;
			margin: 0 auto;
			background: #FFFFFF;
		}
		.sk_top_bot ul{
			width:100%;
			height: auto;
			overflow: hidden;
			float: left;
			padding-bottom: 0.1rem;
		}
		.sousuoi{
			width: 6rem;
			height: 0.9rem;
			background: url(../../resources/images/Shape-4.png) no-repeat;
			background-size: 6rem 0.9rem;
			border-radius:3px;
			position:relative;
		}
		.sousuoi input{
			width: 100%;
			height: 0.9rem;
			border: 0;
			float: left;
			font-size: 0.24rem;
			text-indent: 0.3rem;
		}
		.sk_top_bot .sousuoi img{
			width: 0.7rem;
			height: 0.7rem;
			position: absolute;
			right: 0.14rem;
			top: 0.1rem;
			
		}
		.sor12_top a{
			width:33%;
		} 
	</style>
</head>
<body>
<div class="screen">
	<header class="u_live_header">
		<a class="u_back" href="<?php echo Yii::$app->urlManager->createUrl('user/usercenter'); ?>">列表</a>
		<h1>本地订单</h1>
		<!--<a class="u_search u_shuaxin" href="<?php //echo \Yii::$app->urlManager->createUrl(['user/shoporder']);?>">搜索</a>-->
	</header>
	<!-- <div class="sor_headtop">
		<a href="<?php //echo \Yii::$app->urlManager->createUrl(['user/shoporder']);?>">
			<li>
				商城订单
			</li>
		</a>
		<a href="<?php //echo Yii::$app->urlManager->createUrl('user/dianpuorder'); ?>">
			<li class="top_active">
				本地订单
			</li>
		</a>
	</div> -->
	<div class="main no_footer_main">
		<div class="sor_top sor1_top sor12_top">
			<a class="color_green" href="###"><span>全部（</span><span id="stateAll"></span><span>）</span></a>
			
			<a href="###"><span>待消费（</span><span id="stateNub1"></span><span>）</span></a>
			<a href="###"><span>已消费（</span><span id="stateNub2"></span><span>）</span></a>
		</div>
		<!--店铺搜索-->
		<div class="sk_top_bot">
			<ul>
				<div class="sousuoi">
					<input type="text" name="" id="" placeholder="请输入商品名称" value="" />
					<img src="<?php echo $pc_style; ?>images/fangdajingsousuo.png"/>
				</div>
			</ul>
		</div>
		<div class="sor_center">

		</div>
		<div class="sor_bootom">
			<img src="<?php echo $pc_style; ?>images/jiazaizhong.gif"/>
		</div>
	</div>
	<div class="xiala_chi">
	
	</div>
	
</div>
<div class="sr_model_wrap fun_querenfahuo">
	<div class="sr_model_wrap1">
		<div class="sr_model">
			<li>确定发货？</li>
			<li class="sr_model_li">
				<span>快递公司</span>
				<select name="">
					<option value="">请输入快递公司</option>
					<option value="">圆通</option>
					<option value="">申通</option>
					<option value="">韵达</option>
				</select>
			</li>
			<li class="sr_model_li">
				<span>快递单号</span>
				<input type="number" name="" id="" value="" placeholder="请输入快递单号" />
			</li>
		</div>
		<li class="sr_model_sub_wrap">
			<button id="dele">
				取消
			</button>
			<button id="sr_sure">
				确定
			</button>
		</li>
	</div>
</div>
<div class="sr_model_wrap fun_model_wrap_al">
	<div class="sr_model_wrap1">
		<div class="sr_model">
			<li>确认消费？</li> 
            <li class="sr_model_li">
                <span>消费码</span> 
                    <input type="hidden" id="storeid" value="">
                    <input type="hidden" id="is_hot" value=""> 
                    <input type="number" name="" id="xfcode" value="" placeholder="请输入任意消费码" />
           </li>
           <li class="error_message "> 消费码验证错误 </li>
		</div>
		<li class="sr_model_sub_wrap">
			<button id="dele_xiaofeo">
				取消
			</button>
			<button id="funSure">
				确定
			</button>
		</li>
	</div>
</div>
<div class="motai_succe" id="fahuoSucc">
		发货成功
</div>
<div class="motai_succe" id="xiaofeiSucc">
		消费成功
</div>
<div class="motai_lose">
		发货失败
</div>
<div class="motai_lose">
		订单号错误
</div>
<div class="shade"></div>
<div class="quite_box">
		<p>你确定要取消吗？</p>
		<div class="quite_button">
			<input class="quite_cansole" type="button" value="取消">
			<a id="quite_surewrpa" href=""><input class="quite_sure" type="button" value="确定"></a>
		</div>
	</div>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
<script>

   // alert(value);
	/*fastclick解决移动端点击延迟的问题*/
	$(document).ready(function() {
		if ('addEventListener' in document) {
		    document.addEventListener('DOMContentLoaded', function() {
		        FastClick.attach(document.body);
		    }, false);
		}
		
    //输入消费码获取焦点
    $('#xfcode').focus(function(){
    	 $('.error_message').css('display','none');
    });
     
	//确认消费
            $("#funSure").click(function(){
                $("#funSure").attr("disabled","disabled");
                $("#funSure").css("background","#848484");
                var is_hot = $("#is_hot").val();
                var store_order_sn = $("#storeid").val();
                var xfcode = $("#xfcode").val();
                $.ajax({
                    url: "<?php echo Yii::$app->urlManager->createUrl('user/xfcode');?>",
                    data: {xfcode: xfcode, store_order_sn: store_order_sn,is_hot:is_hot},
                    type: "post",
                    dataType: "json",
                    success:function(data) {
                    	$("#funSure").removeAttr("disabled");
		 				$("#funSure").css("background","#F3001D");
                        if (data.errorCode == 0) {
                            $("#funSure").removeAttr("disabled");
                            $("#funSure").css("background","#F3001D");
                            //alert(data);
                            //消费成功弹框
                            $(".fun_model_wrap_al").css("display", "none");
                            $("#xiaofeiSucc").css("display", "block");
                            time("xiaofeiSucc");
                            location.reload();
                        }else if(data.errorCode == -55){
                            alert('订单信息有误');
                        }else if(data.errorCode == -15){
                            alert('参数错误-为空或格式错误');
                        }else if(data.errorCode == -34){
                            alert('网络繁忙，请稍候重试');
                        }else if(data.errorCode == -49){
                            alert('消费失败');
                        }else if(data.errorCode == -102){
                        //alert('消费码错误，请重新输入！');
                        $('.error_message').css('display','block');
                        }
                    },
                    error:function(error){
                        $("#funSure").removeAttr("disabled");
                        $("#funSure").css("background","F3001D");
                        alert("error!");
                    }
                })
            })
		$("#dele_xiaofeo").click(function(){
			$(".fun_model_wrap_al").css("display","none");
		})
		//倒计时
		function time(mee){
			var i = 3;
			var intervalid;
			intervalid = setInterval(
			function () {
			if (i == 0) {
			$("#"+mee).css("display","none");
			clearInterval(intervalid);
			}
			i--;
			}, 1000);
		}
			//调用商品状态接口
				statenum();
			//调用默认第一页列表
				ajaxNlist(1,"",1);
			
			var thisnubb;
			$(".sor_top").find("a").click(function(){
				PageNub=1;
				$(this).addClass("color_green");
				$(this).siblings().removeClass("color_green");
				if($(this).index()==0){
					 thisnubb="";
				}else{
					thisnubb=$(this).index();
				}
				ajaxNlist(1,thisnubb,1)
		        return false;
			});	
			//商品状态切换
			var quirt="";
			$(".sousuoi").find("img").click(function(){
				quirt=$(".sousuoi").find("input").val();
				ajaxNlist(1,thisnubb,1,quirt)
			})
			var PageNub=1;

			//下拉刷新，上拉加载；
            $(".main").scroll(function() {
                if ($(".main").scrollTop()<= 0) {
                }
                // console.log($(".main").scrollTop());
                // console.log($(".sor_center").height());

                if ($(".main").scrollTop() >= $(".sor_center").height() - $(".xiala_chi").height()) {
                    if(PageNub<totalPage){
                    	$(".sor_bootom").css("display","block");
                    	PageNub++;
                    	ajaxNlist(PageNub,thisnubb,2,quirt)
                    }else{
                    	$(".sor_bootom").css("display","none");
                    }
                }
            });
})
//商品状态
	 function statenum () {
		$.ajax({
			type:"get",
			url:"<?php echo \Yii::$app->urlManager->createUrl(['user/storenum']);?>",
			datatype:"json",
			success:function(msg){
				var obj1 = JSON.parse(msg);
				$("#stateAll").text(obj1.storeOrderNum.total);
				$("#stateNub").text(obj1.storeOrderNum.wait_pay);
				$("#stateNub1").text(obj1.storeOrderNum.wait_receipt);
				$("#stateNub2").text(obj1.storeOrderNum.complete);
			} 
	    })	
	}
//	ajax调用
    var user_type =  <?php echo $_SESSION['user_type']; ?>;

	function ajaxNlist (currentPage,state,clickde,query) {
		$.ajax({

			type:"post",
			url:"<?php echo \Yii::$app->urlManager->createUrl(['user/dianpuorder']);?>",
			async:true,
			datatype:"json",
			data: {'currentPage':currentPage,'state':state,'query':query}, 
			success:function(msg){ 
				var objdata = JSON.parse(msg);
				var allwrap="";
				var obj=objdata.data.storeOrderList;
				console.log(obj);
				//获取总页数
				totalPage=objdata.page.totalPage;
                if(totalPage==0){
				 	$(".sor_bootom").css("display","block");
				 	$(".sor_bootom").find("img").attr("src","<?php echo $pc_style; ?>"+"images/meiyouorder.png");
				 	$(".main").find(".sor_center").html("");
				 	return false;
				 }
				else if(totalPage==1){
            		$(".sor_bootom").css("display","none");
            		$(".sor_bootom").find("img").attr("src","<?php echo $pc_style; ?>"+"images/jiazaizhong.gif");
                }
                else if(totalPage>1){
                	$(".sor_bootom").css("display","block");
                	$(".sor_bootom").find("img").attr("src","<?php echo $pc_style; ?>"+"images/jiazaizhong.gif");
                }
				//消费码
				$.each(obj, function(i) {    
//					 console.log(obj[i].add_time);
					//首先判断支付状态
					var objStatr="";
					var xiaofeima="";
						var objorderstate="";
						if(obj[i].order_status==0){
					 		var url = "<?php echo \Yii::$app->urlManager->createUrl(['user/storeordercancel']);?>?orderNo="+obj[i].store_order_sn;
			 				objStatr="<button class='bag_green quxdd'>取消订单</button><input type='hidden' value="+url+">"
					 		var is_hot='';
					 		if(obj[i].is_hot == 1){ 
								var objahref= "<?php echo \Yii::$app->urlManager->createUrl(['life/storesettle']);?>?order_sn="+obj[i].store_order_sn+"&money="+obj[i].order_amount;
							}else{
								var objahref= "<?php echo \Yii::$app->urlManager->createUrl(['life/pay_order']);?>?order_sn="+obj[i].store_order_sn;
							}
					 		objorderstate= "<a href="+objahref+"><button class='bag_green'>付款</button></a>";
//					 		console.log(xiaofeima);
					 	}if(obj[i].order_status==1){
					 		objStatr="待消费";
					 		var order_codeList=obj[i].order_code_list;
                                if(order_codeList==""){

                                }else{
                                    $.each(order_codeList, function(n) {
                                    	if(order_codeList[n].check_code == undefined){
                                    	 xiaofeima='';
                                    	}else if(order_codeList[n].check_code == ''){
                                    	 xiaofeima='';
                                    	}else{
                                    		 // console.log(order_codeList[n].check_code)
	                                        xiaofei="<p class='xiaoffa'><span>消费码：</span><span>"+
	                                        order_codeList[n].check_code
	                                        +"</span></p>";
	                                        xiaofeima+=xiaofei;
	                                        return xiaofeima;
	                                    }    
                                    });
                                }
			                    if(user_type == '3'){
								 	objorderstate="<a href='###'><button class='bag_green fun_querenxiaofei'>确认消费</button></a>";
			                    }
						 	}if(obj[i].order_status==2){
						 		objStatr="已消费";
						 		xiaofeim=""
						 	}if(obj[i].order_status==4){
						 		objStatr="退货";
						 		xiaofeim=""
						 	}if(obj[i].order_status==5){
						 		objStatr="取消";
						 		xiaofeim=""
						 	}if(obj[i].order_status==6){
						 		objStatr="已完成";
						 		xiaofeim=""
						 	} 
					 //头部
					 var ajaxwrap=
						 "<div class='sor_ce_order_top'><input type='hidden' class='baopin' value="+obj[i].is_hot+" ><span>订单号：</span><span class='dinngdan'>"+
							obj[i].store_order_sn
						 +"</span><br/><span>时间：</span><span>"+
						 	obj[i].add_time
						 +"</span></div>";
//					 //中部
						 var ulLiwrap,ulLiwrapall,ulLiwrapa,logistics_no;
						 var kong="";
						 var is_hot='';
					 	if(obj[i].is_hot == 1){ 
									is_hot="三界石"; 
								}else{
									is_hot="人民币";
								}
//						 console.log(obj[i].store_goods_price)
						var alianjie="<?php echo \Yii::$app->urlManager->createUrl(['life/goodsdetails']);?>?id="+obj[i].store_goods_id;
		//					console.log(alianjie)
						 ulLiwrap ="<li><a href="+alianjie+"><img src=<?php echo "$pic_host" ?>"+
						 	obj[i].goods_img
						+" /><div class='sor_ce_li_right'><p>"+
							obj[i].goods_name
						+"</p><p class='sor_ce_li_p2'><span>  </span><span>"+
							  kong
						+"</span></p><p class='sor_ce_li_p3'><span class='col_green'>"+
							obj[i].store_goods_price
						+"</span><span>"+is_hot+"</span><span>数量 x<i>"+
							obj[i].goods_num
						+"</i></span></p></div></a></li>";
						ulLiwrapa+=ulLiwrap;
		//							good_subnub++;
						ulLiwrapall="<ul class='sor_ce_order_ul'>"+ulLiwrapa+"</ul>";
//						//底部
//					 	console.log(obj[i].order_status)

						var bottomwrap=xiaofeima+"<div class='sor_ce_order_bottom'><p><span>共</span><i class='col_green'>"+
								obj[i].goods_num
							+"</i><span>件商品，合计：</span><i class='big_i col_green'>"+
								obj[i].order_amount
							+"</i><span>"+
								is_hot
							+"</span></p><li></span><span><i class='col_green'>"+
								objStatr
							+"</i><i class='col_green'>"+
								objorderstate
							+"</i></span></li></div>"
							allwrap+="<div class='sor_ce_order'>"+ajaxwrap+ulLiwrapall+bottomwrap+"</div>";
							});
							if (clickde==1) {
								$(".main").find(".sor_center").html(allwrap);
							}else if(clickde==2){
								$(".main").find(".sor_center").append(allwrap);
							}
							  
						}
			//			error:function(){
			//				alert(error);
			//			}
			
			
		});
	}
	$(".sor_center").delegate('.fun_querenxiaofei','click',function(){
			$(".fun_model_wrap_al").css("display","block");
            var store_order_sn = $(this).parents(".sor_ce_order").find(".dinngdan").text();
            var is_hot = $(this).parents(".sor_ce_order").find(".baopin").val();
            $("#is_hot").val(is_hot);
            $("#storeid").val(store_order_sn);
		})


	//取消订单
	$(".sor_center").delegate('.quxdd','click',function(){
		$('.shade').show();
		$('.quite_box').show();
		console.log($(this).parent(".col_green").find("input").val())
		$("#quite_surewrpa").attr("href",$(this).parent(".col_green").find("input").val())
	});
	$('.quite_cansole').click(function(event) {
		$('.quite_box').hide();
		$('.shade').hide();
	});
</script>
</body>
</html>