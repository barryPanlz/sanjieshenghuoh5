<?php
    use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>提交订单-添加地址</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/form.css">
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="screen">
	<header>
		<h1>添加收货地址</h1>
		<a class="u_back" href="javascript:history.go(-1);">返回</a>
	</header>
	<div class="main no_footer_main">
        <form class="addaddress">
            <input type="hidden" name="address_id" id="address_id" value="<?php echo !empty($oneuser->address_id)?$oneuser->address_id:'' ?>"/>
			<ul class="form_box">
				<li>
					<div>收货人:</div>
					<input type="text" name="consignee" maxlength="6" size="25" id="consignee" value="<?php echo !empty($oneuser->consignee)?$$oneuser->consignee:'' ?>">
				</li>
				<li>
					<div>手机号码:</div>
					<input type="number" name="mobile" id="mobile" oninput="if(value.length>11)value=value.slice(0,11)" maxlength="11" size="11" value="<?php echo !empty($oneuser->mobile)?$$oneuser->mobile:'' ?>">
				</li>
				<li class="address_box">
					<div>收货地址:</div>
					<div>
                        <select name="province" attr="add" id="province">
                            <?php foreach($prolist as $v){ ?>
                                <option value="<?php echo $v['provinceid']; ?>"><?php echo $v['province']; ?></option>
                            <?php } ?>
                        </select>
                        <select name="city" attr="add" id="city">
                            <?php foreach($city_list as $v){ ?>
                                <option value="<?php echo $v['cityid']; ?>"><?php echo $v['city']; ?></option>
                            <?php } ?>
                        </select>
                        <select name="district" id="district">
                            <?php foreach($area_list as $v){ ?>
                                <option value="<?php echo $v['areaid']; ?>"><?php echo $v['area']; ?></option>
                            <?php } ?>
                        </select>

                    </div>
					<div><input type="text" placeholder="输入街道、门牌号等详细地址" maxlenght="24" name="address" id="address" value="<?php echo !empty($oneuser->address)?$$oneuser->address:'' ?>"></div>
					<div class="choose">
						<label for="u_checkbox"><input class="choose_default" id="u_checkbox" type="checkbox">设为默认地址</label>
					</div>
				</li>
			</ul>
		</form>
		<div class="u_button sure_button"><input type="button" id="btn" value="保存地址"></div>
		<!--不可点击时的按钮状态-->
		<!-- <div class="u_button sure_button sure_button_noclick"><input type="submit" disabled="disabled" value="确认地址"></div> -->
	</div>
	<!--这里是验证错误时的弹出框-->
	<div class="error_tip">手机号码格式不正确</div>
    <div class="success_box">
        <img src="../../resources/images/icon23.png" alt="">
        <p>添加成功</p>
    </div>
</div>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
<script>
    //正则表达式
    function userObj(_this){
        var userName = /^[\u4e00-\u9fa5]{2,6}$/;
        if(_this.val()==''){
            $('.error_tip').html('收货人不能为空').show();
            return false;
        }else if(!userName.test(_this.val())){
            $('.error_tip').html('请输入正确的收货人').show();
             return false;
        }
    }
    $('#consignee').blur(function(){
        userObj($(this));
    })
    function phObj(athis){
         var regphone=/^0?(13|15|17|18|14|19)[0-9]{9}$/;
        if(athis.val()==''){
            $('.error_tip').html('手机号不能为空').show();
            return false;
        }else if(!regphone.test(athis.val())){
            $('.error_tip').html('请输入正确的手机号').show();
            return false;
        }
    }
     $('#mobile').blur(function(){
        phObj($(this));
    })
     function addObj(athis){
        if(athis.val()==''){
            $('.error_tip').html('添加地址不能为空').show();
            return false;
        }
    }
    $('#address').blur(function(){
        addObj($(this));
    })
    
    
    function sett(){
        var timer =setInterval(function(){
            $('.error_tip').hide();
        },1800);
    }
    sett();
    //添加收获地址
    $('#btn').click(function(){
        var consignee = $('#consignee').val();
        var mobile = $('#mobile').val();
        if(phObj($('#mobile'))==false){
            return false;
        }
        var provinceid = $('#province').val();
        var city = $('#city').val();
        var area = $('#district').val();
        var address = $('#address').val();
        if($('#u_checkbox').is(':checked')) {
            var address1 = '1';
        }else{
            var address1 = '0';
        }
        if(consignee==''||mobile==''||provinceid==''||city==''||area=='' ||address==''){
            alertmessage("输入信息不能为空,或者有误！");
            return false;
        }
        $('#btn').attr("disabled","disabled");
        $('#btn').css("background","#EDEDED");
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo Yii::$app->urlManager->createUrl('user/addaddress');?>",
            data: {
                'consignee': consignee,
                'mobile': mobile,
                'provinceid': provinceid,
                'city': city,
                'area': area,
                'address': address,
                'address1': address1
            },
            success: function (data) {
                if (data.errorCode == 0) {
                    if(!$('.success_box').is(":animated")){
                        $('.success_box').show(100, function() {
                            $('.success_box').animate({
                                opacity: 1
                            },1000, function() {
                                window.setTimeout(function(){
                                    location.href="<?php echo Url::toRoute("user/useraddresslist");?>";
                                }, 1000)
                            });
                        });
                    }
                } else if (data.errorCode == -15) {
                    alertmessage("请选择收货地址");
                    $('#btn').removeAttr("disabled");
       				$('#btn').css("background","#f01c1b");
                }else if (data.errorCode == -2) {
                    alertmessage("请先登陆");
                    location.href="<?php echo Url::toRoute("index/login");?>";
                } else{
                    alertmessage("网络繁忙，请稍候重试");
                    $('#btn').removeAttr("disabled");
       				$('#btn').css("background","#f01c1b");
                }
                

            },
            error: function(data) {
                alert("参数有误！");
            }
        });
    });

    //获取城市以及城市的第一个区县
    $('select[name="province"]').change(function(e){
        var val = $(this).children('option:selected').val();
        var get_type = $(this).attr("attr");
        $.ajax({
            url: "<?php echo Yii::$app->urlManager->createUrl('user/get_location');?>",
            data:{parent_id:val,parent_type:'province'},
            type: "post",
            dataType:'json',
            success: function (data) {
                console.log(data);
                if(data.errno=='0'){
                    //console.log(data.errno);
                    var html = '';
                    $.each(data.data,function(i){
                        html += "<option value='"+this.cityid+"'>"+this.city+"</option>";
                    });
                    //添加第一个的区县
                    var area_html = '';
                    $.each(data.area,function(i){
                        area_html += "<option value='"+this.areaid+"'>"+this.area+"</option>";
                    });
                    if(get_type =="update"){
                        $('#update_city').html(html);
                        $('#update_district').html(area_html);
                    }else{
                        $('#city').html(html);
                        $('#district').html(area_html);
                    }
                }else{
                    alert(data.error);
                }
            },
            error:function(error){
                alert("error!");
            }
        });
    })
    $('#city').change(function(e){
        var val = $(this).children('option:selected').val();
        var get_type = $(this).attr("attr");
        $.ajax({
            url: "<?php echo Yii::$app->urlManager->createUrl('user/get_location');?>",
            data:{parent_id:val,parent_type:'city'},
            type: "post",
            dataType:'json',
            success: function (data) {
                if(data.errno=='0'){
                    //添加城市
                    var html = '';
                    $.each(data.data,function(i){
                        html += "<option value='"+this.areaid+"'>"+this.area+"</option>";
                    });
                    if(get_type =="update"){
                        $('#update_district').html(html);
                    }else{
                        $('#district').html(html);
                    }

                }else{
                    alert(data.error);
                }
            },
            error:function(error){
                alert("error!");
            }
        });
    })

	/*fastclick解决移动端点击延迟的问题*/
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	}
	$('.choose label').click(function(event) {
		if($('.choose_default').prop('checked')==true){
			$(this).css('color',"#f3001d");
		}else{
			$(this).css('color',"#999");
		}
	});

    function alertmessage(html){
        if(!$('.error_tip').is(":animated")){
            $('.error_tip').show(100, function() {
                $('.error_tip').html(html);//这里输入要提示的内容
                $('.error_tip').animate({
                    opacity: 1,
                },1000, function() {
                    window.setTimeout(function(){
                        $('.error_tip').animate({
                                opacity: 0,
                            },
                            1000, function() {
                                $('.not_empty').hide();
                            });
                    }, 2000)
                });
            });
        }
    }
	/*点击确认按钮*/
//	$('.sure_button').click(function(event) {
//		/*如果表单填写错误，执行以下js,则显示错误提示,显示2s后消失，显示时改变错误提示的内容即可*/
//		if(!$('.error_tip').is(":animated")){
//			$('.error_tip').show(100, function() {
//				$('.error_tip').html('手机号码输入错误');//这里输入要提示的内容
//				$('.error_tip').animate({
//					opacity: 1,
//					},1000, function() {
//					window.setTimeout(function(){
//						$('.error_tip').animate({
//							opacity: 0,
//							},
//							1000, function() {
//							$('.error_tip').hide();
//						});
//					}, 2000)
//				});
//			});
//		}
//	});
</script>
</body>
</html>