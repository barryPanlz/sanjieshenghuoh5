<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>三界本地-商品分类</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/classfy.css">
	<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/rem.js"></script>
</head>
<body>
<div class="screen">
	<header class="u_live_header">

		<a class="u_back" onclick="history.go(-1)">返回</a>
        <form action="<?php echo \Yii::$app->urlManager->createUrl(['life/goodsearch']);?>" method="get" id="formid">
		<div class="u_search_box">
			<input type="text" name="keyworlds" class="keyworlds" placeholder="搜索关键字">
			<span class="u_search">搜索</span>
		</div>
        </form>
	</header>
	<div class="main">
		<div class="classfy_top">全部分类</div>
		<section>
			<div class="classfy_list">
				<ul class="classfy_left">
					<?php foreach ($goodslist as $key => $v) { ?>
					    <input type="hidden" class="cat_id" value="<?php echo $v['cat_id']; ?>" id="catid_<?=$key+1; ?>" />
						<li class="now_choose"><a href="<?php echo Yii::$app->urlManager->createUrl(['life/all_cat','parent_id'=>$v['cat_id']]);?>" id="cat_id"><?php echo $v['cat_name'];?></a></li>
					<?php }?>
				</ul>
				<div class="classfy_right">
					<div class="advert_box">
						<img src="<?php echo $pc_style; ?>images/img18.png" alt="">
						<img src="<?php echo $pc_style; ?>images/img19.png" alt="">
						<img src="<?php echo $pc_style; ?>images/img20.png" alt="">
					</div>
					<div class="classfy_in live_classfy_in">
						<ul class="ajax_add">
                           <?php if(!empty($catlist)){ foreach($catlist as $v){ ?>
							<li><a href="<?php echo Yii::$app->urlManager->createUrl(['life/goodslist','catId'=>$v['cat_id']]);?>"><?php echo empty($v['cat_name'])?'':$v['cat_name']; ?></a></li>
                            <?php }}?>
						
						</ul>
					</div>
				</div>
					
				<!-- <ul class="classfy_left">
					<li class="now_choose" attr_id="2"><a>休闲娱乐</a></li>
					<li attr_id="1"><a>美食餐饮</a></li>
					<li attr_id="3"><a>旅游</a></li>
					<li attr_id="4"><a>酒店</a></li>
					<li attr_id="5"><a>生活服务</a></li>
					<li attr_id="6"><a>婚庆</a></li>
				</ul>
				<div class="classfy_right">
					<div class="advert_box">
						<img src="<?php echo $pc_style; ?>images/img18.png" alt="">
						<img src="<?php echo $pc_style; ?>images/img19.png" alt="">
						<img src="<?php echo $pc_style; ?>images/img20.png" alt="">
					</div>
					<div class="classfy_in live_classfy_in">
						<ul class="ajax_add">
                        <?php if(!empty($category['res'])){ foreach($category['res'] as $v){ ?>
							<li><a href="<?php echo Yii::$app->urlManager->createUrl(['life/goodslist','catId'=>$v['cat_id']]);?>"><?php echo $v['cat_name']; ?></a></li>
                        <?php } }?>
						</ul>
					</div>
				</div> -->
			</div>
		</section>
	</div>
	<footer>
		<ul>
			<li>
				<a href="<?php echo Yii::$app->urlManager->createUrl('index/index');?>">
					<div><img src="<?php echo $pc_style; ?>images/shouye-ct.png" alt=""></div>
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
	}
    $(".u_search").click( function(){
    	 var keyworlds = $(".keyworlds").val();
        	if(keyworlds == ''){
        		return false;
        	}
         $("#formid").submit();
    })
	// $('.classfy_left li').click(function(event) {
	// 	//$(this).addClass('now_choose').siblings('li').removeClass('now_choose');
 //        var category = $(this).attr("attr_id");
 //         $.ajax({
 //                type:'get',
 //                data:'category='+category,
 //                dataType:'json',
 //                url:'<?php echo Yii::$app->urlManager->createUrl('life/get_cat');?>',
 //                success:function(data){
 //                     if(data.errno==0){
 //                        var html = '';
 //                        $.each(data.data.res,function(i){
 //    				        html += "<li><a href=<?php echo Yii::$app->urlManager->createUrl('life/goodslist');?>?catId="+this.cat_id+">"+this.cat_name+"</a></li>";
 //                        });
 //                        $('.ajax_add').html(html);
 //                     }else{
 //                        alert("网络错误！");
 //                     }
 //                },
 //         });
	// });
</script>
</body>
</html>