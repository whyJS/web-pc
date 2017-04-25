$(document).ready(function(){ 
	$("#news_list_d2 div:first div").addClass("d2_xw_bj");
	$("#news_list_d3 div span:first").addClass("xuanzhong");
	//新闻			
				
                $('#news_list_foot .row div:gt(5)').hide();//底部新闻隐藏
				var num2 = $('#news_list_d3 span').length;
				var i_mun2 = 0;
				var timer_banner2 = null;

				$('#news_list_d1 li:gt(0)').hide(); //页面加载隐藏所有的li 除了第一个

				//底下小图标点击切换
				$('#news_list_d3 span').click(function() {
					$(this).addClass('xuanzhong')
						.siblings('#news_list_d3 span').removeClass('xuanzhong');
					var i_mun12 = $('#news_list_d3 span').index(this);
					$('#news_list_d1 li').eq(i_mun12).fadeIn('slow')
						.siblings('li').hide();
					//新闻背景色
					$('#news_list_d2 .row div').removeClass('d2_xw_bj');
					$('#news_list_d2 .row div').eq(i_mun12).addClass('d2_xw_bj')
						
					i_mun2 = i_mun12;
				});
				//右侧新闻
				$('#news_list_d2 .row div').click(function() {

					var i_mun12 = $('#news_list_d2 .row div').index(this);
					$('#news_list_d3 span').eq(i_mun12).addClass('xuanzhong')
						.siblings('#news_list_d3 span').removeClass('xuanzhong');
					//新闻背景色
					$('#news_list_d2 .row div').removeClass('d2_xw_bj');
					$(this).addClass('d2_xw_bj')
					
					$('#news_list_d1 li').eq(i_mun12).fadeIn('slow')
						.siblings('li').hide();

					i_mun2 = i_mun12;
				});
				//自动轮播
				function move_banner_x() {
					if(i_mun2 == num2 - 1) {
						i_mun2 = -1
					}
					//大图切换
					$('#news_list_d1 li').eq(i_mun2 + 1).fadeIn('slow')
						.siblings('li').hide();
					//小图切换
					$('#news_list_d3 span').eq(i_mun2 + 1).addClass('xuanzhong')
						.siblings('span').removeClass('xuanzhong');
					//背景色
						$("#news_list_d2 .row div").removeClass('d2_xw_bj');
					$('#news_list_d2 .row div').eq(i_mun2 + 1).addClass('d2_xw_bj')
					

					i_mun2++

				}
				////            自动播放函数
				function bannerMoveks_x() {
					timer_banner2 = setInterval(function() {
						move_banner_x()
					}, 4000)
				};
				bannerMoveks_x(); //开始自动播放

				//鼠标移动到banner上时停止播放
				$('#news_list_d1').mouseover(function() {
					clearInterval(timer_banner2);
					// console.log("qq");
				});

				//鼠标离开 banner 开启定时播放
				$('#news_list_d1').mouseout(function() {
					bannerMoveks_x();
				});
				//鼠标移动到banner上时停止播放
				$('#news_list_d2').mouseover(function() {
					clearInterval(timer_banner2);
					// console.log("qq");
				});

				//鼠标离开 banner 开启定时播放
				$('#news_list_d2').mouseout(function() {
					bannerMoveks_x();
				});
				
				
				
				
				//新闻详情
				 var num3=$('.aa .num').length;
            // console.log(num3)
            var i_mun3=0;
            var timer_banner3=null;

            $('.aa .num:gt(5)').hide();//页面加载隐藏所有的li 除了第一个

//底下小图标点击切换
            $('#yx_bd3_btn span').click(function(){
            	
                $(this).addClass('yx_bd3_btn_span')
                        .siblings('#yx_bd3_btn span').removeClass('yx_bd3_btn_span');
                 $('.aa .num').each(function(){
                 	$(this).hide()
                 });
                var i_mun13=$('#yx_bd3_btn span').index(this);
                // console.log(i_mun13)
                var j=0;
                for(var i=i_mun13*6+6;i>i_mun13*6;i--){
                	$('.aa .num').eq(i-1).fadeIn('slow');
                
                    j++;
                    // console.log(j)
                }               
            });
			});