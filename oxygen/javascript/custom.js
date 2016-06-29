$(document).ready(function() {

	$(window).scroll(function () {
		if ( $(this).scrollTop() > 150 && !$('header').hasClass('sticky') ) {
				$('.main-nav.not-login').addClass('sticky');				
		} 
		
		else if ( $(this).scrollTop() <= 150 ) {
			$('.main-nav.not-login').removeClass('sticky');
		}
	});

}); //end ready