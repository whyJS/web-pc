$(document).ready(function(){ 
		//头部js
		           var a = 0;
				$(".head_dv_span").click(function() {
					if(a == 0) {
						$(".head_dv_span").html("关闭");
						$(".head_dv2").fadeIn();
					} else {
						$(".head_dv_span").html("选项");
						$(".head_dv2").hide();
					}
					a++;
					if(a > 1) {
						a = 0;
					}
				})
})
