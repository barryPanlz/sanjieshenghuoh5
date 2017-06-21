<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/> 
    <title>微信支付 - 三界生活商城</title>
    <script type="text/javascript">
	//调用微信JS api 支付
	function jsApiCall()
	{
	    //alert("暂不开通");
        //location.href = '<?php echo \Yii::$app->urlManager->createUrl(['user/usercenter']);?>';
        //return false;
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $js_params; ?>,
			function(res){
<?php elog('进入内部方法页面333');?>
                if(res.err_msg == "get_brand_wcpay_request:ok" ) {
				    alert('支付成功');
                    location.href = '<?php echo \Yii::$app->urlManager->createUrl(['index/callbackjava','feeType'=>$fee_type,'orderno'=>$order_no]);?>&status=1';
				}else if(res.err_msg == "get_brand_wcpay_request:cancel"){
				    alert('支付取消');
                    location.href = '<?php echo \Yii::$app->urlManager->createUrl(['user/usercenter']);?>';
                    return false;
				}else if(res.err_msg == "get_brand_wcpay_request:fail"){
				    alert('支付失败');
                    var status = '2';
                    location.href = '<?php echo \Yii::$app->urlManager->createUrl(['index/callbackjava','feeType'=>$fee_type,'orderno'=>$order_no]);?>&status=2';
				}else{
				    alert('未知错误');
                    location.href = '<?php echo \Yii::$app->urlManager->createUrl(['user/usercenter']);?>';
                    return false;
				}
<?php elog('进入内部方法页面444');?>
			}
		);
	}

	function callpay()
	{
		if (typeof WeixinJSBridge == "undefined"){
<?php elog('进入内部方法页面222');?>
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}else{
<?php elog('进入内部方法页面111');?>
		    jsApiCall();
		}
	}
	</script>
</head>
<body onload="callpay()">
<?php elog('进入内部方法页面');?>
</body>
</html>
