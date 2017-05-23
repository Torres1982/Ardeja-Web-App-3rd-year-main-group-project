$(document).ready(function() {
	$('.instructor').width(75);
	$('.instructor').mouseover(function() {
		$(this).css("cursor","pointer");
	});
	$('.instructor').toggle(function()
    { $(this).animate({width: "225px"}, 'slow');},
     function()
    { $(this).animate({width: "75px"}, 'slow');
    });
});