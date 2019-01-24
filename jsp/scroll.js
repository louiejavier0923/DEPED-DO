$(document).ready(function() {

	var scrolllink = $('.scroll');

	// Smooth scrolling
	scrolllink.click(function(e) {

		e.preventDefault();
		$('body, html').animate({
			scrollTop: $(this.hash).offset().top
		}, 1000);
	});
	// End

	// Active link switching
	$(window).scroll(function() {

		var activeLink = $(this).scrollTop();
		console.log(activeLink);

		scrolllink.each(function() {

			var sectionOffset = $(this.hash).offset().top
			
			if (sectionOffset <= activeLink) {
				$(this).addClass('active');
				$(this).siblings().removeClass('active');
			}
		});
	});
	// End
});