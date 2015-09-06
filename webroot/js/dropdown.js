

;(function(window, document) {
	
	'use strict';
	
	var el;
	var active = false;
	
	window.dropdown = function(selector) {
		el = $(selector);
		
		el.each(function() {
			$(this).addClass('dropdown-item');
		});
		
		$.each( el, function(i, inner) {
			$('a', inner).each(function() {
				var data = $(this);
				data.addClass('dropdown-item');
			});
		});
		
		el.append('<div class="dropdown-container"><button class="dropdown-button">Menu</button></div>');
		
		el.find('.dropdown-item').appendTo('.dropdown-container');
		
		attachEventListeners();
	}
	
	function attachEventListeners() {
		$(document).click(function(e) {
			if($(e.target).hasClass('dropdown-button')) {
				toggleDropdown();
			} else {
				if(active) {
					toggleDropdown();
				}
			}
		});
	}
	
	function toggleDropdown() {
		//console.log(active);
		if(!active) {
			$('.dropdown-container').addClass('active');
			active = true;
		} else {
			$('.dropdown-container').removeClass('active');
			active = false;
		}
	}
	
	function init() {
		dropdown('.header-nav');
	}
	
	$(document).ready(init);
	
})(window, document);