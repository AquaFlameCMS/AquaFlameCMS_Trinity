
/**
 * Renders a customized arena flag using the HTML5 <canvas> element.
 *
 * @copyright   2010, Blizzard Entertainment, Inc
 * @class       ArenaFlag
 * @requires    
 * @example
 *
 *      var flag = new ArenaFlag('canvas-element', {
 *			'bg': [ 3, 'ff020d58' ],
 *			'border': [ 35, 'ff000000' ],
 *			'emblem': [ 80, 'ffedf0ff' ]
 *		});
 *
 */

function ArenaFlag(canvas, flag, simple) {
	var self = this,
		canvas = document.getElementById(canvas),
		context = null,
		_path = Core.staticUrl + '/images/arena/banners/',
		_width = canvas.width,
		_height = canvas.height,
		_src = [],
		_img = [],
		_color = [],
		_position = [];

	simple = (simple !== undefined) ? simple : false;

	self.initialize = function() {
		if (canvas === null || !document.createElement('canvas').getContext || !_isInteger(flag.bg[0]) || !_isInteger(flag.border[0]) || !_isInteger(flag.emblem[0]))
			return false;

		if (simple) {
			_src = [
				_path + 'shadow-simple_' + Core.zeroFill(flag.bg[0], 3) + '.png',
				_path + 'bg-simple_' + Core.zeroFill(flag.bg[0], 3) + '.png',
				_path + 'border-simple_' + Core.zeroFill(flag.border[0], 3) + '.png',
				_path + 'emblem_' + Core.zeroFill(flag.emblem[0], 3) + '.png',
				_path + 'overlay-simple_' + Core.zeroFill(flag.bg[0], 3) + '.png'
			];
			_color = [
				null,
				[ parseInt(flag.bg[1].substr(2,2), 16), parseInt(flag.bg[1].substr(4,2), 16), parseInt(flag.bg[1].substr(6,2), 16) ],
				[ parseInt(flag.border[1].substr(2,2), 16), parseInt(flag.border[1].substr(4,2), 16), parseInt(flag.border[1].substr(6,2), 16) ],
				[ parseInt(flag.emblem[1].substr(2,2), 16), parseInt(flag.emblem[1].substr(4,2), 16), parseInt(flag.emblem[1].substr(6,2), 16) ],
				[ parseInt(flag.bg[1].substr(2,2), 16), parseInt(flag.bg[1].substr(4,2), 16), parseInt(flag.bg[1].substr(6,2), 16) ]
			];
			_position = [
				[ (_width*10/240), 0, _width, _width ],
				[ (_width*10/240), 0, _width, _width ],
				[ (_width*10/240), 0, _width, _width ],
				[ (_width*63/128), (_width*11/128), (_width*48/128), (_width*48/128) ],
				[ (_width*10/240), 0, _width, _width ]
			];
			_img = [ new Image(), new Image(), new Image(), new Image(), new Image() ];
		} else {
			_src = [
				_path + 'background.png',
				_path + 'ring-bottom.png',
				_path + 'shadow_' + Core.zeroFill(flag.bg[0], 3) + '.png',
				_path + 'bg_' + Core.zeroFill(flag.bg[0], 3) + '.png',
				_path + 'border_' + Core.zeroFill(flag.border[0], 3) + '.png',
				_path + 'emblem_' + Core.zeroFill(flag.emblem[0], 3) + '.png',
				_path + 'overlay_' + Core.zeroFill(flag.bg[0], 3) + '.png',
				_path + 'ring-top.png'
			];
			_color = [
				null,
				null,
				null,
				[ parseInt(flag.bg[1].substr(2,2), 16), parseInt(flag.bg[1].substr(4,2), 16), parseInt(flag.bg[1].substr(6,2), 16) ],
				[ parseInt(flag.border[1].substr(2,2), 16), parseInt(flag.border[1].substr(4,2), 16), parseInt(flag.border[1].substr(6,2), 16) ],
				[ parseInt(flag.emblem[1].substr(2,2), 16), parseInt(flag.emblem[1].substr(4,2), 16), parseInt(flag.emblem[1].substr(6,2), 16) ],
				[ parseInt(flag.bg[1].substr(2,2), 16), parseInt(flag.bg[1].substr(4,2), 16), parseInt(flag.bg[1].substr(6,2), 16) ],
				null
			];
			_position = [
				[ (_width*12/240), 0, (_width*216/240), (_width*216/240) ],
				[ (_width*12/240), 0, (_width*216/240), (_width*216/240) ],
				[ (_width*12/240), 0, (_width*216/240), (_width*216/240) ],
				[ (_width*12/240), 0, (_width*216/240), (_width*216/240) ],
				[ (_width*12/240), 0, (_width*216/240), (_width*216/240) ],
				[ (_width*81/240), (_width*35/240), (_width*72/240), (_width*72/240) ],
				[ (_width*12/240), 0, (_width*216/240), (_width*216/240) ],
				[ (_width*12/240), 0, (_width*216/240), (_width*216/240) ]
			];
			_img = [ new Image(), new Image(), new Image(), new Image(), new Image(), new Image(), new Image(), new Image() ];
		}

		$(canvas).hide();

		context = canvas.getContext('2d');

		_loadImage(0);
	}

	function _loadImage(count) {
		if (count >= _src.length) {
			_render(0);
			return;
		}
		$.ajax({
			'url': _src[count],
			'beforeSend': function() {
				_loadImage(count + 1);
			}
		});
	}

	function _render(index) {
		var _oldCanvas = new Image(),
			_newCanvas = new Image();

		_img[index].src = _src[index];

		_img[index].onload = function() {
			_oldCanvas.src = canvas.toDataURL('image/png');
		}

		_oldCanvas.onload = function() {
			canvas.width = 1;
			canvas.width = _width;
			context.drawImage(_img[index], _position[index][0], _position[index][1], _position[index][2], _position[index][3]);

			if (_color[index] !== null) {
				_colorize(_color[index][0], _color[index][1], _color[index][2]);
			}

			_newCanvas.src = canvas.toDataURL('image/png');
			context.drawImage(_oldCanvas, 0, 0, _width, _height);
		}

		_newCanvas.onload = function() {
			context.drawImage(_newCanvas, 0, 0, _width, _height);
			index++;
			if (index < _src.length) {
				_render(index);
			} else {
				$(canvas).fadeIn(100);
			}
		}
	}

	function _colorize(r, g, b) {
		var imageData = context.getImageData(0, 0, _width, _height),
			pixelData = imageData.data,
			i = pixelData.length,
			intensityScale = 19,
			blend = 1 / 3,
			added_r = r / intensityScale + r * blend,
			added_g = g / intensityScale + g * blend,
			added_b = b / intensityScale + b * blend,
			scale_r = r / 255 + blend,
			scale_g = g / 255 + blend,
			scale_b = b / 255 + blend;

		imageData = context.getImageData(0, 0, _width, _height);
		pixelData = imageData.data;
		i = pixelData.length;
		do {
			if (pixelData[i + 3] !== 0) {
				pixelData[i] = pixelData[i] * scale_r + added_r;
				pixelData[i + 1] = pixelData[i + 1] * scale_g + added_g;
				pixelData[i + 2] = pixelData[i + 2] * scale_b + added_b;
			}
		} while (i -= 4);
		context.putImageData(imageData, 0, 0);
	}

	function _isInteger(n) {
		if (!isNaN(parseFloat(n)) && isFinite(n)) {
			return n % 1 === 0;
		} else {
			return false;
		}
	}

	this.initialize();
}
