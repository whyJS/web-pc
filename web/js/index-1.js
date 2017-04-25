$(document).ready(function($) {
	$('#sangar-example').sangarSlider({

		timer :  true,// true or false to have the timer
		advanceSpeed:4000,
		width : 1600, // slideshow width
		height : 500, // slideshow height
		fixedHeight: true,
		scaleSlide : true,// slider will scale to the container size
		paginationContentWidth : 800,

	});
})