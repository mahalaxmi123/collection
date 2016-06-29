$( document ).ready(function() {
	
	$('.c-dropdown').click(function(){
		$(this).toggleClass('open');
	})	
	//Toggle user dashboard menu	
	$(function(){
	  var cdm = $('.c-dropdown-menu'),
		  animateTime = 500,
		  cdd = $('.c-dropdown');
	  cdd.click(function(){
		if(cdm.height() === 0){
		  autoHeightAnimate(cdm, animateTime);
		} else {
		  cdm.stop().animate({ height: '0' }, animateTime);
		}
	  });
	});

	/* Function to animate height: auto */
	function autoHeightAnimate(element, time){
		var curHeight = element.height(), // Get Default Height
			autoHeight = element.css('height', 'auto').height(); // Get Auto Height
			  element.height(curHeight); // Reset to Default Height
			  element.stop().animate({ height: autoHeight }, parseInt(time)); // Animate to Auto Height
	};	
});