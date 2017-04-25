if($(window).width()>=1200){
		$('#in img').css({'margin-left':($(window).width()-1200)/2-360});
	}else{$('#in img').css({'margin-left':'0px'});
	$(window).resize(function(){
		if($(window).width()>=1200){
		$('#in img').css({'margin-left':($(window).width()-1200)/2-360});
	}else{$('#in img').css({'margin-left':'0px'});
	})