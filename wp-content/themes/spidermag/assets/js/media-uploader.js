jQuery(document).ready(function($){

	var spidermag_upload;
	var spidermag_selector;
    function spidermag_add_file(event, selector) {

		var upload = $(".uploaded-file"), frame;
		var $el = $(this);
		spidermag_selector = selector;

		event.preventDefault();

		if ( spidermag_upload ) {
			spidermag_upload.open();
		} else {
			spidermag_upload = wp.media.frames.spidermag_upload =  wp.media({
				title: $el.data('choose'),
				button: {
					text: $el.data('update'),

					close: false
				}
			});

			// When an image is selected, run a callback.
			spidermag_upload.on( 'select', function() {
				var attachment = spidermag_upload.state().get('selection').first();
				spidermag_upload.close();
                spidermag_selector.find('.upload').val(attachment.attributes.url);
				if ( attachment.attributes.type == 'image' ) {
					spidermag_selector.find('.screenshot').empty().hide().append('<img src="' + attachment.attributes.url + '"><a class="remove-image">Remove</a>').slideDown('fast');
				}
				spidermag_selector.find('.upload-button-wdgt').unbind().addClass('remove-file').removeClass('upload-button-wdgt').val(spidermag_remove.remove);
				spidermag_selector.find('.of-background-properties').slideDown();
				spidermag_selector.find('.remove-image, .remove-file').on('click', function() {
					spidermag_remove_file( $(this).parents('.section') );
				});
			});
		}
		spidermag_upload.open();
	}

	function spidermag_remove_file(selector) {
		selector.find('.remove-image').hide();
		selector.find('.upload').val('');
		selector.find('.of-background-properties').hide();
		selector.find('.screenshot').slideUp();
		selector.find('.remove-file').unbind().addClass('upload-button-wdgt').removeClass('remove-file').val(spidermag_remove.upload);
		if ( $('.section-upload .upload-notice').length > 0 ) {
			$('.upload-button-wdgt').remove();
		}
		selector.find('.upload-button-wdgt').on('click', function(event) {
			spidermag_add_file(event, $(this).parents('.section'));
            
		});
	}

	$('body').on('click','.remove-image, .remove-file', function() {
		spidermag_remove_file( $(this).parents('.section') );
    });

    $(document).on('click', '.upload-button-wdgt', function( event ) {
    	spidermag_add_file(event, $(this).parents('.section'));
    });

});