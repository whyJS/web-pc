
	if($(window).width() < 768) {
	$('.joinus-top-1 img').attr("src","../images/new/qydl_m.jpg")
	$('#qydl img').attr("src", "../images/new/scdl_m.jpg")
	$('#dzdl img').attr("src", "../images/new/dzdl_m.jpg")
	$('#scrz img').attr("src", "../images/new/pphz_m.jpg")
}
$(window).resize(function() {
	if($(window).width() < 768) {
		$('.joinus-top-1 img').attr("src", "../images/new/qydl_m.jpg")
		$('#qydl img').attr("src", "../images/new/scdl_m.jpg")
		$('#dzdl img').attr("src", "../images/new/dzdl_m.jpg")
		$('#scrz img').attr("src", "../images/new/pphz_m.jpg")
	} else {
		$('.joinus-top-1 img').attr("src", "../images/new/bestseller1.jpg")
		$('#qydl img').attr("src", "../images/new/regional-agent2.jpg")
		$('#dzdl img').attr("src", "../images/new/normal-agent3.jpg")
		$('#scrz img').attr("src", "../images/new/merchant-join4.jpg")
	}
});

