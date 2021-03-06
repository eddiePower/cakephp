

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
	
	function template(data, klass) {
		var str = '';
		str += '<div class="col-md-4"><div class="image-container"><img src="' + data.url + '"><span class="image-info">' + data.info + '</span></div></div>';
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
		setTimeout(function() {
		$('.preview-container').css('max-height','1000px');
		}, 500);
		$('.image-container').each(function() {
			var el = $(this);
			stack.reverse(); // This should come after this section but makes up for an interesting effect
			stack.push(el);
		});
		executeStack(function() {
			cb = null;
			stack = [];
		});
	}
	
	function renderImages() {
		$('.preview-container').css('max-height',0);
		var count = 0;
		var str = '';
		var obj = {};
		var temp = '';
		images.map(function(image) {
			count += 1;
			
			obj.url = 'img/graphics/' + image + '.jpg';
			obj.info = image;
			temp += template(obj);
		});
		$('.preview-container').append(temp);
		
		setTimeout(function() {
			utils.deactivateSpinner();
			$('.spinner-container').remove();
			animateImages();
		}, 200);
	}
	
	function init() {
		//utils.activateSpinner();
		renderImages();
	}
	
	$(document).ready(init);
	
})(window, document);
