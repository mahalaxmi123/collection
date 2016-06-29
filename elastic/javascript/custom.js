$(document).ready(function(){
	$('.browse-course-toggle').click(function() {
		$(this).toggleClass('active');	
  		$('body').toggleClass('slide-right');	
	});
	
	$('.ap-toggle').click(function() {
		$(this).parent().toggleClass('active');
	});
	
	//applying height dynamically to the browse course menu
	var documentHeight = $(document).height();
	$('.browse-courses').height(documentHeight);
	$('.category-list ul').height(documentHeight);

	$('.category-list').hover(
		function(){
				$(this).addClass('active');
		},
		function(){
			$(this).removeClass('active');
		}
	);
})