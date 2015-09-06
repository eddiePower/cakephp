


;(function(window, document) {
	
	'use strict';
	
	window.utils = {
		req: function(data, callback) {
			$.ajax({
				url : data.url,
				data : data.data || {},
				method : data.method || 'post',
				statusCode : {
					200 : function(data) {
						callback(200, data);
					},
					201 : function(data) {
						callback(201, data);
					},
					400 : function(data) {
						callback(400, data);
					},
					401 : function(data) {
						callback(401, data);
					},
					403 : function(data) {
						callback(403, data);
					}
				}
			});
		},
		getFormData : function(el) {
			jQuery = jQuery || null;
			if(el instanceof jQuery) {
			} else {
				el = $(el);
			}
			var data = $(el).serializeArray();
			var result = {};
			for (var key in data) {
				result[data[key].name] = data[key].value;
			}
			return result;
		},
		setSpinner : function() {
			$('body').append('<div class="spinner"></div>');
		},
		activateSpinner : function() {
			if($('.spinner').length > 0) {
				$('.spinner').addClass('active');
			} else {
				this.setSpinner();
				$('.spinner').addClass('active');
			}
		},
		deactivateSpinner : function() {
			$('.spinner').removeClass('active');
		},
		serialize : function(obj) {
			var str = '?';
			for(var key in obj) {
				str += key + '=' + obj[key] + '&';
			}
			return str;
		}
	}
	
})(window, document);