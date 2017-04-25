$(document).ready(function(){
//活动列表
			var num3=$('#activity_zxWB .AC-row').length;
            console.log(num3)
            var i_mun3=0;

            $('#activity_zxWB .AC-row:gt(3)').hide();//页面加载隐藏所有的li 除了第一个

//底下小图标点击切换
            $('#AC-row-span-id span').click(function(){

                $(this).addClass('AC-row-span')
                        .siblings('#AC-row-span-id span').removeClass('AC-row-span');
                 $('#activity_zxWB .AC-row').each(function(){
                 	$(this).hide()
                 });
                var i_mun13=$('#AC-row-span-id span').index(this);
                console.log(i_mun13)
                var j=0;
                for(var i=i_mun13*4+4;i>i_mun13*4;i--){
                	$('#activity_zxWB .AC-row').eq(i-1).fadeIn('slow');

                    j++;
                    console.log(j)
                }
            });
	})