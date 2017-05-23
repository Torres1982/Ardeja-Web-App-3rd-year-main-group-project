jQuery(document).ready(function($) {
	//call the function when resize button is clicked (increase or decrease the text)
	$('.make_larger, .make_smaller').click(function() {
		//create variables for p, h2, h3 and h4 fonts
		var p_volume = parseInt($('.page_content').find('p').css('font-size'));
		var h2_volume = parseInt($('.page_content').find('h2').css('font-size'));
		var h3_volume = parseInt($('.page_content').find('h3').css('font-size'));
		var h4_volume = parseInt($('.page_content').find('h4').css('font-size'));

			//when the button '+' is clicked, the font is increased by 3px
			if($(this).hasClass('.make_larger')) {
				$('.page_content').find('p').css('font-size', p_volume+3);
				$('.page_content').find('h2').css('font-size', h2_volume+3);
				$('.page_content').find('h3').css('font-size', h3_volume+3);
				$('.page_content').find('h4').css('font-size', h4_volume+3);
			}
			//when the button '-' is clicked, the font is decreased by 3px
			else if ($(this).hasClass('.make_smaller')) {
				$('.page_content').find('p').css('font-size', p_volume-3);
				$('.page_content').find('h2').css('font-size', h2_volume-3);
				$('.page_content').find('h3').css('font-size', h3_volume-3);
				$('.page_content').find('h4').css('font-size', h4_volume-3);
			}
	});
});