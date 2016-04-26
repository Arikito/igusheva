(function( $ ) {
	'use strict'
	// Init global DOM elements, functions and arrays
  	window.app 			 				= {el : {}, fn : {}};
	app.el['window']     					= $(window);
	app.el['document']   					= $(document);
	app.el['html-body'] 					= $('html,body');
	app.el['menu']							= $('#mainmenu');
		
	
	/****** LETS START THE ENGINE !!! *******/
	
	app.el['document'].ready(function(){
		$('#featured').fadeIn();
                $(".format-text iframe,.format-text embed").closest('p').fitVids();
		$('#featured.carousel .slick-carousel').slick({
                        centerMode: false,
                        centerPadding: '0px',
                        slidesToShow: 3,
                        dots:false,
                        arrows:true,
                        autoplay:true,
                        autoplaySpeed:6000,
                        speed:800,
			prevArrow : '<div class="carrow caroleft"><i class="fa fa-angle-left"></i></div>',
			nextArrow : '<div class="carrow caroright"><i class="fa fa-angle-right"></i></div>',
                        responsive: [
                          {
                            breakpoint: 968,
                            settings: {
                              slidesToShow: 2
                            }
                          },
                          {
                            breakpoint: 560,
                            settings: {
                              slidesToShow: 1
                            }
                          }
                        ]
                });
		$('#featured.slideshow .slick-carousel').slick({
                        centerMode: false,
                        centerPadding: '0px',
                        slidesToShow: 1,
                        dots:true,
                        arrows:false,
                        autoplay:true,
                        fade:true,
                        autoplaySpeed:6000,
                        speed:800,
                });
		app.el['menu'].find('.sf-menu').superfish({
			delay: 100, // one second delay on mouse out
			animation: {opacity:'show',height:'show'}, // fade-in and slide-down animation
			speed: 'fast'
		 });
		
		app.el['menu'].find('.sf-menu').slicknav({
			prependTo :'#mobilemenu',
			label:'',
			closeOnClick :true,
			allowParentLinks:true
		});
		$('#menubar').waypoint('sticky', {
			stuckClass: 'stuck',
			offset:-1
		});
		
		$('<i class="fa fa-angle-down"></i>').appendTo('.sf-menu > li > .sf-with-ul').closest('li');
		$(document).click(function() {
			$('#top #adminbar-search,#posts-wrap .meta .share, .search-trigger').removeClass('active');
		});
		 $('.search-trigger,#top #adminbar-search,#posts-wrap .meta .share').click(function(e) {
			e.stopPropagation(); 
		 });
		$('.search-trigger').click(function(e){
			e.preventDefault();
			$(this).toggleClass('active');
			$('#top #adminbar-search').toggleClass('active');
		});
		$('#posts-wrap .meta .share i').click(function(){
			if (!$(this).closest('.share').hasClass('active')) {
				$('#posts-wrap .meta .share').removeClass('active');
				$(this).parent('.share').toggleClass('active');	
			}else{
				$(this).closest('.share').removeClass('active');
			}
		});
                $('.widget_search a').click(function(e){
                        e.preventDefault();
                        $(this).closest('.widget_search').find('form').submit();
                });
	});	
})(jQuery);