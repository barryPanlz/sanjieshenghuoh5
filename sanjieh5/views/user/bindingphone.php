<?php
    use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<title>绑定手机</title>
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/reset.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/common/common.css">
	<link rel="stylesheet" href="<?php echo $pc_style; ?>css/private/bindphone.css">
	<script src="<?php echo $pc_style; ?>js/lib/rem.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="screen">
	<header>
		<h1>绑定手机</h1>
		<a class="u_back" href="javascript:history.go(-1)">返回</a>
	</header>
	<div class="main no_footer_main">
	  
	  <div class="phone_phone">
	  	输入你的手机号
	  </div>
	  <form action="<?php echo Yii::$app->urlManager->createUrl(['user/bindingphonecode']);?>" method="get" id="payform">
		  <div class="phone_input">
		  	<span> <img src="<?php echo $pc_style; ?>images/telphone.png"/> </span>
		  	<input type="number" name="phone" id="phone" placeholder="请输入手机号"/>
		  </div>
		  <div class="u_button phone_button"><input type="button" id="btn" value="下一步"></div>
	  </form>
	</div>
	
</div>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/zepto.min.js"></script>
<script type="text/javascript" src="<?php echo $pc_style; ?>js/lib/fastclick.js"></script>
<script>
	/*fastclick解决移动端点击延迟的问题*/
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	}
	$("#btn").click(function(){
           var phone = $('#phone').val();
		   if( !/^0?(13|15|17|18|14|19)[0-9]{9}$/.test( phone ) ){
		   	alert('请输入正确的手机号');
		   	   return false;
		   };
        	$("#payform").submit();
        })
	
	
	
	
	
	
	
</script>
</body>
</html>