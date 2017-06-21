<?php
    use yii\helpers\Url;
?>
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
	<!--三界本地应+.u_live_header-->
	<header class="">
		<a class="u_back" href="javascript:history.go(-1);">返回</a>
<form action="<?php echo \Yii::$app->urlManager->createUrl(['goods/goodslist']);?>" method="get">
		<div class="u_search_box">
			<input type="text" class="kuang" name="keyworlds" placeholder="搜索关键字">
			<input type="submit" class="suoSou" id="" >
		</div>
</form>
	</header>
	<div class="main">
		<div class="classfy_top">全部分类</div>
		<section>
			<div class="classfy_list">
				<ul class="classfy_left">
<!--                    --><?php //foreach($newcategory as $k=>$cate){ ?>
<!--                         <li class="now_choose"><a href="#">--><?php //echo $cate['topic']; ?><!--</a></li>-->
<!--                    --><?php //}?>

                        <li class="now_choose"><a href="#" id="live">生活电器</a></li>
                        <li><a href="#" id="shu">数码手机</a></li>
                        <li><a href="#" id="home">家具家居</a></li>
                        <li><a href="#" id="hua">化妆护理</a></li>
                        <li><a href="#" id="fu">服饰箱包</a></li>
                        <li><a href="#" id="yun">运动户外</a></li>
                        <li><a href="#" id="qi">汽车用品</a></li>
                        <li><a href="#" id="shi">食品饮料</a></li>
                        <li><a href="#" id="mu">母婴玩具</a></li>
                        <li><a href="#" id="tu">图书音像</a></li>
				</ul>
				<div class="classfy_right">
					<div class="advert_box">
						<img src="<?php echo $pc_style; ?>images/img18.png" alt="">
						<img src="<?php echo $pc_style; ?>images/img19.png" alt="">
						<img src="<?php echo $pc_style; ?>images/img20.png" alt="">
					</div>
					<!--三界本地应+.live_classfy_in-->
					<div class="classfy_in">
						<ul class="cate">

						</ul>
					</div>
				</div>
			</div>
		</section>
	</div>
	<footer>
		<ul>
			<li class="nowpage">
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

    //搜索
    $(".u_search").click(function(){
        var searchMsg = $("#searchMsg").val();
        $.ajax({
            url: "<?php echo Yii::$app->urlManager->createUrl('goods/search');?>",
            type: 'post',
            data: {'searchMsg': searchMsg},
            dataType: 'json',
            success: function (data) {

            },
            error:function(error){
                alert("error!");
            }
        });

    });
    window.onload=function(){
        var level = '1';
        $.ajax({
            type:'POST',
            data:{'level':level},
            dataType:'json',
            url:'<?php echo Yii::$app->urlManager->createUrl('goods/goodscat');?>',
            success:function(data){
                $(".cate").empty();
                var catId = data.cat_id;
                var cate_name = data.info;
                for( var i = 0; i < cate_name.length; i++){
                    $('.cate').append('<li><a href="<?php echo Yii::$app->urlManager->createUrl('goods/goodslist');?>?catId='+catId[i]+'">'+cate_name[i]+"</a></li>");

                    //$('.cate').append('<li>'+cate_name[i]+'</li>');
                }
            },
            error:function(){
                alert("error");
            }
        });
    }
    //获取分类level
    $("#live").click(function(){
       var level = '1';
        $.ajax({
            type:'POST',
            data:{'level':level},
            dataType:'json',
            url:'<?php echo Yii::$app->urlManager->createUrl('goods/goodscat');?>',
            success:function(data){
                $(".cate").empty();
                var catId = data.cat_id;
                var cate_name = data.info;
                for( var i = 0; i < cate_name.length; i++){
                       $('.cate').append('<li><a href="<?php echo Yii::$app->urlManager->createUrl('goods/goodslist');?>?catId='+catId[i]+'">'+cate_name[i]+"</a></li>");

                    //$('.cate').append('<li>'+cate_name[i]+'</li>');
                }
            },
            error:function(){
                alert("error");
            }
        });
    });
$("#shu").click(function(){
    var level = '2';
    $.ajax({
        type:'POST',
        data:{'level':level},
        dataType:'json',
        url:'<?php echo Yii::$app->urlManager->createUrl('goods/goodscat');?>',
        success:function(data){
            $(".cate").empty();
            var catId = data.cat_id;
            var cate_name = data.info;
            for( var i = 0; i < cate_name.length; i++){
               $('.cate').append('<li><a href="<?php echo Yii::$app->urlManager->createUrl('goods/goodslist');?>?catId='+catId[i]+'">'+cate_name[i]+"</a></li>");

                //$('.cate').append('<li>'+cate_name[i]+'</li>');
            }
        },
        error:function(){
            alert("error");
        }
    });
});
    $("#home").click(function(){
        var level = '3';
        $.ajax({
            type:'POST',
            data:{'level':level},
            dataType:'json',
            url:'<?php echo Yii::$app->urlManager->createUrl('goods/goodscat');?>',
            success:function(data){
                $(".cate").empty();
                var catId = data.cat_id;
                var cate_name = data.info;
                for( var i = 0; i < cate_name.length; i++){
                    $('.cate').append('<li><a href="<?php echo Yii::$app->urlManager->createUrl('goods/goodslist');?>?catId='+catId[i]+'">'+cate_name[i]+"</a></li>");

                    //$('.cate').append('<li>'+cate_name[i]+'</li>');
                }
            },
            error:function(){
                alert("error");
            }
        });
    });
    $("#hua").click(function(){
        var level = '4';
        $.ajax({
            type:'POST',
            data:{'level':level},
            dataType:'json',
            url:'<?php echo Yii::$app->urlManager->createUrl('goods/goodscat');?>',
            success:function(data){
                $(".cate").empty();
                var catId = data.cat_id;
                var cate_name = data.info;
                for( var i = 0; i < cate_name.length; i++){
                    $('.cate').append('<li><a href="<?php echo Yii::$app->urlManager->createUrl('goods/goodslist');?>?catId='+catId[i]+'">'+cate_name[i]+"</a></li>");

                    //$('.cate').append('<li>'+cate_name[i]+'</li>');
                }
            },
            error:function(){
                alert("error");
            }
        });
    });
    $("#fu").click(function(){
        var level = '5';
        $.ajax({
            type:'POST',
            data:{'level':level},
            dataType:'json',
            url:'<?php echo Yii::$app->urlManager->createUrl('goods/goodscat');?>',
            success:function(data){
                $(".cate").empty();
                var catId = data.cat_id;
                var cate_name = data.info;
                for( var i = 0; i < cate_name.length; i++){
                    $('.cate').append('<li><a href="<?php echo Yii::$app->urlManager->createUrl('goods/goodslist');?>?catId='+catId[i]+'">'+cate_name[i]+"</a></li>");

                    //$('.cate').append('<li>'+cate_name[i]+'</li>');
                }
            },
            error:function(){
                alert("error");
            }
        });
    });
    $("#yun").click(function(){
        var level = '6';
        $.ajax({
            type:'POST',
            data:{'level':level},
            dataType:'json',
            url:'<?php echo Yii::$app->urlManager->createUrl('goods/goodscat');?>',
            success:function(data){
                $(".cate").empty();
                var catId = data.cat_id;
                var cate_name = data.info;
                for( var i = 0; i < cate_name.length; i++){
                    $('.cate').append('<li><a href="<?php echo Yii::$app->urlManager->createUrl('goods/goodslist');?>?catId='+catId[i]+'">'+cate_name[i]+"</a></li>");

                    //$('.cate').append('<li>'+cate_name[i]+'</li>');
                }
            },
            error:function(){
                alert("error");
            }
        });
    });
    $("#qi").click(function(){
        var level = '7';
        $.ajax({
            type:'POST',
            data:{'level':level},
            dataType:'json',
            url:'<?php echo Yii::$app->urlManager->createUrl('goods/goodscat');?>',
            success:function(data){
                $(".cate").empty();
                var catId = data.cat_id;
                var cate_name = data.info;
                for( var i = 0; i < cate_name.length; i++){
                    $('.cate').append('<li><a href="<?php echo Yii::$app->urlManager->createUrl('goods/goodslist');?>?catId='+catId[i]+'">'+cate_name[i]+"</a></li>");

                    //$('.cate').append('<li>'+cate_name[i]+'</li>');
                }
            },
            error:function(){
                alert("error");
            }
        });
    });
    $("#shi").click(function(){
        var level = '8';
        $.ajax({
            type:'POST',
            data:{'level':level},
            dataType:'json',
            url:'<?php echo Yii::$app->urlManager->createUrl('goods/goodscat');?>',
            success:function(data){
                $(".cate").empty();
                var catId = data.cat_id;
                var cate_name = data.info;
                for( var i = 0; i < cate_name.length; i++){
                    $('.cate').append('<li><a href="<?php echo Yii::$app->urlManager->createUrl('goods/goodslist');?>?catId='+catId[i]+'">'+cate_name[i]+"</a></li>");

                    //$('.cate').append('<li>'+cate_name[i]+'</li>');
                }
            },
            error:function(){
                alert("error");
            }
        });
    });
    $("#mu").click(function(){
        var level = '9';
        $.ajax({
            type:'POST',
            data:{'level':level},
            dataType:'json',
            url:'<?php echo Yii::$app->urlManager->createUrl('goods/goodscat');?>',
            success:function(data){
                $(".cate").empty();
                var catId = data.cat_id;
                var cate_name = data.info;
                for( var i = 0; i < cate_name.length; i++){
                    $('.cate').append('<li><a href="<?php echo Yii::$app->urlManager->createUrl('goods/goodslist');?>?catId='+catId[i]+'">'+cate_name[i]+"</a></li>");
                    //$('.cate').append('<li>'+cate_name[i]+'</li>');
                }
            },
            error:function(){
                alert("error");
            }
        });
    });
    $("#tu").click(function(){
        var level = '10';
        $.ajax({
            type:'POST',
            data:{'level':level},
            dataType:'json',
            url:'<?php echo Yii::$app->urlManager->createUrl('goods/goodscat');?>',
            success:function(data){
                $(".cate").empty();
                var catId = data.cat_id;
                var cate_name = data.info;
                for( var i = 0; i < cate_name.length; i++){
                    $('.cate').append('<li><a href="<?php echo Yii::$app->urlManager->createUrl('goods/goodslist');?>?catId='+catId[i]+'">'+cate_name[i]+"</a></li>");

                    //$('.cate').append('<li>'+cate_name[i]+'</li>');
                }
            },
            error:function(){
                alert("error");
            }
        });
    });

	/*fastclick解决移动端点击延迟的问题*/
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	}
	$('.classfy_left li').click(function(event) {
		$(this).addClass('now_choose').siblings('li').removeClass('now_choose');
	});
</script>
</body>
</html>