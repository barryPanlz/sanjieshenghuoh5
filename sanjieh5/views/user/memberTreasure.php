<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title> 创业会员-转账 </title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/storetransfer.css"/>
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
	<style>
			.page_book {
			    width: 60%;
			    margin: .2rem auto;
			    display: block;
			    font-size: 0;
			    clear: both;
			}
			.page_book a:first-child {
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
			     float: left;
			    margin-left: 0.5rem; 
			}

		</style>
</head>
<body>
<div class="screen">
	<header>
		<h1>转账</h1>
		<a class="u_back" href="javascript:history.go(-1);">返回</a>
	</header>
	<div class="main no_footer_main">
		<!--普通会员信息--> 
	   <div class="u_list">
		<ul>
			<li>
				<div><img src="<?php echo $pc_style; ?>images/icon13.png" alt=""></div>
				<h4>账户余额</h4>
				<span><?php echo empty($details1->data->future_treasure) ? "0" : $details1->data->future_treasure?></span><span class="b">三界宝</span>
			</li>
			<li>
				<div><img src="<?php echo $pc_style; ?>images/icon16.png" alt=""></div>
				<h4>我的身份</h4>
				<span class="u_degree">
                    <?if(!empty($details1->data->user_type)){
                        if($details1->data->user_type ==1){
                            echo "普通会员";
                        }elseif($details1->data->user_type ==2){
                            echo "创业会员";
                        }elseif($details1->data->user_type ==3){
                            echo "店铺";
                        }elseif($details1->data->user_type ==4){
                            echo "供应商";
                        }elseif($details1->data->user_type ==5){
                            echo "代理商";
                        }
                    }?>
                </span>
			</li>
			<li>
				<div><img src="<?php echo $pc_style; ?>/images/icon19.png" alt=""></div>
				<h4>转账额度</h4>
				<span>0-1000个三界宝/次</span>
			</li>
		</ul>
	 </div>
	  
	  <!--店铺转账金额-->
	  <div class="store_tranfer_sum">
	  	<div class="store_tranfer_box">
	  		<span> 输入金额 </span>
	  		<input type="number" name="" id="money" placeholder="输入金额(三界宝)" />
	  	</div>
	  	<div class="store_tranfer_box">
	  		<span> 对方账户 </span>
	  		<input type="text" name="" id="revbankaccno" placeholder="输入对方账户" />
	  	</div>
	  </div>
	  
	  <div class="u_button store_tranfer_btn"><input type="button" value="确认转账" id="acOrder"></div>
	  <ul class="store_tranfer_list">
		<li class="list_title">
			<p>转账时间</p>
			<p>数量(三界宝)</p>
			<p>状态</p>
		</li>
		<?php if(!empty($datalist->list)){ foreach ($datalist->list as $key => $list) { ?>
			<li>
				<p><?php echo empty($list->outdate) ? "0" : substr($list->outdate,0,10); ?></p>
				<p><?php echo empty($list->outamnt) ? "0" : $list->outamnt; ?></p>
				<p><?php echo empty($list->status) ? "0" : $list->status; ?></p> 
			</li>
		<?php } }?>
	  </ul>
	  <!--            分页-->
			<div class="page_book">
                <!-- <a href="">上一页</a>
                <a href="">下一页</a> -->
                <?php if($page->currentPage >1){ ?>
                    <a href="<?php echo \Yii::$app->urlManager->createUrl(['user/treasure','currentPage' =>$page->currentPage - 1])?>">上一页</a>
                <?php } ?>
                <?php if($page->currentPage < $page->totalPage){ ?>
                    <a href="<?php echo \Yii::$app->urlManager->createUrl(['user/treasure','currentPage' =>$page->currentPage +1])?>">下一页</a>
                <?php }?>
			</div>
	  <div class="motai_succe store_tranfer_suc" style="display:none">
		转账成功
	  </div>

	  <div class="motai_lose store_tranfer_suc" style="display: none;">
		抱歉 当前余额不足
	  </div>
	</div>

</div>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
<script>
    $("#acOrder").click(function(){
        $("#acOrder").attr("disabled","disabled");
        $("#acOrder").css("background","#dedede");
//		    	$(".modal_order").css("display","block");
        var money = $("#money").val();
        var revbankaccno = $("#revbankaccno").val();
        $.ajax({
            url:"<?php echo \Yii::$app->urlManager->createUrl(['user/treasure']);?>",
            data:{"money":money,"revbankaccno":revbankaccno},
            type:"post",
            dataType:"json",
            success:function(data){
                $("#acOrder").removeAttr("disabled");
                $("#acOrder").css("background","#f3001d");
                if(data.errorCode == 0){
                    $(".motai_succe").css("display","block");
                    setTimeout(location.href="<?php echo \Yii::$app->urlManager->createUrl(['user/genacc']);?>",5000);
                }else if(data.errorCode == -2){
                    alert("登录超时，请重新登录");location.href('<?php echo \Yii::$app->urlManager->createUrl(['index/login'])?>');
                }else if(data.errorCode ==-18){
                    alert("账户不存在");
                }else if(data.errorCode ==-34){
                    alert("网络繁忙，请稍后重试");
                }else if(data.errorCode ==-40){
                    alert("您没有转账权限");
                }else if(data.errorCode ==-42){
                    alert("对方账户不存在");
                }else if(data.errorCode ==-50){
                    alert("余额不足");
                }else if(data.errorCode ==-44){
                    alert("低于转账最小额");
                }else if(data.errorCode ==-15){
                    alert("请输入正确的金额和账号");
                }else if(data.errorCode ==-60){
                    alert("功能暂未开放,敬请期待");
                }else if(data.errorCode ==-62){
                    alert("上笔订单处理中,请稍后重试");
                }else if(data.errorCode ==-63){
                    alert("不能给自己转账");
                }else if(data.errorCode ==-64){
                    alert("其他未知错误");
                }else if(data.errorCode ==-81){
                    alert(data.message);
                }else{
                    alert(data.message);
                }
            },
            error:function(){
                $("#acOrder").removeAttr("disabled");
                $("#acOrder").css("background","#f3001d");
                alert("网络异常");
            }
        });
    })
	/*fastclick解决移动端点击延迟的问题*/
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	}
</script>
</body>
</html>