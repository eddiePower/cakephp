/*
 * snowflake.js
 * 
 * Generates snowflakes
 * 
 */


;(function(window, document, undefined) {
	
	'use strict';
	
	var active = false;
	var canvas;
	var context;
	var Dots = [];
	
	/*
	 * Configurable variables
	 */
	var colors = ['#f9fbfc'];
	var maximum = 128;
	var diameter = 3;
	var diameterVariance = 1.6
	var velocity = 0.6;
	var velocityVariance = 0.2;

	function Initialize() {
		active = true;
		setCanvas();
		
		generateDots();

		update();
	}
	
	function setCanvas() {
		canvas = document.createElement('canvas');
		canvas.setAttribute('id', 'dots');
		var s = document.body.firstChild;
		s.parentNode.insertBefore(canvas, s);
		context = canvas.getContext('2d');
		
		canvas.width = window.innerWidth;
		canvas.height = window.innerHeight;
	}
	
	function Dot() {
		this.active = true;

		this.diameter = (Math.random() * diameterVariance) + diameter;

		this.x = Math.round(Math.random() * canvas.width);
		this.y = Math.round(Math.random() * canvas.height);

		this.velocity = {
			x: (Math.random() < 0.5 ? -1 : 1) * Math.random() * 0.6,
			y: (Math.random() < 0.5 ? -1 : 1) * Math.random() * 0.6
		};

		this.alpha = Math.random()*0.8;
		if(this.alpha > 0.4) {
			this.alphaDown = true;
		} else {
			this.alphaUp = true;
		}

		this.hex = colors[Math.floor(Math.random() * colors.length)];
		this.color = HexToRGBA(this.hex, this.alpha);
	}

	Dot.prototype = {
		update: function() {

			if(this.alpha > 0.95) {
				this.alphaUp = false;
				this.alphaDown = true;
			}
			if(this.alpha < 0) {
				// The vanishing act
				this.x = Math.round(Math.random() * canvas.width);
				this.y = Math.round(Math.random() * canvas.height);
				this.alphaUp = true;
				this.alphaDown = false;
			}

			if(this.alphaUp) {
				this.alpha += 0.0025;
				this.color = HexToRGBA(this.hex, this.alpha);
			}
			if(this.alphaDown) {
				this.alpha -= 0.02;
				this.color = HexToRGBA(this.hex, this.alpha);
			}

			this.x += this.velocity.x;
			this.y += this.velocity.y;

			if(this.x > canvas.width + 5 || this.x < 0 - 5 || this.y > canvas.height + 5 || this.y < 0 - 5) {
				this.active = false;
			}
		},

		Draw: function() {
			context.fillStyle = this.color;
			context.beginPath();
			context.arc(this.x, this.y, this.diameter, 0, Math.PI * 2, false);
			context.fill();
		}
	}

	function update() {
		generateDots();

		Dots.forEach(function(Dot) {
			Dot.update();
		});

		Dots = Dots.filter(function(Dot) {
			return Dot.active;
		});

		Render();
		requestAnimationFrame(update);
	}

	function Render() {
		context.clearRect(0, 0, canvas.width, canvas.height);
		Dots.forEach(function(Dot) {
			Dot.Draw();
		});
	}

	function generateDots() {
		if(Dots.length < maximum) {
			for(var i = Dots.length; i < maximum; i++) {
				Dots.push(new Dot());
			}
		}

		return false;
	}

	function HexToRGBA(hex, alpha) {
		var red = parseInt((TrimHex(hex)).substring(0, 2), 16);
		var green = parseInt((TrimHex(hex)).substring(2, 4), 16);
		var blue = parseInt((TrimHex(hex)).substring(4, 6), 16);

		return 'rgba(' + red + ', ' + green + ', ' + blue + ', ' + alpha + ')';
	}

	function TrimHex(hex) {
		return (hex.charAt(0) == "#") ? hex.substring(1, 7) : h;
	}

	window.onresize = function() {
		if(active) {
			Dots = [];
			canvas.width = window.innerWidth;
			canvas.height = window.innerHeight;
		}
	};

	window.snowflake = {
		init : Initialize
	};
	
})(window, document);
