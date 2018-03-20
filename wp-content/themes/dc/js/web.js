$(function(){

	$('.nav-toggle-butn, .scr-overlay').click(function() {
        $('body').toggleClass("nav-on");
    });
	$('.srch-toggle-butn').click(function() {
        $('header .srch-box').slideToggle();
    });
	
	$('.review-box ._list li p').each(function() {
        if($(this).height() > 25){
			$(this).closest('li').attr("data-height", $(this).innerHeight());
			$(this).closest('li').addClass('_lg');
		}else
			$(this).closest('li').addClass('_sm');
		
    });
	$('.review-box ._list li button').click(function(){
			
		if($(this).parent('li').hasClass('_full')){
			$(this).parent('li').find('p').height("");
			$(this).html("Read more...");
		}else{
			$(this).parent('li').find('p').height($(this).parent('li').attr("data-height"));
			$(this).html("Read less...");
		}
		$(this).parent('li').toggleClass('_full');
	});
    
    
    
    
	$('.eventdiv').each(function() {
        if($(this).height() > 70){
			$(this).closest('blockquote').attr("data-height", $(this).innerHeight());
			$(this).closest('blockquote').addClass('_lg');
		}else{
			$(this).closest('blockquote').addClass('_sm');
        }
    });
	$('.event-box ._list li button').click(function(){
			
		if($(this).closest('blockquote').hasClass('_full')){
			$(this).closest('blockquote').find('eventdiv').height("");
			$(this).html("Read more...");
		}else{
			$(this).closest('blockquote').find('eventdiv').height($(this).closest('blockquote').attr("data-height"));
			$(this).html("Read less...");
		}
		$(this).closest('blockquote').toggleClass('_full');
	});
	$('.event-box ._list li h5').click(function(){
			
		if($(this).closest('blockquote').hasClass('_full')){
			$(this).closest('blockquote').find('eventdiv').height("");
			$('.event-box ._list li button').html("Read more...");
		}else{
			$(this).closest('blockquote').find('eventdiv').height($(this).closest('blockquote').attr("data-height"));
			$('.event-box ._list li button').html("Read less...");
		}
		$(this).closest('blockquote').toggleClass('_full');
	});
    
    
    
    
    
    
    

});


$(window).resize(function() {
    $('.review-box ._list li p').each(function() {
        if($(this).height() > 25){
			$(this).closest('li').addClass('_lg');
        }
    });
});


$(window).resize(function() {
    $('.eventdiv').each(function() {
        if($(this).height() > 70){
			$(this).closest('blockquote').addClass('_lg');
        }
    });
});

