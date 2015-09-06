

;(function(window, document) {
	
	'use strict';
	
	var delay = 100;
	var stack = [];
	var cb;
	var images = [
		'19-7260',
		'23-916',
		'23-1101',
		'23-4008',
		'23-6005',
		'23-2110',
		'23-7051',
		'23-7093',
		'23-7007'
	];
	
	function template(data) {
		var str = '';
		str += '<div class="col-4 image-container"><img src="' + data.url + '"><span class="image-info">' + data.info + '</span></div>';
		return str;
	}
	
	function executeStack(callback) {
		if(callback) {
			cb = callback;
		}
		if(stack.length < 1) {
			cb();
		} else {
			var el = stack[stack.length - 1];
			el.addClass('active');
			stack.pop();
			setTimeout(executeStack, delay);
		}
	}
	
	function animateImages() {
		$('.image-container').each(function() {
			var el = $(this);
			stack.reverse();
			stack.push(el);
		});
		executeStack(function() {
			cb = null;
			stack = [];
		});
	}
	
	function renderImages() {
		var count = 0;
		var str = '';
		var obj = {};
		images.map(function(image) {
			count++;
			
			obj.url = 'img/graphics/' + image + '.jpg';
			obj.info = image;
			str += template(obj);
			if(count%3 === 0) {
				str = '<div class="clearfix">' + str + '</div>';
			}
		});
		$('.image-container-outer').append(str);
		
		setTimeout(function() {
			utils.deactivateSpinner();
			$('.spinner-container').remove();
			animateImages();
		}, 200);
	}
	
	function init() {
		utils.activateSpinner();
		renderImages();
	}
	
	$(document).ready(init);
	
})(window, document);