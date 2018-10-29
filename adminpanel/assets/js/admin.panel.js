jQuery(document).ready(function($){

	var mediaUploader;

	$('#header-button').on('click',function(e) {
		e.preventDefault();
		if( mediaUploader ){
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a Logo',
			button: {
				text: 'Choose Logo'
			},
			multiple: false
		});

		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#header-logo').val(attachment.url);
			$('#header-logo-view').attr('src', attachment.url);
		});

		mediaUploader.open();
	});

	var mediaUploader1;

	$('#footer-button').on('click',function(e) {
		e.preventDefault();
		if( mediaUploader1 ){
			mediaUploader1.open();
			return;
		}

		mediaUploader1 = wp.media.frames.file_frame = wp.media({
			title: 'Choose a Logo',
			button: {
				text: 'Choose Logo'
			},
			multiple: false
		});

		mediaUploader1.on('select', function(){
			attachment = mediaUploader1.state().get('selection').first().toJSON();
			$('#footer-logo').val(attachment.url);
			$('#footer-logo-view').attr('src', attachment.url);
		});

		mediaUploader1.open();
	});

	$('#remove-header-button').on('click',function(e) {
		e.preventDefault();
		var answer1 = confirm("Are you sure to remove Logo!");
		if(answer1 == true){
			$('#header-logo').val('');
			$('#header-logo-view').attr('src', '');
			$('.general-form').submit();
		}
		return;
	});

	$('#remove-footer-button').on('click',function(e) {
		e.preventDefault();
		var answer2 = confirm("Are you sure to remove Logo!");
		if(answer2 == true){
			$('#footer-logo').val('');
			$('#footer-logo-view').attr('src', '');
			$('.general-form').submit();
		}
		return;
	});


});