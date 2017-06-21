<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
    <title>购物车</title>
    <script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
    <link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/shopcar.css"/>
</head>
<body>
<div class="screen">
    <header>
    	<a class="u_back" href="javascript:history.go(-1);"></a>
        <h1>购物车</h1>
        <a class="u_edit" id="scDele" href="#">编辑</a>
        <a class="u_edit" id="scSucc" href="#">完成</a>
    </header>
    <div class="main">

        <div class="sc_shangpin_wrap sub_center">
            <?php foreach($goods_list as $v){ ?>
            <ul class="wrap-item" id="<?php echo $v['id'];?>">
                <li class="item-sel">
                    <input type="checkbox" name="cbBox[]" class="sub_center_chec checkAll" attr="<?php echo $v['id']; ?>" />
                    <a href="<?php echo \Yii::$app->urlManager->createUrl(['goods/details','goodsId' =>$v['goods_id'],'catId'=>$v['cat_id']]);?>">
                        <div class="sub_li_left">
                            <img src="<?php echo $pic_host.$v['goods_img']; ?>" alt="" />
                        </div>
                        <div class="sub_li_right">
                            <p><?php echo $v['goods_name']; ?></p>
                            <p>
                                <span><?php echo $v['sku_info'];?></span>
                            </p>
                            <p>
                                <b><i class="shopPrice"><?php echo $v['goods_price']; ?></i><i>三界石</i></b>
                                <em class="jiajian" style="border:none">
<!--                                    --><?php //echo $v['num']; ?>
                                    <!--<span class="oper jia_up" title="减一">-</span>-->
                                    <input type="number" name="" class="onub" value="<?php echo $v['num']; ?>" style="border:none"/>
<!--                                    <input type="hidden" name="" disabled="" class="onub" value="--><?php //echo $v['num']; ?><!--" />-->
                                    <!--<span class="oper jian_next" title="加一">+</span>-->
                                </em>
                            </p>

                        </div>
                    </a>
                </li>


            </ul>
            <?php } ?>
        </div>

    </div>
    <div class="sc_bottom">
        <div class="sc_bottom_left">
            <label for="u_checkbox"><input id="u_checkbox" type="checkbox">全选</label>
        </div>
        <div class="sc_bottom_center">
            <p>
                <span>合计：</span>
                <i id="shopNumber">0</i>
<!--                <li id="settle-all">00.00</li>-->
                <span>三界石</span>
            </p>
            <li>
                不含运费
            </li>
        </div>
        <button class="sc_bottom_right fun_jiesuan" id='jiesuan'>
            去结算
        </button>
        <button class="sc_bottom_right fun_shanchu">
            删除
        </button>
    </div>
    <footer>
        <ul>
            <li class="nowpage">
                <a href="<?php echo \Yii::$app->urlManager->createUrl(['index/index']);?>">
                    <div><img src="<?php echo $pc_style; ?>images/shouye-xuanzhong.png" alt=""></div>
                    <p class="active_t">三界商城</p>
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
                    <p  class="">发现</p>
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

<div class="sr_model_wrap fun_model_wrap_al">
    <div class="sr_model_wrap1">
        <div class="sr_model">
<!--            你确定要删除这<span id="srModelNub">0</span>商品么？-->
            你确定要删除吗？
        </div>
        <li class="sr_model_sub_wrap">
            <button id="dele_shanchu">
                取消
            </button>
            <button id="funSure">
                <input class="yes del_all" type="button" value="确认">
            </button>
        </li>
    </div>
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





if($('.sc_shangpin_wrap ul').find("li").length == 0){
        //显示空购物车页面
        location.href="<?php echo \Yii::$app->urlManager->createUrl(['car/kongcar']);?>";
    }
    //去结算
    $("#jiesuan").click(function(){
        var num = $(".onub").val();
        var arr = Array();
        $('.wrap-item .item-sel input').each(function(){
            if($(this).prop('checked')==true){
                car_id = '';
                $('.wrap-item .item-sel input').each(function(){
                    if($(this).prop('checked')==true){
                        car_id += $(this).attr('attr')+',';
                    }
                });
                car_id = car_id.substring(0,car_id.length-1);
                location.href="<?php echo Yii::$app->urlManager->createUrl('order/found_order'); ?>?car_id="+car_id+"&isPromote=0"+"&num="+num;
            }
        });
    })


    $(function(){
    	 $(".checkAll").prop("checked",false);
    	 $("#u_checkbox").prop("checked",false);
        //全选删除
        $('.mid-all input,.all-sel input').click(function(){
            $('.wrap-item .item-sel input[name="cbBox[]"]').prop('checked',$(this).prop('checked'));
            $('.all-sel input').prop('checked',$(this).prop('checked'));
            $('.mid-all input').prop('checked',$(this).prop('checked'));
            var x=$('.mid-all input').prop('checked')==true;
            if(x){
                $('.cart-btm-del span').click(function(){
                    $('.cart-del-mark').show();
                })
            }
            $('.mark-btm .yes').click(function(){
                $('.cart-wrap .wrap-item').remove();
                $('.cart-del-mark').hide();
            })
        })

        //单选,多选删除
        var inputStr=[];
        $('.wrap-item .item-sel input').click(function(){
            var xxx=$(this).parents('.wrap-item ').index();
            var seled = $(this).prop('checked')==true;
            if(seled){
                inputStr.push(xxx);
            }
        })
        //console.log(inputStr);
        $('.sc_bottom_right').click(function(){
            var num = $("input[name='cbBox[]']:checked").length;
            //显示删除的遮罩层
            $('.sr_model').show();
            $('.sr_model').html('删除这'+num+'种商品吗？');
            $('.yes').click(function(event){
                car_id = '';
                $('.wrap-item .item-sel input').each(function(){
                    if($(this).prop('checked')==true){
                        //attr = $(this).attr('attr');
                        car_id += $(this).attr('attr')+',';
                        //alert(cat_id); return false;
                        $(this).parents('.wrap-item').remove();
                    }
                });
                car_id = car_id.substring(0,car_id.length-1);
                //alert(cat_id); return false;
                $.ajax({
                    type:'POST',
                    data:'car_id='+car_id,
                    dataType:'json',
                    url:'<?php echo Yii::$app->urlManager->createUrl('car/delallcar'); ?>',
                    success:function(data){
                        if(data.errno==0){
                            alert(data.error);
                            $(this).parent('.sc_shangpin_wrap .wrap-item').remove();
                            if($('.sc_shangpin_wrap ul').find("li").length == 0){
                                //显示空购物车页面
                                location.href="<?php echo \Yii::$app->urlManager->createUrl(['car/kongcar']);?>";
                            }else{
                                //刷新购物车
                                 location.href="<?php echo \Yii::$app->urlManager->createUrl(['car/car']);?>";
                           }
                        }else{
                            alert(data.error);
                        }
                    }
                })
                //var tmp = $(this).attr('attr').split(',');
                $('.sr_model_wrap').hide();
                inputStr=[];
            })
        })

    })

    $(document).ready(function() {
        if ('addEventListener' in document) {
            document.addEventListener('DOMContentLoaded', function() {
                FastClick.attach(document.body);
            }, false);
        }
        $("#scDele").click(function(){
            $("#scDele").css("display","none");
            $("#scSucc").css("display","block");
            $(".fun_jiesuan").css("display","none");
            $(".fun_shanchu").css("display","block");
            eaShuaxin()
            return false;
        })
        $("#scSucc").click(function(){
            $("#scSucc").css("display","none");
            $("#scDele").css("display","block");
            $(".fun_shanchu").css("display","none");
            $(".fun_jiesuan").css("display","block");
            eaShuaxin()
            return false;
        });
        //	加减号
        //数字加减
        var numVal = 0;
        $(".jia_up").click(function(){
//            numVal=$(this).siblings('.onub').val();
//            var hejiNub=$("#shopNumber").text();
            $(this).parent(".jiajian").find(".oper").css("color","#282828");
            oNub=$(this).parent(".jiajian").find(".onub").val();

            oNub--;
            if(oNub<1){
                oNub=1;
                $(this).parent(".jiajian").find(".jia_up").css("color","#999999");
                var shopmony=$(this).parents("li").find(".shopPrice").text();
                var shopnub=$(this).parents("li").find(".onub").val();
                var shopAllmonye=parseFloat("0");
                var hejiNub=$("#shopNumber").text();
                var allNub=parseFloat(hejiNub)+parseInt(shopAllmonye);
            }else{
                if($(this).parents("li").find(".checkAll").is(':checked')){
                    var shopmony=$(this).parents("li").find(".shopPrice").text();
                    var shopnub=$(this).parents("li").find(".onub").val();
                    var shopAllmonye=parseFloat(-shopmony);
                    var hejiNub=$("#shopNumber").text();
                    var allNub=parseFloat(hejiNub)+parseInt(shopAllmonye);
                    $("#shopNumber").text(allNub);
                }
            }
            $(this).parent(".jiajian").find(".onub").val(oNub);
            return false;
        });
        $(".jian_next").click(function(){
            $(this).parent(".jiajian").find(".oper").css("color","#282828");
            oNub=$(this).parent(".jiajian").find(".onub").val();
            oNub++;
            if($(this).parents("li").find(".checkAll").is(':checked')){
                var shopmony=$(this).parents("li").find(".shopPrice").text();
                var shopnub=$(this).parents("li").find(".onub").val();
                var shopAllmonye=parseFloat(+shopmony);
                var hejiNub=$("#shopNumber").text();
                var allNub=parseFloat(hejiNub)+parseInt(shopAllmonye);
                $("#shopNumber").text(allNub);
            }
            $(this).parent(".jiajian").find(".onub").val(oNub);
            return false;
        })
        //全选
        var shopNumber=$("#shopNumber").text();
			
        $("#u_checkbox").click(function(){
            var oli=$(".sc_shangpin_wrap ").find("ul").find("li");

            if($("#u_checkbox").is(':checked')){
				 $(".sc_bottom").find("button").addClass("sc_bottom_right1");
                $(".checkAll").prop("checked",true);
                var sub=0;
                $.each(oli, function(n) {
                    var shopPret=$(".shopPrice").eq(n).text();
                    console.log(shopPret);
                    var shopNub=$(".onub").eq(n).val();
                    var shopAllmonye = parseFloat(shopPret*shopNub);
                    sub += shopAllmonye;
                });
                $("#shopNumber").text(sub);
            }else{
                $(".checkAll").prop("checked",false);
                $("#shopNumber").text("0");
                $(".sc_bottom").find("button").removeClass("sc_bottom_right1");
            }
        })
        //	单个选
        $(".sc_shangpin_wrap").find(".checkAll").click(function(){
        	eacherxuan();
            var shopmony=$(this).parents("li").find(".shopPrice").text();

            var shopnub=$(this).parents("li").find(".onub").val();
            var shopAllmonye=parseFloat(shopmony*shopnub);
            var hejiNub=$("#shopNumber").text();
            if($(this).is(':checked')){
                $(this).prop("checked",true);
                var allNub=parseFloat(hejiNub)+parseInt(shopAllmonye);
                eacher();
            }else{
                $("#u_checkbox").prop("checked",false);
                $(this).prop("checked",false);
                var allNub=parseFloat(hejiNub)-parseInt(shopAllmonye)
            }
            $("#shopNumber").text(allNub);
        });
        //	单选遍历是否全选
        function eacher(){
            var oli=$(".sc_shangpin_wrap ").find("ul").find(".checkAll");
            $.each(oli, function(n) {
                if($(this).is(':checked')==false){
                    $("#u_checkbox").prop("checked",false);
                    return false;
                }else{
                    $("#u_checkbox").prop("checked",true);
                }
            });
        }
                //	遍历是否选中
        function eacherxuan(){
            var oli=$(".sc_shangpin_wrap ").find("ul").find(".checkAll");
            $.each(oli, function(n) {
                if($(this).is(':checked')==true){
                    $(".sc_bottom").find("button").addClass("sc_bottom_right1");
                    return false;
                }else{
                    $(".sc_bottom").find("button").removeClass("sc_bottom_right1");
                }
            });
        }


    })
    //	删除弹框
    $(".fun_shanchu").click(function(){
        checknub();
    })
	
    //	遍历计算选中几个
    function checknub(){
        var ocheck=$(".sc_shangpin_wrap ").find("ul").find(".checkAll");
        var ochecknub=0;
        $.each(ocheck, function(n) {
            if($(this).is(':checked')==true){
                ochecknub++;
                $(".fun_model_wrap_al").css("display","block");
            }
        });
        $("#srModelNub").text(ochecknub);
    }
    $("#dele_shanchu").click(function(){
        $(".fun_model_wrap_al").css("display","none");
    });
    //每次编辑和完成切换都刷新所选按钮为空
    function eaShuaxin(){
        var oli=$(".sc_shangpin_wrap ").find("ul").find(".checkAll");
        $.each(oli, function(n) {
            if($(this).is(':checked')){
                $(this).prop("checked",false);
                $("#u_checkbox").prop("checked",false);
            }
        });
    }



    function alertmessage(html){
        if(!$('.error_tip').is(":animated")){
            $('.error_tip').show(100, function() {
                $('.error_tip').html(html);//这里输入要提示的内容
                $('.error_tip').animate({
                    opacity: 1
                },1000, function() {
                    window.setTimeout(function(){
                        $('.error_tip').animate({
                                opacity: 0
                            },
                            1000, function() {
                                $('.not_empty').hide();
                            });
                    }, 2000)
                });
            });
        }
    }
</script>
</body>
</html>