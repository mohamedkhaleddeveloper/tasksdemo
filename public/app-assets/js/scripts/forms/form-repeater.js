/*=========================================================================================
		File Name: form-repeater.js
		Description: Repeat forms or form fields
		----------------------------------------------------------------------------------------
		Item Name: Robust - Responsive Admin Template
		Version: 2.1
		Author: PIXINVENT
		Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

(function(window, document, $) {
	'use strict';

	// Default
	$('.repeater-default').repeater();

	// Custom Show / Hide Configurations
	$('.file-repeater, .contact-repeater').repeater({
		show: function () {
			$(this).slideDown();
		},
		hide: function(remove) {
			
				$(this).slideUp(remove);
			
		}
	});


})(window, document, jQuery);