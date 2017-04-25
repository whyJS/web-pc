//背景图以及框的变化	
	if($(window).width()>=1200){
		$('.baby_d1 img').css({'margin-left':($(window).width()-1200)/2-360});
		$('.baby_input').css({'right':Math.abs(($(window).width()-1200)/2)+20});
	}else if($(window).width()<768){
		$('.baby_d1 img').css({'margin-left':'-360px'});
		$('.baby_input').css({'right':'','left':'10px'});
		}else{
		$('.baby_d1 img').css({'margin-left':'-360px'});
		$('.baby_input').css({'right':'20px'});
		}
	$(window).resize(function(){
		if($(window).width()>=1200){
		$('.baby_d1 img').css({'margin-left':($(window).width()-1200)/2-360});
		$('.baby_input').css({'right':Math.abs(($(window).width()-1200)/2)+20});
	}else{$('.baby_d1 img').css({'margin-left':'-360px'});
	        $('.baby_input').css({'right':'20px'});}
	})
	
	//请输入姓名
	$('.baby-input1,.baby-input3,.baby-input4,.baby-input5').focus(function(){
		$(this).css({"border":"1px solid #3AA65E","color":"gray"})
	});
		$('.baby-input1').focus(function(){
			if($(this).val()==='姓名不能为空'){
				$(this).val(undefined);
			}
		})
		$('.baby-input3').focus(function(){
			if($(this).val()==='年龄在三岁到七岁之间'||$(this).val()==='请输入数字'){
				$(this).val(undefined);
			}
		})
		$('.baby-input4').focus(function(){
			if($(this).val()==='请输入正确手机号'||$(this).val()==='该手机号已报名'){
				$(this).val(undefined);
			}
		})
		$('.baby-input5').focus(function(){
			if($(this).val()==='地址不能为空'){
				$(this).val(undefined);
			}
		})
//失去焦点
	$('.baby-input1,.baby-input3,.baby-input4,.baby-input5').blur(function(){
		$(this).css({"border":"1px solid #f8f8f8"})
	});
	var s1=0;
	var s5=0;
	$('.baby-input1').blur(function(){
		if($(this).val()==undefined||$(this).val()==null||$(this).val()==''){
		$('.baby-input1').val("姓名不能为空");
        $('.baby-input1').css({'color':'#E33E3E',"border":"1px solid #E33E3E"});
//      $('.baby-input1').attr({'placeholder':'姓名不能为空'})
        s1=1;
        return s1;
		}else{
			s1=0;
			return s1;
		}
		
	});
	$('.baby-input4').blur(function(){
		if(!(/^1[34578]\d{9}$/.test($(this).val()))){
			$('.baby-input4').val("请输入正确手机号")
            $('.baby-input4').css({'color':'#E33E3E',"border":"1px solid #E33E3E"})
		}else{
//			var $ph=$(this).val();
//			$.ajax({
//				url:"<?= $baseUrl ?>site/baby-reg-has",
//				dataType:'json',
//              data:{mobile:$ph},
//              type:"post",
//              success:function(data){
//				if(data===0){
//					$('.baby-input4').val("该手机号已报名")
//                  $('.baby-input4').css({'color':'#E33E3E',"border":"1px solid #E33E3E"})
//				   }
//				   }
//			});
		}
		
	});
	$('.baby-input3').blur(function(){
		if(!(/[3-7]/.test($(this).val()))){
			$('.baby-input3').val("年龄在三岁到七岁之间");
            $('.baby-input3').css({'color':'#E33E3E',"border":"1px solid #E33E3E"});    
		}
		});
	$('.baby-input5').blur(function(){
		if($(this).val()==undefined||$(this).val()==null||$(this).val()==''){
			$('.baby-input5').val("地址不能为空");
//          $('.baby-input5').css({"placeholder":"123"});
            $('.baby-input5').css({'color':'#E33E3E',"border":"1px solid #E33E3E"});
            s5=1;
            return s5;
		}else{
			s5=0;
			return s5;
		}

	});
	var sex='1';
	$('.baby-input2-d1').click(function(){
		$('.baby-input2-d1 img').attr({"src":"../images/new/boy.png"})
		$('.baby-input2-d1 p span').css({"background":"#57B949"})
		$('.baby-input2-d2 p span').css({"background":"white"})
		$('.baby-input2-d2 img').attr({"src":"../images/new/girl.png"})
		sex="1";
	})
	$('.baby-input2-d2').click(function(){
		$('.baby-input2-d1 p span').css({"background":"white"})
		$('.baby-input2-d2 p span').css({"background":"#57B949"})
		$('.baby-input2-d1 img').attr({"src":"../images/new/boy2.png"})
		$('.baby-input2-d2 img').attr({"src":"../images/new/girl2.png"})
		sex="0"
	})
	
	//提交
	$('.baby-input6').click(function(){
	var $ip3=$('.baby-input3').val();
	if(/[0-9]/.test($ip3)){ 
        if($ip3>2&&$ip3<8){
        	var $ip4=$('.baby-input4').val();
		        if(/^1[34578]\d{9}$/.test($ip4)){
		        	    var $ip1=$('.baby-input1').val();
//		        	    console.log($ip1)
		        	    if($ip1!=undefined&&$ip1!=null&&$ip1!=''&&s1==0){
		        	     var $ip5=$('.baby-input5').val();
		        	     if($ip5!=undefined&&$ip5!=null&&$ip5!=''&&s5==0){
//		        	     	console.log($ip5);
		        	     $('.baby-input6').html('正在提交')
		        	     $.ajax({
				                url:"/newmoumou/frontend/web/site/baby-reg",
				                dataType:'json',
				                data:{name:$ip1,sex:sex,age:$ip3,mobile:$ip4,address:$ip5},
				                type:"post",
				                success:function(data){
					                    if(data===1){
						                 $('#baby_ip_ss').css({"display":"none"})
						                $('.baby_div').css({"display":"block"})
					                }
					                if(data===-1){
					                	alert("手机格式错误")
					                	$('.baby-input6').html('提交报名')
					                }
					                if(data===-2){
					                	alert("已经报名")
					                	$('.baby-input6').html('提交报名')
					                }
					                if(data===-3){
					                	alert("数据有误，刷新重试")
					                	$('.baby-input6').html('提交报名')
					                }
				                }
			                });
		        	     }else{
		        	     	$('.baby-input5').val("地址不能为空");
                            $('.baby-input5').css({'color':'#E33E3E',"border":"1px solid #E33E3E"});
		        	     }
		        	     
		        	     }else{
//		        	     	console.log("aa");
		        	     	$('.baby-input1').val("姓名不能为空");
                            $('.baby-input1').css({'color':'#E33E3E',"border":"1px solid #E33E3E"});
		        	    }
                }else{
                $('.baby-input4').val("请输入正确手机号")
                $('.baby-input4').css({'color':'#E33E3E',"border":"1px solid #E33E3E"})
                }
        }else{
        	$('.baby-input3').val("年龄在三岁到七岁之间")
            $('.baby-input3').css({'color':'#E33E3E',"border":"1px solid #E33E3E"})
        }
    } else{
       	$('.baby-input3').val("请输入数字")
        $('.baby-input3').css({'color':'#E33E3E',"border":"1px solid #E33E3E"})
    }
	})