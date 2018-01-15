$(function(){

	/*if(typeof maxslider != 'undefined') {
		$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: maxslider,
			values: [ $('#slider0').val(), $('#slider1').val() ],
			slide: function( event, ui ) {
				$( "#amount" ).val( "R$" + ui.values[ 0 ] + " - R$" + ui.values[ 1 ] );
			},
			change: function( event, ui ) {
				$('#slider'+ui.handleIndex).val(ui.value);
				$('.filterarea form').submit();
			}
		});
	}

	$( "#amount" ).val( "R$" + $( "#slider-range" ).slider( "values", 0 ) + " - R$" + $( "#slider-range" ).slider( "values", 1 ) ); */
	

	$('.filterarea').find('input').on('change', function(){
		$('.filterarea form').submit();
	});

	$('.addtocartform button').on('click', function(e){
		e.preventDefault();

		var qt = parseInt($('.addtocart_qt').val());
		var action = $(this).attr('data-action');

		if(action == 'decrease') {
			if(qt-1 >= 1) {
				qt = qt - 1;
			}
		}
		else if(action == 'increase') {
			qt = qt + 1;
		}

		$('.addtocart_qt').val(qt);
		$('input[name=qtPackage]').val(qt);

	});



	$('.photo_item').on('click', function(){
		var url = $(this).find('img').attr('src');
		$('.mainphoto').find('img').attr('src', url);
	});
	

	$('#languageSwitcher').change(function(){
		var locale = $(this).val();
		var _token = $("input[name=_token]").val();
		
		$.ajax({
			url: "/language",
			type: 'POST',
			data: {locale:locale, _token: _token},
			datatype: 'json',
			success: function (data){
				
			},
			error: function (data){
				
			},
			beforeSend: function (){
				
			},
			complete: function (data){
				window.location.reload(true);
			}
			
		});
		
	});
		
		
		
});














});