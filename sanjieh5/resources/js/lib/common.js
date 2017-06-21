 $(document).ready(function(){
			 	
// 切换城市
//			 $('.fun_location').on('mousemove',function(){ 
//				$(".fun_locationp").removeClass('Location').addClass('Location1');
//				$('.fun_over_china').css('display','block');
//				$('.fun_location img').attr("src","../../img/jiant_s.png");
//			  });
//			  
// 			  $('.fun_location').on('mouseleave',function(){ 
// 			  	
// 				$(".fun_locationp").removeClass('Location1').addClass('Location');
// 				$('.fun_over_china').css('display','none');
// 				$('.fun_location img').attr("src","../../img/jiant_x.png");
// 			  });
// 			  	 		 	
//			 $('.fun_over_china').on('mousemove',function(){ 
//				$('.fun_locationp').removeClass('Location').addClass('Location1');
//				$('.fun_over_china').css('display','block');
//			  });
//			  
//			  $('.fun_over_china').on('mouseleave',function(){ 
// 				$('.fun_locationp').removeClass('Location1').addClass('Location');
// 				$('.fun_over_china').css('display','none');
// 				$('.fun_location img').attr("src","../../img/jiant_x.png");
// 			  });
			   
			
			
			$("#funLoca").mousemove(function(){
				$(".nav_li_wrap ul").css("display","block");
				$("#funLoca").addClass("loca_a");
				$("#funLoca").parent().prev('li').children('a').css('border-right-color','#fff');
				$("#funLoca").css('border-right-color','#ddd');
			})
			$("#funLoca").mouseleave(function(){
				$(".nav_li_wrap ul").css("display","none");
				$("#funLoca").removeClass("loca_a");
				$("#funLoca").parent().prev('li').children('a').css('border-right-color','#ddd')

			})
			$(".nav_li_wrap ul").mousemove(function(){
				$(".nav_li_wrap ul").css("display","block");
				$("#funLoca").addClass("loca_a");
				$("#funLoca").parent().prev('li').children('a').css('border-right-color','#fff');

			})
			$(".nav_li_wrap ul").mouseleave(function(){
				$(".nav_li_wrap ul").css("display","none");
				$("#funLoca").removeClass("loca_a");
				$("#funLoca").css('border-right-color','#fff');
				$("#funLoca").parent().prev('li').children('a').css('border-right-color','#ddd')
			})
			

})   ;
//正则
var validate={
//手机号正则
		phone:function (phone){
        if(!/^0?(13|15|17|18|14|19)[0-9]{9}$/.test(phone)){
            return false;
        }
        return true;
  },
 //验证码正则
		code:function (code){
        if(!/\d{6}/.test(code)){
            return false;
        }
        return true;
  },
//邮箱正则
		emailbox:function (emailbox){
        if(!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(emailbox)){
            return false;
        }
        return true;
  },
//密码正则
 		userPassword:function (userPassword){
        if(!/[a-zA-Z\d+]{6,16}/.test(userPassword)){
            return false;
        }
        return true;
   },
//住址正则
 	address:function (address){
   if(!/^[\u4E00-\u9FA5A-Za-z0-9_]+$/.test(address)){
       return false;
   }
   return true;
  },	
//邮编正则
 	postcode:function (postcode){
   if(!/^[\[1-9]\d{5}(?!\d) /.test(postcode)){
       return false;
   }
   return true;
  },
//支付宝正则
  		alipay:function (alipay){
       if(!/[a-zA-Z\d+]{6,16}/.test(alipay)){
           return false;
       }
      return true;
  },
//微信正则
 		weixin:function (emailbox){
       if(!/^[a-z_\d]+$/.test(emailbox)){
           return false;
       }
       return true;
 },
//身份证正则
       Idcard:function (Idcard){
       if(!/^\d{15}|\d{18}$/.test(Idcard)){
           return false;
       }
       return true;
 },
//姓名正则
       name:function (name){
       if(!/\u4e00-\u9fa5/.test(name)){
           return false;
       }
       return true;
 },
//正整数正则
       isPositiveNum:function (isPositiveNum){
       if(!/^[0-9]*[1-9][0-9]*$/.test(isPositiveNum)){
           return false;
       }
       return true;
 }		
};