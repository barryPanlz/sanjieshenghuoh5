<?php
    use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>商品列表</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/goodslist.css"/>
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	<style>
		.cl_img{
			margin:0 auto;
			width:2.4rem;
			text-align: center;
			position:absolute;
			top:50%;
			left:50%;
			margin-top:-1.8rem;
			margin-left:-1.2rem;
		}

		.cl_img .p_1{
			font-size:.24rem;
			color:#282828;
			margin-top:.6rem;
		}
		.cl_img img{
			width:1.74rem;
			height:1.74rem;
		}
		.cl_img .p_2{
			margin-top:.3rem;
			font-size:.22rem;
			color:#848484;
		}
		.sor_bootom{
        	width: 100%;
        	/*height: 0.5rem;*/
        	text-align: center;
        	position: relative;
        	z-index: 111;
        }
        .sor_bootom img{
        	display: inline;
        }
        .xiala_chi{
        	position: absolute;
        	width: 100%;
        	height: 8.42rem;
        	z-index: -1;
        }
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
	<header>
        <a class="u_back" href="javascript:history.go(-1);">返回</a>
       <!--  <form action="<?php //echo \Yii::$app->urlManager->createUrl(['goods/goodslist']);?>" method="get">
            <div class="u_search_box">
                <input type="text" class="kuang" name="keyworlds" placeholder="搜索关键字">
                <input type="submit" class="suoSou" id="" >
            </div>
        </form> -->
        <div class="u_search_box">
            <input type="text" class="kuang" name="keyworlds" placeholder="搜索关键字">
            <input type="button" class="suoSou" id="" >
        </div>
        <input type="hidden" class="sousuo" value="<?php if(empty($_GET['cat_id'])){echo $_GET['keyworlds']; }?>">
<!--		<div class="u_search_box">-->
<!--			<input type="text" placeholder="搜索关键字">-->
<!--			<span class="u_search">搜索</span>-->
<!--		</div>-->
	</header>
	<div class="main main1" >
		<div class="cl_top">
			<div class="cl_top_div fun_top_div fun_click_color cl_click_color">
				<span id="">
					综合
				</span>
			</div>
<!--            --><?php //if(empty($_GET['keyworlds'])){ ?>

			<div class="cl_top_div fun_click_color ">
				<span id="" class="duihuan" attr_type="orderBy" attr="goodsSales">
					兑换量
				</span>
			</div>
			<div class="cl_top_div fun_click_color">
				<span id="" class="duihuan" attr_type="orderBy" attr="goodsPriceType">
					兑换值
				</span>
				<a>
					<img src="<?php echo $pc_style; ?>images/up.png"/>
					<img src="<?php echo $pc_style; ?>images/down.png"/>
				</a>
			</div>
<!--            --><?php //} ?>
			<div class="cl_top_div fun_click_color">
				<span id="">
					人气
				</span>
				<a>
					<img src="<?php echo $pc_style; ?>images/up.png"/>
					<img src="<?php echo $pc_style; ?>images/down.png"/>
				</a>
			</div>
		</div>
		<div class="cl_top" id="funTab">
			<div class="cl_top_div ">
				<p class="cl_top_div_p">
					<span id="">
						品牌
					</span>
					<img src="<?php echo $pc_style; ?>images/down.png"/>
				</p>
			</div>
			<div class="cl_top_div fun_top_div1">
				<p class="cl_top_div_p">
					<span id="">
						三界石
					</span>
					<img src="<?php echo $pc_style; ?>images/down.png"/>
				</p>
			</div>
			<div class="cl_top_div ">
				<p class="cl_top_div_p">
					<span id="">
						尺寸
					</span>
					<img src="<?php echo $pc_style; ?>images/down.png"/>
				</p>
			</div>
			<div class="cl_top_div ">
				<p class="cl_top_div_p">
					<span id="">
						规格
					</span>
					<img src="<?php echo $pc_style; ?>images/down.png"/>
				</p>
			</div>
            <?php if(empty($_GET['keyworlds'])){ ?>
			<ul class="cl_top_ul">
				<li>
                    <a attr_type="money" attr="all" class="join">全部</a>
                    <a attr_type="money" attr="0-599" class="join">0-599</a>
                    <a attr_type="money" attr="600-999" class="join">600-999</a>
                    <a attr_type="money" attr="1000-1499" class="join">1000-1499</a>
                    <a attr_type="money" attr="1500-1999" class="join">1500-1999</a>
                    <a attr_type="money" attr="2000-2999" class="join">2000-2999</a>
                    <a attr_type="money" attr="3000-3999" class="join">3000-3999</a>
                    <a attr_type="money" attr="4000-4999" class="join">4000-4999</a>
                    <a attr_type="money" attr="5000-9999999" class="join">5000-9999999</a>
				</li>
				<li>
					<button>重置</button>
					<button class="queding">确定</button>
				</li>
			</ul>
            <?php } ?>
		</div>
		<div class="cl_center">
			<ul class="cl_center_ul"></ul>
		</div>
		<div class="sor_bootom">
			<img src="<?php echo $pc_style; ?>images/jiazaizhong.gif"/>
		</div>
		<div class="xiala_chi">
	
		</div>	
	</div>
	<footer>
		<ul>
			<li class="">
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['index/index']);?>">
					<div><img src="<?php echo $pc_style; ?>images/shouye-xuanzhong.png" alt=""></div>
					<p>三界商城</p>
				</a>
			</li>
			
		
			<!--<li>
				<a class="aaa" attr="shang">
					<div><img src="<?php echo $pc_style; ?>images/kefu-ct.png" alt=""></div>
					<p>商家</p>
				</a>
			</li>-->
			<li>
				<a class="aaa" attr="huo">
					<div><img src="<?php echo $pc_style; ?>images/kefutwo.png" alt=""></div>
					<p>发现</p>
				</a>
			</li>
			<li>
				<a href="<?php echo \Yii::$app->urlManager->createUrl(['user/usercenter']);?>">
					<div><img src="<?php echo $pc_style; ?>images/gerenzhongxin-ct.png" alt=""></div>
					<p>我的</p>
				</a>
			</li>
		</ul>
	</footer>
</div>
<script src="<?php echo $pc_style; ?>js/lib/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
<script>
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


var keyworlds = $(".sousuo").val();
if(keyworlds == ''){
	var keyworlds1="111";
	var weburl="<?php echo \Yii::$app->urlManager->createUrl(['goods/goodslist']);?>";
}else{
	keyworlds1="222";
	weburl="<?php echo \Yii::$app->urlManager->createUrl(['goods/search']);?>?keyworlds="+keyworlds;
}
	
    //兑换值，兑换量搜索
    $(function() {
    	//搜索关键字
		ajaxNlist(1,1,weburl,keyworlds1);
		$(".suoSou").click(function(){
			var keyworlds = $(".kuang").val();
			weburl="<?php echo \Yii::$app->urlManager->createUrl(['goods/search']);?>?keyworlds="+keyworlds;
			keyworlds1="222";
			ajaxNlist(1,1,weburl,keyworlds1);
		})
		//兑换值兑换量搜索
        $(".duihuan").click(function(){
            var orderBy = $(this).attr("attr");
            var catId = window.location.search.split("=")[1];
            weburl="<?php echo \Yii::$app->urlManager->createUrl(['goods/search1']);?>?catId="+catId+"&orderBy="+orderBy;
            ajaxNlist(1,1,weburl,keyworlds1);
        })
        //价格搜索
        $(".join").click(function(){
            $(this).siblings().css("color","");
            $(this).css("color","red");
            $(this).siblings().removeClass("par");
            $(this).addClass("par");
        })
        $(".queding").click(function(){
            var val = $(".par").html();
            if(val == "全部"){
                var val = 'all';
            }
            var catId = window.location.search.split("=")[1];
            weburl="<?php echo \Yii::$app->urlManager->createUrl(['goods/search2']);?>?catId="+catId+"&orderBy=goodsPriceType&money="+val;
            ajaxNlist(1,1,weburl,keyworlds1);
            $(".cl_top_ul").css("display","none");
        })
    })


	$(function(){
		/*fastclick解决移动端点击延迟的问题*/
		if ('addEventListener' in document) {
		    document.addEventListener('DOMContentLoaded', function() {
		        FastClick.attach(document.body);
		    }, false);
		}
		//tab切换
		$("#funTab").find(".fun_top_div1").click(function(){
			$(".cl_top_ul").css("display","block");
			$(this).find("p").addClass("fun_cl_tab");
			$(this).siblings().find("p").removeClass("fun_cl_tab");
			$(this).find("img").attr("src","<?php echo $pc_style; ?>images/up.png");
			$(this).siblings().find("img").attr("src","<?php echo $pc_style; ?>images/down.png");
		})
		$(".fun_top_div").click(function(){
			$("#funTab").find(".fun_top_div1").siblings().find("p").removeClass("fun_cl_tab");
			$("#funTab").find(".fun_top_div1").siblings().find("img").attr("src","<?php echo $pc_style; ?>images/down.png");
		})
		$(".fun_click_color").click(function(){
			$(this).addClass("cl_click_color");
			$(this).siblings().removeClass("cl_click_color");
			$(this).siblings().find("img").eq(0).attr("src","<?php echo $pc_style; ?>images/up.png");
			$(this).siblings().find("img").eq(1).attr("src","<?php echo $pc_style; ?>images/down.png");
		})
//		jQuery切换
		$(".fun_click_color").toggle(
			function(){
				$(this).find("img").eq(0).attr("src","<?php echo $pc_style; ?>images/up.png");
				$(this).find("img").eq(1).attr("src","<?php echo $pc_style; ?>images/down_red.png");

			},
			function(){
				$(this).find("img").eq(0).attr("src","<?php echo $pc_style; ?>images/up_red.png");
				$(this).find("img").eq(1).attr("src","<?php echo $pc_style; ?>images/down.png");
			}
		)
		//冒泡

		$(".cl_top_ul").click(function(){
           $('.queding').click(function(){
               $(".cl_top_ul").css("display","none");
               $(".cl_top_ul").css("display","none");
               $("#funTab").find(".fun_top_div1").find("p").removeClass("fun_cl_tab");
               $("#funTab").find(".fun_top_div1").find("img").attr("src","<?php echo $pc_style; ?>images/down.png");
           });

		})
		$(".cl_top_ul").find("a").click(function(){
			return false;
		})
})
	var totalPage=0;

$(function(){
	var PageNub=1;
			//下拉刷新，上拉加载；
            $(".cl_center").scroll(function() {
                //$(document).scrollTop() 获取垂直滚动的距离
                //$(document).scrollLeft() 这是获取水平滚动条的距离
                if ($(".main").scrollTop()<= 0) {
                }
                if ($(".cl_center").scrollTop() >= $(".cl_center_ul").height() - $(".xiala_chi").height()) {
//              	console.log(PageNub);
                    if(PageNub<totalPage){
                    	$(".sor_bootom").css("display","block");
                    	PageNub++;
                    	ajaxNlist(PageNub,2,weburl,keyworlds1);
                    }else{
                    	$(".sor_bootom").css("display","none");
                    }
                }
            });
})

	function ajaxNlist (currentPage,clickde,weburl,keyworlds1) {
		var catId = window.location.search.split("=")[1];
		// var keyworlds1 = window.location.search.split("?")[1].split("=")[0];
		$.ajax({
			type:"post",
			url:weburl,
			data: {'currentPage':currentPage,'catId':catId}, 
			async:true,
			datatype:"json",
			success:function(msg){ 
				var objdata = JSON.parse(msg);
				if(keyworlds1 =="222"){
					var obj=objdata.data.searchGood;
					//获取总页数
					totalPage=objdata.data.page.totalPage;
				}else if(keyworlds1 == "111"){
					var obj=objdata.data.goodsInfo;
					//获取总页数
					totalPage=objdata.data.page.totalPage;
				}
				if(totalPage==1){
                	$(".sor_bootom").css("display","none");
                }
                console.log(obj);
                if(obj != ''){
                	var allwrap="";
                	var dw="";
					$.each(obj, function(i) {
						
						if(obj[i].is_promote == 2){
							var alianjie="<?php echo \Yii::$app->urlManager->createUrl(['goods/newdetails']);?>?goodsId="+obj[i].goods_id+"&catId="+obj[i].cat_id+"&isPromote="+obj[i].is_promote;
							dw="人民币";
						}else{
							var alianjie="<?php echo \Yii::$app->urlManager->createUrl(['goods/details']);?>?goodsId="+obj[i].goods_id+"&catId="+obj[i].cat_id+"&isPromote="+obj[i].is_promote;
							dw="三界石";
						}
						var ajaxlist="<li><a href="+alianjie+"><img src=<?php echo "$pic_host" ?>"+
							obj[i].goods_img
						+" / ><div class='cl_center_right'><p>"+
							obj[i].goods_name
						+"</p><p class='cl_center_rig_p2'><span>"+
							obj[i].goods_price
						+"</span><span>"+dw+"</span></p><p class='cl_center_rig_p2'><em>已兑换</em><em>"+
							obj[i].goods_sales
						+"</em></p></div></a></li>"
						allwrap+=ajaxlist;
					})
                }else{
                	var kong = "";
                	kong += '<div class="empty_list">';
                	var alianjie="<?php echo $pc_style; ?>";
                    kong +='<img class="identity_img" src="'+alianjie+'images/shangpinzhanweitu.png"/>';
                    kong +='<p> 抱歉，该页面无内容 </p>';
                    kong += '</div>';
                    $('.cl_center').html(kong);
     //            	<div class="empty_list">
					// 	<img class="identity_img" src="<?php echo $pc_style; ?>images/shangpinzhanweitu.png"/>
					// 	<p> 抱歉，该页面无内容 </p>
					// </div>
                }
				
				if (clickde==1) {
					$(".main").find(".cl_center").find("ul").html(allwrap);
					$(".sor_bootom").css("display","none");
				}else if(clickde==2){
					$(".main").find(".cl_center").find("ul").append(allwrap);
					$(".sor_bootom").css("display","none");
				}
			}
		});
	}
</script>
</body>

</html>