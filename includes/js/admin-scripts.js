jQuery(document).ready(function($) {
	// settings tabs
	//When page loads…
	$(".tab_content").hide(); //Hide all content
	$("div.nav-tab-wrapper span:first").addClass("nav-tab-active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content
	$('div.nav-tab-wrapper span').click(function(e) {				
		e.preventDefault();
		var tab = $(this).attr('location');
		$( 'div.nav-tab-wrapper span' ).removeClass( 'nav-tab-active' );
		$(this).addClass( 'nav-tab-active' );
		$(".tab_content").hide();		
		$("#tab_container " + tab).fadeIn();	
	});
	
	$('#media-items').bind('DOMNodeInserted',function(){
		$('input[value="Insert into Post"]').each(function(){
				$(this).attr('value','Use This Image');
		});
	});

	$('.repeatable-add').click(function() {
		field = $(this).closest('div').find('.custom_repeatable li:last').clone(true);
		fieldLocation = $(this).closest('div').find('.custom_repeatable li:last');
		$('input', field).val('').attr('name', function(index, name) {
			return name.replace(/(\d+)/, function(fullMatch, n) {
				return Number(n) + 1;
			});
		});
		field.insertAfter(fieldLocation, $(this).closest('td'));
		return false;
	});
	
	$('.repeatable-remove').click(function(){
		$(this).parent().remove();
		return false;
	});
	

	jQuery('.custom_repeatable').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.sort'
	});

	$('INPUT.minicolors').minicolors();//settings
	
	// enabled_disabled scripts
	$(".cb-enable").click(function(){
        var parent = $(this).parents('.switch');
        $('.cb-disable',parent).removeClass('selected');
        $(this).addClass('selected');
		$(this).parent('.field.switch').find('input').removeAttr('checked');
		$('#'+$(this).attr('for')).attr('checked', true);
        //$('.checkbox',parent).attr('checked', true);
    });
    $(".cb-disable").click(function(){
        var parent = $(this).parents('.switch');
        $('.cb-enable',parent).removeClass('selected');
        $(this).addClass('selected');
		$(this).parent('.field.switch').find('input').removeAttr('checked');
		$('#'+$(this).attr('for')).attr('checked', true);
        //$('.checkbox',parent).attr('checked', false);
    });
	
	 $(".slider_size").each(function(){
		 var size = $(this).attr('max');
		 $(this ).slider({
				value:$(this).attr('default'),
				min: 0,
				max: size,
				step: 1,
				slide: function( event, ui ) {
				$( "#"+$(this).attr('for') ).text( ui.value + "px");
				$( "#"+$(this).attr('for')+'_input').val( ui.value );
			}
		});
		console.log("#"+$(this).attr('for')+"_input"+"="+$(this).attr('default'));
	});
	 
	$('.creativeto_options_form').submit( function (a) {
	a.preventDefault();
	$('#creativeto-content .submit.top input, .submit_footer .submit.bottom input').val('Параметры сохраняются...');
	$('#creativeto-content .submit.top input, .submit_footer .submit.bottom input').attr('disabled', true);
	$('#creativeto-content .submit.top .loading, .submit_footer .submit.bottom .loading').show();
	var b =  $(this).serialize();
	$.post( 'options.php', b ).error( 
		function() {
			show_message(2);
			t = setTimeout('fade_message()', 4000);
		}).success( function() {
			show_message(1);
			t = setTimeout('fade_message()', 4000);
		});
		return false;    
	});
	
	
});

function show_message(n) {
		if(n === 1) {
			jQuery('#creativeto-content .submit.top input, .submit_footer .submit.bottom input').val('Параметры сохранены!');
			jQuery('#creativeto-content .submit.top .loading, .submit_footer .submit.bottom .loading').hide();
			jQuery('#creativeto-content .submit.top input, .submit_footer .submit.bottom input').addClass( "success" );
		} else{
			jQuery('#creativeto-content .submit.top input, .submit_footer .submit.bottom input').val('Параметры НЕ сохранены!');
			jQuery('#creativeto-content .submit.top .loading, .submit_footer .submit.bottom .loading').hide();
			jQuery('#creativeto-content .submit.top input, .submit_footer .submit.bottom input').addClass( "error" );
		}
	}

	function fade_message() {
		jQuery('#creativeto-content .submit.top input, .submit_footer .submit.bottom input').val('Сохранить параметры');
			jQuery('#creativeto-content .submit.top input, .submit_footer .submit.bottom input').removeAttr( "disabled" );
			jQuery('#creativeto-content .submit.top input, .submit_footer .submit.bottom input').removeClass( "success" );
			jQuery('#creativeto-content .submit.top input, .submit_footer .submit.bottom input').removeClass( "error" );
		clearTimeout(t);
	}
