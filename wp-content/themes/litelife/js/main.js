$(function(){
	// load and unload animations
	if($('html').hasClass('animations')){
		var timeout = 0;
		var correction = 300;
		window.onbeforeunload = function(){
			$('header').animate({'top': '-90px'}, correction);
		};
		$('header').animate({'top': 0}, correction);
		$('article.block').each(function(index){
			timeout = index*correction;
			console.log(index);
			console.log(timeout);
			$(this).delay(timeout).animate({
				top: 0,
				opacity: 1
			}, correction);
		});
	}

	// responsive video
	// Find all YouTube videos
	var $allVideos = $("iframe[src*='//www.youtube.com']"),
		// The element that is fluid width
		$fluidEl = $("article");
	// Figure out and save aspect ratio for each video
	$allVideos.each(function(){
		$(this).wrap('<div class="videoWrapper"></div>')
		.data('aspectRatio', this.height / this.width)
		// and remove the hard coded width/height
		.removeAttr('height')
		.removeAttr('width');
	});
	// When the window is resized
	$(window).resize(function(){
		var newWidth = $fluidEl.width();
		// Resize all videos according to their own aspect ratio
		$allVideos.each(function(){
			var $el = $(this);
			$el.width(newWidth).height(newWidth*$el.data('aspectRatio'));
		});
		// Kick off one resize to fix all videos on page load
	}).resize();

	$(".openSearchBtn").click(function() {	
		$(".searchWraper").fadeIn("slow");
		var length = $(".menu-main-container").width();
		console.log(length);
		$('.searchWraper').width(length + 40);
		/*$('.closeSearchBtn').show("slow");
		$('.openSearchBtn').hide('hidden');*/
		/*$('.search-submit').removeClass('hidden');		
		$('.search-field').removeClass('hidden');
		$('.openSearchBtn').addClass('hidden');
		$('.closeSearchBtn').removeClass('hidden');*/

		$('.openSearchBtn').css('display', 'none');
		$('.closeSearchBtn').css('display', 'block');
	})

	$(".closeSearchBtn").click(function() {	
		$(".searchWraper").fadeOut("slow");
		$('.openSearchBtn').css('display', 'block');
		$('.closeSearchBtn').css('display', 'none');
		/*$('.closeSearchBtn').hide("slow");
		$('.openSearchBtn').show('hidden');*/

		/*$('.search-submit').addClass('hidden');		
		$('.search-field').addClass('hidden');
		$('.openSearchBtn').removeClass('hidden');
		$('.closeSearchBtn').addClass('hidden');*/
	})

});