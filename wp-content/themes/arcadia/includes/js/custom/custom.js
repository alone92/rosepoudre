jQuery(document).ready(function( $ ) { 

		//Flex Slider	
	    $('.flexslider').flexslider({
	      slideshow: false
	    });
	
		
		// Drop Menu
		function mainmenu(){
		$(".nav ul ").css({display: "none"}); // Opera Fix
		$(".nav li").hover(function(){
				$(this).find('ul:first').css({visibility: "visible",display: "none"}).slideDown(200);
				},function(){
				$(this).find('ul:first').css({visibility: "hidden"});
				});
		}
			
		mainmenu();
	
		
		// Secondary Drop Menu
		function catmenu(){
		$(".secondary-menu ul ").css({display: "none"}); // Opera Fix
		$(".secondary-menu li").hover(function(){
				$(this).find('ul:first').css({visibility: "visible",display: "none"}).slideDown(200);
				},function(){
				$(this).find('ul:first').css({visibility: "hidden"});
				});
		}
			
		catmenu();
	
		
		// Lightbox
		$(".lightbox").fancybox({
			'titlePosition'		: 'outside',
			'overlayColor'		: '#ddd',
			'overlayOpacity'	: 0.9,
			'titleShow'			: 'false',
			'speedIn' : '1400', 
			'speedOut' : '1400'
		});
		
				
		// Tabs
		$('#tabs > div').hide();
		$('#tabs div:first').show();
		$('#tabs ul li:first').addClass('active');
		
		$('#tabs > ul li a').click(function(){
			$('#tabs ul li').removeClass('active');
			$(this).parent().addClass('active');
			var currentTab = $(this).attr('href');
			$('#tabs > div').hide();
			$(currentTab).fadeIn('fast', function() { });
			return false;
		});		
		
		
		//Responsive Menu
		$('.main-nav').mobileMenu({
			className: 'main-select-menu'
		});
		
		
		//Responsive Menu
		$('.secondary-menu').mobileMenu();
		
		
		//Back To Top
		jQuery(document).ready(function() {
			
			jQuery().UItoTop({ 
				text: '<i class="icon-chevron-up"></i>',
				scrollSpeed: 600
			});
			
		});
		
		//Select
		$(document).ready(function(){	
		
		    if (!$.browser.opera) {
		
		        $('select.select-menu, select.main-select-menu').each(function(){
		            var title = $(this).attr('title');
		            if( $('option:selected', this).val() != ''  ) title = $('option:selected',this).text();
		            $(this)
		                .css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
		                .after('<span class="select">' + title + '</span>')
		                .change(function(){
		                    val = $('option:selected',this).text();
		                    $(this).next().text(val);
		                    })
		        });
		
		    };
				
		});	
		
		// FitVids
		$('.crvideo, .post-content p, .widget').fitVids();
		
});
jQuery(document).ready(function($){

	$('.cr-likes').live('click',
	    function() {
    		var link = $(this);
    		if(link.hasClass('active')) return false;
		
    		var id = $(this).attr('id'),
    			postfix = link.find('.cr-likes-postfix').text();
			
    		$.post(cr_likes.ajaxurl, { action:'cr-likes', likes_id:id, postfix:postfix }, function(data){
    			link.html(data).addClass('active').attr('title','You already like this');
    		});
		
    		return false;
	});
	
	if( $('body.ajax-cr-likes').length ) {
        $('.cr-likes').each(function(){
    		var id = $(this).attr('id');
    		$(this).load(cr.ajaxurl, { action:'cr-likes', post_id:id });
    	});
	}

});

function runisotope(){
	var container = jQuery('.masonrycontainer');
		container.masonry({
			itemSelector : '.masonr',
			isAnimated : true,
		});
};

jQuery(window).load(function() {
	runisotope();
	
	var morebutton = jQuery('#load-more, .wrapperButton'),
		archive = morebutton.rel,
		deftext = morebutton.text(),
		page = 1;
	
	morebutton.click(function(e){
		e.preventDefault();
		page++; 
		

	morebutton.text(ajax_custom.loading);
	jQuery.post(ajax_custom.ajaxurl, {action:'cr_load_more', nonce:ajax_custom.nonce, page:page, archive:archive}, function(data){

		var content = jQuery(data.content);
			
		jQuery(content).imagesLoaded(function(){
			jQuery('.masonrycontainer').append(content).masonry('appended',content);
			jQuery('.flexslider').flexslider({slideshow: false});
			jQuery('.crvideo, .post-content p').fitVids();
			jQuery('.masonrycontainer').masonry('reload');
			morebutton.text(deftext);
		});
		if(page>=data.pages){
			morebutton.fadeOut();
		}
	},'json');
		
	});
	
});