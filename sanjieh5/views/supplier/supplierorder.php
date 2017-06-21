<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>供应商订单</title>
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/shoporder.css"/>
    <style>
        .page_book {
            width: 60%;
            margin: .2rem auto;
            display: block;
            font-size: 0;
        }
        .page_book a:last-child {
            float: right;
        }.page_book a:first-child {
             float: left;
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
        }
        .sor_bootom{
        	width: 100%;
        	/*height: 0.5rem;*/
        	text-align: center;
        }
        .sor_bootom img{
        	display: inline;
        }
        .xiala_chi{
        	position: absolute;
        	width: 100%;
        	height: 8.6rem;
        	z-index: -1;
        }
        .sor_top a{
			width:33%;
		} 
    </style>
</head>
<body>
<div class="screen">
	<header>
		<a class="u_back" href="javascript:history.go(-1);">列表</a>
		<h1>我的订单</h1>
		<!--<a class="u_search u_shuaxin" href="<?php echo Yii::$app->urlManager->createUrl('user/dianpuorder'); ?>">搜索</a>-->
	</header>
	<div class="main no_footer_main">
		<div class="sor_top">
			<a class="color_red" href="###"><span>全部(</span><span id="stateAll">0</span><span>)</span></a>
			<!-- <a href="###"><span>待付款(</span><span id="stateNub1">0</span><span>)</span></a> -->
			<a href="###"><span>待发货(</span><span id="stateNub2">0</span><span>)</span></a>
			<a href="###"><span>已发货(</span><span id="stateNub3">0</span><span>)</span></a>
		</div>
		<div class="sor_center">
			
		</div>
		<div class="sor_bootom">
			<img src="<?php echo $pc_style; ?>images/jiazaizhong.gif"/>
		</div>
	</div>
</div>
<div class="xiala_chi">
	
</div>
<div class="sr_model_wrap">
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
			<button>
				取消
			</button>
			<button>
				确定
			</button>
		</li>
	</div>
</div>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
<script>
$(document).ready(function() {
			/*fastclick解决移动端点击延迟的问题*/
			if ('addEventListener' in document) {
			    document.addEventListener('DOMContentLoaded', function() {
			        FastClick.attach(document.body);
			    }, false);
			}
//			调用商品状态接口
			statenum();
//			调用默认第一页列表
			ajaxNlist(1,"",1);
			//定义一个变量
			var PageNub=1;
			var thisnubb;
			$(".sor_top").find("a").click(function(){
				PageNub=1;
				$(this).addClass("color_red");
				$(this).siblings().removeClass("color_red");
				if($(this).index()==0){
					 thisnubb="";
				}else{
					thisnubb=$(this).index()+1;
				}
//				else if($(this).index()==1){
//					thisnubb=1;
//				}
//				else if($(this).index()==2){
//					thisnubb=3;
//				}
//				else if($(this).index()==4){
//					thisnubb=6;
//				}
				console.log(thisnubb)
				ajaxNlist(1,thisnubb,1)
		        return false;
			});
			//下拉刷新，上拉加载；
            $(".main").scroll(function() {
                //$(document).scrollTop() 获取垂直滚动的距离
                //$(document).scrollLeft() 这是获取水平滚动条的距离
//              console.log($(".main").scrollTop());
//              console.log($(".sor_center").height());
                if ($(".main").scrollTop()<= 0) {
                }
                if ($(".main").scrollTop() >= $(".sor_center").height() - $(".xiala_chi").height()) {
                    if(PageNub<totalPage){
                    	$(".sor_bootom").css("display","block");
                    	PageNub++;
                    	ajaxNlist(PageNub,thisnubb,2)
                    }else{
                    	$(".sor_bootom").css("display","none");
                    }
                }
            });
	 });
	 //商品状态
	 function statenum () {
		$.ajax({
			type:"get",
			url:"<?php echo \Yii::$app->urlManager->createUrl(['user/num']);?>",
			datatype:"json",
			success:function(msg){
				var obj1 = JSON.parse(msg);
				$("#stateAll").text(obj1.shopOrderNum.total);
				// $("#stateNub1").text(obj1.shopOrderNum.wait_pay); 
				$("#stateNub2").text(obj1.shopOrderNum.wait_deliver);
				$("#stateNub3").text(obj1.shopOrderNum.wait_receipt);
			} 
	    })	
	}
	 //currentPage页码、state状态、clickde点击还是下拉
 	//定义全局变量总页数
	var totalPage=0;
	function ajaxNlist (currentPage,state,clickde) {
		$.ajax({
			type:"post",
			url:"<?php echo \Yii::$app->urlManager->createUrl(['supplier/shoporder']);?>",
			async:true,
			datatype:"json",
			data: {'currentPage':currentPage,'state':state}, 
			success:function(msg){ 
				var objdata = JSON.parse(msg);
				//定义变量（+=）
				var allwrap="";
				var obj=objdata.data.shopOrderList;
				//获取总页数
				totalPage=objdata.page.totalPage;
				if(totalPage==0){
					$(".sor_bootom").css("display","block");
				 	$(".sor_bootom").find("img").attr("src","<?php echo $pc_style; ?>"+"images/meiyouorder.png");
				 	$(".main").find(".sor_center").html("");
				 	return false;

      //       		$(".sor_bootom").css("display","none");
      //       		$(".sor_bootom").find("img").attr("src","<?php echo $pc_style; ?>"+"images/meiyouorder.png");
				 	// $(".main").find(".sor_center").html("");
				 	// return false;
            	}
            	else if(totalPage==1){
            		$(".sor_bootom").css("display","none");
            		$(".sor_bootom").find("img").attr("src","<?php echo $pc_style; ?>"+"images/jiazaizhong.gif");
                }
                else if(totalPage>1){
                	$(".sor_bootom").css("display","block");
                	$(".sor_bootom").find("img").attr("src","<?php echo $pc_style; ?>"+"images/jiazaizhong.gif");
                }
				$.each(obj, function(i) {    
					 //头部
					 var ajaxwrap=
						 "<div class='sor_ce_order_top'><span>订单号：</span><span>"+
							obj[i].order_no
						 +"</span><span class='sor_ce_order_top_right'>"+
						 	obj[i].add_time
						 +"</span></div>";
					 //中部
					 var goodlist=obj[i].shopGoodsList;
//					 console.log(goodlist)
					 var ulLiwrap,ulLiwrapall,ulLiwrapa,logistics_no;
					 var good_subnub=0;
					 //第二个each
					$.each(goodlist, function(n) { 
//							  console.log(goodlist[n].goods_name)
						logistics_no="";
						if(goodlist[n].logistics_no==undefined){
							logistics_no="无"
						}else{
							logistics_no=goodlist[n].logistics_no;
						}
						var alianjie="<?php echo \Yii::$app->urlManager->createUrl(['goods/details']);?>?goodsId="+goodlist[n].goods_id+"&catId="+goodlist[n].cat_id;
//							console.log(alianjie)
						 ulLiwrap ="<li><a href="+alianjie+"><img src=<?php echo "$pic_host" ?>"+
						 goodlist[n].goods_img
						+" /><div class='sor_ce_li_right'><p>"+
							goodlist[n].goods_name
						+"</p><p class='sor_ce_li_p2'><span>快递单号：</span><span>"+
							logistics_no
						+"</span></p><p class='sor_ce_li_p3'><span>"+
							goodlist[n].pay_price
						+"</span><span>三界石</span><span>数量 x<i>"+
							goodlist[n].goods_number
						+"</i></span></p></div></a></li>";
						ulLiwrapa+=ulLiwrap;
						good_subnub++;
						ulLiwrapall="<ul class='sor_ce_order_ul'>"+ulLiwrapa+"</ul>";
					})
					//底部
				var objStatr="";
				var objorderstate="";
				if(obj[i].state==1){
			 		objStatr="未支付";
					var objahref= "<?php echo \Yii::$app->urlManager->createUrl(['order/pay_order']);?>?order_sn="+obj[i].order_no+"&money="+obj[i].goods_amount;
			 		objorderstate= "<a href="+objahref+"><button>付款</button></a>";
			 	}if(obj[i].state==2){
			 		objStatr="未发货";
			 	}if(obj[i].state==3){
			 		objStatr="已发货";
			 		var objahref="http://m.kuaidi100.com";
			 		objorderstate= "<a href="+objahref+"><button>查看物流</button></a>";
			 	}if(obj[i].state==4){
			 		objStatr="确认收货";
			 	}if(obj[i].state==5){
			 		objStatr="取消";
			 	}if(obj[i].state==6){
			 		objStatr="已完成";
			 	} 
				var bottomwrap="<div class='sor_ce_order_bottom'><p><span>共</span><i>"+
						good_subnub
					+"</i><span>件商品，合计：</span><i class='big_i'>"+
						obj[i].goods_amount
					+"</i><span>三界石</span></p><li></span><span><i>"+
						objStatr
					+"</i>"+
						objorderstate
					+"</span></li></div>"
			
				allwrap+="<div class='sor_ce_order'>"+ajaxwrap+ulLiwrapall+bottomwrap+"</div>";
//				 console.log(allwrap)
				});
				if (clickde==1) {
					$(".main").find(".sor_center").html(allwrap);
				}else if(clickde==2){
					$(".main").find(".sor_center").append(allwrap);
				}
				  
			},
			error:function(){
				alert("网络故障，请稍后重试");
				$(".sor_bootom").css("display","none");
			}
		});
	}
	
</script>
</body>

</html>