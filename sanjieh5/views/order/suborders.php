<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
    <title>提交订单</title>
    <link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
    <link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $pc_style; ?>css/private/suborder.css"/>
    <script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="screen">
    <header>
        <h1>提交订单</h1>
        <a class="u_back" href="<?php echo Yii::$app->urlManager->createUrl('user/usercenter');?>">返回</a>
    </header>
    <div class="main">
        <a href="<?php echo Yii::$app->urlManager->createUrl('user/useraddresslist');?>">
        <div class="sub_top">
        <?php if(!empty($user_address)){ foreach ($user_address as $key => $value1) { ?>

            <?php if($value1['default'] == 1){
                    $the_addr = $value1;
                } 
            ?>
        <?php }}?>

            <?php if(!empty($user_address) && !empty($the_addr) && count($the_addr)){ ?>
                <ul class="sub_top_left">

                    <li>
                        <span class="u u-act fl" attr_id="<?=$the_addr['address_id']?>">
                            <?=$the_addr['consignee']?>
                        </span>
                        <em><?=$the_addr['mobile']?></em>
                    </li>
                    <li><?=$the_addr['province'].$the_addr['area'].$the_addr['address']?></li>
                    <?php $address_id = $the_addr['address_id'];?>


                    <input type="hidden" name="ajax_address_id" value="<?php echo !empty($address_id)?$address_id:"";?>" />
                </ul>
                <div class="sub_top_right">
                        <a class="save_cookie">
                            <img src="<?php echo $pc_style; ?>images/back.png"/>
                        </a>
                </div>
            <?php }else{ ?>
                <ul class="sub_top_left_1">
                    请添加收货地址
                </ul>
                <div class="sub_top_right">
                    <!--                    添加收货地址-->
                    <!--                    <a href="--><?php //echo Yii::$app->urlManager->createUrl('user/address');?><!--">-->
                    <a class="save_cookie">
                        <img src="<?php echo $pc_style; ?>images/back.png"/>
                    </a>
                </div>
            <?php }?>
        </div>
</a>

        <div class="sub_center">
            <ul>
                <?php $count_money = 0; foreach($goods as $v){ ?>
                    <li>
                    <input type="hidden" id='num' value="<?php echo $_GET['num']; ?>">
                    <input type="hidden" id='isPromote' value="<?php echo $_GET['isPromote']; ?>">
                        <input type="hidden" name="goods_id[]" value="<?php echo $v['goodsId']; ?>" />
                        <input type="hidden" name="goods_num[]" value="<?php echo $v['num']; ?>" />
                        
                        <input type="hidden" name="skuValue[]" value="<?php echo $v['skuValue']; ?>" />
                        <input type="hidden" name="ismutilprice[]" value="<?php echo empty($v['skuValue']) ? '0' : '1'; ?>" />
                        <input type="hidden" id= "isPromote" value="<?php echo $v['isPromote'];?>">
                        <input type="hidden" id= "activityId" value="<?php echo $v['activityId'];?>">
                        
                        <div class="sub_li_left">
                            <img src="<?php echo $pic_host.$v['goodsImg']; ?>"/>
                        </div>
                        <div class="sub_li_right">
                            <p><?php echo $v['goodsName']; ?></p>

                            <?php if (!empty($_GET['sku_id'])){ ?>
                                <p><span><?php echo $_GET['sku_id']?></span></p>
                            <?  }else{?>
                                <p><span><?php  echo $v['skuInfo']?></span></p>
                            <?php }?>
                            <input type="hidden" name="skuInfo[]" value="<?php echo $v['skuInfo']?>">
                            <!-- <p><span><?php //echo $v['skuInfo'];?></span></p> -->
                            <p>
                                <b><i class="shopPrice"><?php echo $v['goodsPrice']; ?></i>
                                 <?php if ($_GET['isPromote'] == '2'){ ?>
                               <i>人民币</i>
                            <?  }else{?>
                                   <i>三界石</i>
                            <?php }?>
                                </b>
                                <!--							<em class="jiajian">-->
                                <!--								<span class="oper jia_up" title="减一">-</span>-->
                                <!--							 	<input type="number" name="" class="onub" value="1" />-->
                                <!--							 	<span class=".oper jian_next" title="加一">+</span>-->
                                <!--							</em>-->

                                <!--                                购买数量-->
                                <!-- <em class="jiajian">
                                <span class="oper jia_up" title="减一">-</span>
                                <input type="number" name="" class="onub" value="<?php /*echo $v['num']; */?>" />
                                <span class="oper jian_next" title="加一">+</span>
                            </em>-->
                                <?php if($v['isPromote'] ==1){ ?>
                                    <em class="jiajian" style="font-size: 0.32rem; text-align: center;line-height: 0.45rem; font-style:normal;border:none;">
                                        <input style="border: none; margin-top:0.1rem ;" type="number" name="" class="onub" value="<?php echo $v['num']; ?>"  readonly="readonly"/>
                                    </em>
                                <?php }else if($v['isPromote'] ==2){ ?>
                                    <em class="jiajian" style="font-size: 0.32rem; text-align: center;line-height: 0.45rem; font-style:normal;border:none;">
                                        <input style="border: none; margin-top:0.1rem ;" type="number" name="" class="onub" value="<?php echo $_GET['num']; ?>"  readonly="readonly"/>
                                    </em>

                                <?php }else{?>
                                    <em class="jiajian" style="font-size: 0.32rem; text-align: center;line-height: 0.45rem; font-style:normal;border:none;">
                                        <input style="border: none; margin-top:0.1rem ;" type="number" name="" class="onub" value="<?php echo $v['num']; ?>"  readonly="readonly"/>
                                    </em>
<!--                                    <em class="jiajian">-->
<!--                                        <span class="oper jia_up" title="减一">-</span>-->
<!--                                        <input type="number" name="" class="onub" value="--><?php //echo $v['num']; ?><!--"  readonly="readonly"/>-->
<!--                                        <span class=".oper jian_next" title="加一">+</span>-->
<!--                                    </em>-->
                                <?php }?>

                            </p>
                        </div>
                    </li>
                <?php } ?>

                <div class="peisong_wrap">
                    <div class="peisong">
                        <div><span>配送方式：</span><span>普通快递</span></div>
                        <div><span>运费 :</span><span>0.00</span></div>
                        <div class="heji">

                            <i>合计：</i><i class="shopAllMonye"><?php echo $count_money; ?></i>
                            <?php if ($_GET['isPromote'] == '2'){ ?>
                               <i>人民币</i>
                            <?  }else{?>
                                   <i>三界石</i>
                            <?php }?>
                            
                        </div>
                    </div>
                </div>
            </ul>

        </div>
    </div>
    <footer>
        <div class="dingdananniu">
            <div class="dingdan_heji">
                <span >合计：</span>
                <i class="shopAllMonye"><?php echo $count_money; ?></i>
                 <?php if ($_GET['isPromote'] == '2'){ ?>
                               <i>人民币</i>
                            <?  }else{?>
                                   <i>三界石</i>
                            <?php }?>
            </div>
            <input type="hidden" id="isPromote" value="$_GET['isPromote']">
            <a href="###" class="dingdan_queding">
                提交订单
            </a>
        </div>
    </footer>
</div>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
<script>
    $(".save_cookie").click(function(){
        var url = self.location.href;
        document.cookie = "url="+url+";path=/";
        location.href = "<?php echo Yii::$app->urlManager->createUrl('user/useraddresslist');?>";
        //alert(url);
    })
    // /////提交订单   ////////////
    $('.dingdan_queding').click(function(){
        var address_id = $("input[name='ajax_address_id']").val();
        // alert(address_id);
        // return false;
        if(address_id==''||typeof(address_id)=="undefined"){
            alert("您还没有选择收货地址！");
            return false;
        };
        var isPromote = $("#isPromote").val();
        var activityId = $("#activityId").val();
        var shippingName = "普通快递";
        var isPromote = "<?=$isPromote?>";
        var goodsId = "";
        $("input[name='goods_id[]']").each(function(index,item){
            goodsId += $(this).val()+',';
        });
        goodsId = goodsId.substring(0,goodsId.length-1);
        promote = $("#isPromote").val();
        if(promote == '2'){
            goodsNumber = $("#num").val();
        }else{
            var goodsNumber = "";
            $("input[name='goods_num[]']").each(function(index,item){
                goodsNumber += $(this).val()+',';
            });
            goodsNumber = goodsNumber.substring(0,goodsNumber.length-1);
        }
        var skuInfo = "";
        $("input[name='skuInfo[]']").each(function(index,item){
            skuInfo += $(this).val()+',';
        });
        skuInfo = skuInfo.substring(0,skuInfo.length-1);
        var skuvalues = "";
        $("input[name='skuValue[]']").each(function(index,item){
            skuvalues += $(this).val()+';';
        });
        skuvalues = skuvalues.substring(0,skuvalues.length-1);
        // alert(skuvalues);
        // return false;

        var ismutilprice = "";
        $("input[name='ismutilprice[]']").each(function(index,item){
            ismutilprice += $(this).val()+',';
        });
        ismutilprice = ismutilprice.substring(0,ismutilprice.length-1);
         var payPrice = $(".shopAllMonye").html();

        // return false;
        var postscript = "附言为空";
        <?php if(!empty($_GET['sku_id'])){ ?>
        var skuInfo = "<?php echo $_GET['sku_id'] ?>";
        skuvalues =  "<?php echo $_GET['skuValue'] ?>";
        skuvalues = skuvalues.substring(0,skuvalues.length-1);
        ismutilprice = "<?php echo empty($_GET['skuValue']) ? '0' : '1'; ?>";
        <?php }else { ?>
//                    var sku = sku;
//                    var skuValue = "2";
        <?php }?>
        //var skuId = "0";
        //var skuValue = "0";
        var userCode = "0";
       
        $.ajax({
            type:'POST',
            data:'shippingName='+shippingName+'&address_id='+address_id+'&goodsId='+goodsId+'&goodsNumber='+goodsNumber+'&postscript='+postscript+'&skuInfo='+skuInfo+'&skuValue='+skuvalues+'&userCode='+userCode+'&isPromote='+isPromote+'&activityId='+activityId+'&ismutilprice='+ismutilprice+'&payPrice='+payPrice,
            dataType:'json',
            url:"<?php echo Yii::$app->urlManager->createUrl('order/order');?>",
            success:function(data){
                // alert(data);
                // return false;
                if(data.errno==0){
                    console.log('---------------');
                    console.log(data);
                    if(data.isPromote == 1){
                        location.href= "<?php echo Yii::$app->urlManager->createUrl('order/pay_order');?>?order_sn="+data.data.orderNum+"&money="+data.data.orderAmount+"&isPromote="+isPromote;
                    }else{
                        location.href= "<?php echo Yii::$app->urlManager->createUrl('order/pay_order');?>?order_sn="+data.data.orderNum+"&money="+data.data.orderAmount+"&isPromote="+isPromote;
                    }
                }else if(data.errno=="-15"){
                    console.log(data.error);
                    alert("网络异常,请稍后重试！");
                }else if(data.errno=="-94"){
                    alert("订单生成失败，用户类型只能为普通会员和创业会员，商品无法购买！");
                }else if(data.errno=="-95"){
                    alert("订单生成失败，参数为空无法确定购买价格！");
                }else if(data.errno=="-96"){
                    alert("抱歉，用户只能秒杀一件商品！");
                }else if(data.errno=="-97"){
                    alert("抱歉，用户每件商品只能秒一件！");
                }else if(data.errno=="-104"){
                    alert("秒杀活动已结束！");
                }else if(data.errno=="-106"){
                    alert("没有此秒杀活动！");
                }else{
                    console.log(data);
                    //alert("您还没有选择收货地址！");
                    alert(data.error);
                }
            }
        });
    })
    $(document).ready(function() {
        /*fastclick解决移动端点击延迟的问题*/
        if ('addEventListener' in document) {
            document.addEventListener('DOMContentLoaded', function() {
                FastClick.attach(document.body);
            }, false);
        }
        //加减
        var oNub=1;
        var allNub=0;
        $(".jia_up").click(function(){
            $(this).parent(".jiajian").find(".oper").css("color","#282828");
            oNub=$(this).parent(".jiajian").find(".onub").val();
            var shopAllMoney=$(".shopAllMonye").eq(0).text();
            oNub--;
            if(oNub<1){
                oNub=1;
                $(this).parent(".jiajian").find(".jia_up").css("color","#999999");
                var shopAllmonye=parseFloat(0);
                var hejiNub=$(".shopAllMonye").eq(0).text();
                var allNub=parseFloat(hejiNub)+parseInt(shopAllmonye);
                var allNub=parseFloat(hejiNub)+parseInt(shopAllmonye);
                $(".shopAllMonye").text(allNub);
            }else{
                var shopmony=$(this).parents("li").find(".shopPrice").text();
                var shopAllmonye=parseFloat(-shopmony);
                var hejiNub=$(".shopAllMonye").eq(0).text();
                var allNub=parseFloat(hejiNub)+parseInt(shopAllmonye);
            }

            $(this).parent(".jiajian").find(".onub").val(oNub);
            $(".shopAllMonye").text(allNub);
            return false;
        });
        $(".jian_next").click(function(){
            $(this).parent(".jiajian").find(".oper").css("color","#282828");
            oNub=$(this).parent(".jiajian").find(".onub").val();
            oNub++;
            $(this).parent(".jiajian").find(".onub").val(oNub);
            var shopmony=$(this).parents("li").find(".shopPrice").text();
            var shopAllmonye=parseFloat(shopmony);
            var hejiNub=$(".shopAllMonye").eq(0).text();
            var allNub=parseFloat(hejiNub)+parseInt(shopAllmonye);
            $(this).parent(".jiajian").find(".onub").val(oNub);
            $(".shopAllMonye").text(allNub);
            return false;
        });
        $(document).ready(function(){
            var subCenter=$(".sub_center").find("li");
            var shopNub=0;
            var shopAllMoney=0;
            $.each(subCenter, function(m) {
                shopNub++;
                console.log($(this).find(".shopPrice").text()) ;
                var shopMoney=parseFloat($(this).find(".shopPrice").text()*$(this).find(".onub").val());
//            console.log(shopMoney);
                shopAllMoney+=shopMoney;
            });
            $("#shopNub").text(shopNub);
            $(".shopAllMonye").text(shopAllMoney);
        });
    })
</script>
</body>
</html>