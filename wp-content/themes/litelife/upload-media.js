jQuery(function(){
	var frame;
	var gk_media_init = function(selector, button_selector){
		var clicked_button = false;
		jQuery(selector).each(function (i, input) {
			var button = jQuery(input).next(button_selector);
			button.click(function (event) {
				event.preventDefault();
				var selected_img;
				clicked_button = jQuery(this);
				// check for media manager instance
				if(frame) {
					frame.open();
					return;
				}
				// configuration of the media manager new instance
				frame = wp.media({
					title: 'Выбрать картинку',
					multiple: false,
					library: {
						type: 'image'
					},
					button: {
						text: 'Выбрать'
					}
				});
	 
				// Function used for the image selection and media manager closing
				var gk_media_set_image = function() {
					var selection = frame.state().get('selection');
	 
					// no selection
					if (!selection) {
						return;
					}
	 
					// iterate through selected elements
					selection.each(function(attachment) {
						var url = attachment.attributes.url;
						clicked_button.prev(selector).val(url);
					});
				};
	 
				// closing event for media manger
				frame.on('close', gk_media_set_image);
				// image selection event
				frame.on('select', gk_media_set_image);
				// showing media manager
				frame.open();
			});
	   });
	};
	gk_media_init('.media-input', '.media-button');
});