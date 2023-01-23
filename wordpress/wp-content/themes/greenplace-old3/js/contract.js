( function( $ ) {
	$('.contract .form-radio').bind('change', function() {
		$('.contract .form-field.is-hidden').hide();
		$('.contract .form-select > select').removeAttr('required');

		var field = '#select-' + this.id.replace('radio_', '');

		$(field).show();
		$(field).find('.contract .form-select > select').attr('required', true);
	});

	$('.contract .form-radio:checked').trigger('change');

	$('.contract .form-select > select').change(function() {
		this.form.submit();
	});
} )( jQuery );
